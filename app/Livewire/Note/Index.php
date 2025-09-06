<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class Index extends Component
{
    public $selectedTag = 'all';

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
        // Step 1: Get the notes
        $notesQuery = Auth::user()->notes();

        // tag logic (Fixed to work with JSON arrays)
        if ($this->selectedTag != 'all') {
            // Use whereJsonContains for proper JSON array searching
            $notesQuery = $notesQuery->where('tags', $this->selectedTag);
        }

        $notes = $notesQuery->latest()->get();

        // Step 2: Get all the tags from all notes and flatten the array
        $allTags = Auth::user()
            ->notes()
            ->get()
            ->pluck('tags')
            ->flatten()
            ->unique()
            ->values()
            ->filter(); // Remove null/empty values

        return view('livewire.note.index', [
            'notes' => $notes,
            'tags' => $allTags,
            'selectedTag' => $this->selectedTag
        ]);
    }
}
