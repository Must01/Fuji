<?php

namespace Tests\Feature\Livewire\Note;

use App\Livewire\Note\Create;
use App\Models\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /** Smoke tests */
    public function test_renders_successfully()
    {
        Livewire::test(Create::class)
            ->assertStatus(200);
    }


    /** Happy path tests */
    public function can_add_note()
    {
        $note = Note::whereName('some name')->first();

        $this->assertNull($note);

        Livewire::test(Create::class)
            ->set('name', 'some name')
            ->set('note', 'a note')
            ->set('color', '#eee')
            ->call('create');

        $note = Note::whereName('some name')->first();

        $this->assertNotNull($note);
        $this->assertEquals('some name', $note->name);
        $this->assertEquals('a note', $note->note);
        $this->assertEquals('#eee', $note->color);
    }


    /** input tests */
    public function name_is_required()
    {
        livewire::test(Create::class)
            ->set('name', '')
            ->call('create')
            ->assertHasErrors(['name' => 'required']);
    }

    public function note_is_required()
    {
        livewire::test(Create::class)
            ->set('note', '')
            ->call('create')
            ->assertHasErrors(['note' => 'required']);
    }

    public function color_is_required()
    {
        livewire::test(Create::class)
            ->set('color', '')
            ->call('create')
            ->assertHasErrors(['color' => 'required']);
    }
}
