<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Livewire\Component;

class NoteCard extends Component
{
    public Note $note;

    public function render()
    {
        return view('livewire.note.note-card');
    }
}
