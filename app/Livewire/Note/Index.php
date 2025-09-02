<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Livewire\Component;

class Index extends Component
{

    public function delete(Note $note)
    {
        $note->delete();
    }


    public function render()
    {
        return view('livewire.note.index', ['notes' => Note::all()]);
    }
}
