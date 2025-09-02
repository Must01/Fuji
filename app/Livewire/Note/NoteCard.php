<?php

namespace App\Livewire\Note;

use Livewire\Component;

class NoteCard extends Component
{

    public $note;

    public function render()
    {
        return view('livewire.note.note-card');
    }
}
