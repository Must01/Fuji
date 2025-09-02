<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Note;

class Test extends Component
{

    // public $users = 'i am the first user';

    public function delete(Note $note)
    {
        $note->delete();
    }

    public function render()
    {
        return view(
            'livewire.test',
            ['notes' => Note::all()]
        );
    }
}
