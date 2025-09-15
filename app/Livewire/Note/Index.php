<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class Index extends Component
{
    public $selectedTag = 'all';

    public $search = '';

    public function selectThisTag($tag)
    {
        $this->selectedTag = $tag;
    }

    public function delete(Note $note)
    {
        // Add security check to ensure user owns the note
        if ($note->user_id !== Auth::id()) {
            session()->flash('error', 'Unauthorized action.');
            return;
        }

        $note->delete();

        $this->dispatch('notify', type: 'error', message: 'Note deleted.');
    }

    // Listen for the noteSaved event from the Form component
    #[On('noteSaved')]
    public function refreshNotes()
    {
        // This will trigger a re-render which fetches fresh data
    }

    public function render()
    {
        $notesQuery = Auth::user()->notes();

        // 1. Filter by tag if not 'all'
        if ($this->selectedTag != 'all') {
            $notesQuery = $notesQuery->where('tags', 'all', [$this->selectedTag]);
            // 'all' checks if array contains the selected tag
        }

        // 2. Apply search filter
        if (!empty(trim($this->search))) {
            $q = trim($this->search);

            $notesQuery = $notesQuery->where(function ($query) use ($q) {
                $query->where('name', 'like', "%{$q}%")
                    ->orWhere('note', 'like', "%{$q}%")
                    ->orWhere('tags', 'all', [$q]);
                // Correct way to search tag arrays in MongoDB
            });
        }

        // 3. Get latest notes
        $notes = $notesQuery->latest()->get();

        // 4. Collect all tags for the sidebar
        $allTags = Auth::user()
            ->notes()
            ->get()
            ->pluck('tags')
            ->flatten()
            ->unique()
            ->values()
            ->filter();

        return view('livewire.note.index', [
            'notes' => $notes,
            'tags' => $allTags,
            'selectedTag' => $this->selectedTag,
            'search' => $this->search
        ]);
    }
}
