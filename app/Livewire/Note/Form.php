<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use LivewireUI\Modal\ModalComponent;

class Form extends ModalComponent
{
    public $oldnote = null;
    public $heading;

    public array $tags = [];
    public $taginput = '';

    #[Rule('required', message: "😅 you forget the title")]
    public $name = '';
    #[Rule('required', message: "😅 you forget the content")]
    public $note = '';
    #[Rule('required', message: "😅 you forget the color")]
    public $color = 'zinc';
    public $colors = [
        'zinc',
        'red',
        'orange',
        'amber',
        'yellow',
        'lime',
        'green',
        'emerald',
        'teal',
        'cyan',
        'sky',
        'blue',
        'indigo',
        'violet',
        'purple',
        'fuchsia',
        'pink',
        'rose',
    ];

    public function mount($oldnote = null)
    {
        if ($oldnote) {
            $this->oldnote = Note::find($this->oldnote);
            $this->name = $this->oldnote->name;
            $this->note = $this->oldnote->note;
            $this->color = $this->oldnote->color;
            $this->tags = $this->oldnote->tag ?? [];
        }
    }

    public function setColor($clr)
    {
        $this->color = $clr;
    }

    public function addTag()
    {
        if (count(explode(' ', $this->taginput)) > 2) {
            $this->addError('taginput', 'no more then 2 words in a tag!');
            return;
        }

        $this->taginput = trim($this->taginput);

        if (empty($this->taginput)) {
            return;
        }

        if (!in_array($this->taginput, $this->tags)) {
            $this->tags[] = $this->taginput;
        }

        $this->taginput = '';
    }

    public function removeTag($tag)
    {
        $this->tags = collect($this->tags)->filter(fn($t) => $t !== $tag)->values()->toArray();
    }

    public function save()
    {
        // validate
        $this->validate();

        // get data
        $data = [
            'user_id' => Auth::user()->id,
            'name' => $this->name,
            'note' => $this->note,
            'color' => $this->color,
            'tags' => $this->tags
        ];

        // create or update based on the oldnote existence 
        if (isset($this->oldnote)) {
            $this->oldnote->update($data);
            $this->dispatch('notify', type: 'info', message: 'Note updated.');
        } else {
            Note::create($data);
            $this->dispatch('notify', type: 'success', message: 'Note created.');
        }

        // redirect (keep your original redirect logic)
        $this->closeModal();

        return $this->redirect('/notes', true);
    }

    public function render()
    {
        return view('livewire.note.form');  // Keep your original view name
    }
}
