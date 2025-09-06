<?php

namespace App\Livewire\Note;

use App\Models\Note;
use LivewireUI\Modal\ModalComponent;

class Show extends ModalComponent
{
    public $note;

    public function mount($note)
    {
        $this->note = Note::find($note);
    }

    public function render()
    {
        return view('livewire.note.show');
    }
}
