<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use LivewireUI\Modal\ModalComponent;
use function pickTextColor;

class Form extends ModalComponent
{
    public $oldnote = null;
    public $text_color = '';
    public $heading;

    public array $tags = [];
    public $taginput = '';

    public $name = '';
    public $note = '';
    public $color = 'zinc';
    public $colors = [
        'zinc',
        'rose',
        'amber',
        'yellow',
        'teal',
        'sky',
        'violet'
    ];
    public $custom_color = null;

    public function updatedCustomColor()
    {
        $this->color = null;
    }


    public function mount($oldnote = null)
    {
        if ($oldnote) {
            $this->oldnote = Note::find($oldnote);

            if ($this->oldnote) {
                $this->name = $this->oldnote->name;
                $this->note = $this->oldnote->note;
                $this->color = $this->oldnote->color;
                $this->custom_color = $this->oldnote->custom_color ?? null;
                $this->tags = $this->oldnote->tags ?? $this->oldnote->tag ?? [];
            }
        }
    }


    public function setColor($clr)
    {
        $this->color = $clr;
        $this->custom_color = null;

        if ($this->oldnote) {
            $this->oldnote->custom_color = null;
            $this->oldnote->color = null;
        }
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
        $this->validate([
            'name' => 'required',
            'note' => 'required',
            'color' => 'required_without:custom_color',
            'custom_color' => ['nullable', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
            'tags' => 'array',
        ]);

        // compute text color class only if we have a custom hex background
        $this->text_color = $this->custom_color ? pickTextColor($this->custom_color) : 'text-black'; // returns 'text-white' or 'text-black'

        $data = [
            'user_id' => Auth::id(),
            'name' => $this->name,
            'note' => $this->note,
            'color' => $this->custom_color ? null : $this->color,
            'custom_color' => $this->custom_color,
            'text_color' => $this->text_color, // store it
            'tags' => $this->tags,
        ];

        if ($this->oldnote && $this->oldnote->id) {
            $this->oldnote->update($data);
            $this->dispatch('notify', type: 'info', message: 'Note updated.');
        } else {
            Note::create($data);
            $this->dispatch('notify', type: 'success', message: 'Note created.');
        }

        $this->closeModal();
        return $this->redirect('/notes', true);
    }


    public function render()
    {
        return view('livewire.note.form');  // Keep your original view name
    }
}
