<?php

namespace App\Livewire\Note;

use Livewire\Component;
use App\Models\Note;
use Livewire\Attributes\Rule;

class Create extends Component
{

    #[Rule('required',  message: "😒 you forget the ")]
    public $name = '';
    #[Rule('required', message: "😒 you forget the ")]
    public $note = '';
    #[Rule('required', message: "😒 you forget the ")]
    public $color = '';

    public function create()
    {
        $this->validate();

        Note::create([
            'name' => $this->name,
            'note' => $this->note,
            'color' => $this->color
        ]);

        $this->redirect('/mynotes', true);
    }

    public function render()
    {
        return view('livewire.note.create');
    }
}
