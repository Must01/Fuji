<div class="flex w-full flex-col">
    <div class="flex justify-between">
        <div class="flex gap-2">
            <flux:button size="sm" @class([
                'ring-1 ring-accent' => $selectedTag == 'all',
            ]) wire:key="all" wire:click="selectThisTag('all')">All
            </flux:button>
            @foreach ($tags as $tag)
                <flux:button size="sm" @class([
                    'ring-1 ring-accent' => $selectedTag == $tag,
                ]) wire:key="{{ $tag }}"
                    wire:click="selectThisTag('{{ $tag }}')">
                    {{ $tag }}
                </flux:button>
            @endforeach
        </div>
        <flux:button icon="pencil-square" size="sm"
            wire:click="$dispatch('openModal',
                {{ \Illuminate\Support\Js::from([
                    'component' => 'note.form',
                    'arguments' => ['heading' => 'Create'],
                ]) }}
            )"
            class="group cursor-pointer rounded-full border border-transparent bg-white p-1 transition-colors duration-75 hover:border-white hover:bg-red-400">
            create</flux:button>
    </div>

    <div class="grid flex-1 grid-cols-1 gap-2 p-2 text-center sm:grid-cols-3 sm:gap-3 sm:p-3">
        @foreach ($notes as $note)
            <livewire:note.note-card :key="$note->id" :note="$note" />
        @endforeach
    </div>
</div>
