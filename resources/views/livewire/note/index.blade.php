<div class="flex w-full flex-col gap-4">
    <div class="flex w-full items-center gap-2 md:w-auto">
        <flux:input icon="magnifying-glass" variant="filled" class="text-gray-900" wire:model.live="search"
            placeholder="type name..">
            <x-slot name="iconTrailing">
                <flux:button wire:click="$set('search','')" size="sm" variant="subtle" icon="x-mark"
                    class="-mr-1" />
            </x-slot>
        </flux:input>

        <flux:button icon="plus"
            wire:click="$dispatch('openModal',
                    {{ \Illuminate\Support\Js::from([
                        'component' => 'note.form',
                        'arguments' => ['heading' => 'Create'],
                    ]) }}
                )"
            class="cursor-pointer rounded-full transition hover:scale-105 active:scale-95">
            Create
        </flux:button>
    </div>
    <div class="m-1 flex gap-2 overflow-x-auto whitespace-nowrap p-1">
        <flux:button size="sm" @class([
            'ring-1 ring-accent' => $selectedTag == 'all',
            'cursor-pointer px-3 py-1 text-sm', // compact padding
            'hover:scale-105 active:scale-95 transition-all',
        ]) wire:key="all" wire:click="selectThisTag('all')">
            All
        </flux:button>

        @foreach ($tags as $tag)
            <flux:button size="sm" @class([
                'ring-1 ring-accent' => $selectedTag == $tag,
                'cursor-pointer px-3 py-1 text-sm', // compact padding
                'hover:scale-105 active:scale-95 transition-all',
            ]) wire:key="{{ $tag }}"
                wire:click="selectThisTag('{{ $tag }}')">
                {{ $tag }}
            </flux:button>
        @endforeach

    </div>

    {{-- Notes grid --}}
    <div class="grid flex-1 gap-2 p-2 text-center sm:grid-cols-2 sm:gap-3 sm:p-3 md:grid-cols-3 lg:grid-cols-3">
        @foreach ($notes as $note)
            <livewire:note.note-card :key="$note->id" :note="$note" />
        @endforeach
    </div>
</div>
