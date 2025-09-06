<div
    class="bg-{{ $note->color }} min-h-30 sm:min-h-45 flex flex-col space-y-2 rounded-xl border border-neutral-200 p-2 text-left dark:border-neutral-700">
    <div class="flex justify-between">
        <flux:heading size="lg" class="ml-2" level="2">{{ $note->name }}</flux:heading>
        <flux:button variant="primary" color="blue" :loading="true" icon="pencil" size="xs"
            wire:click="$dispatch('openModal', {{ \Illuminate\Support\Js::from([
                'component' => 'note.form',
                'arguments' => ['oldnote' => $note->id, 'heading' => 'Edit'],
            ]) }})"
            class="cursor-pointer">
        </flux:button>
    </div>
    <flux:separator variant="subtle" />
    <flux:text class="ml-2 flex-1 hover:bg-white/5 dark:hover:bg-black/5">{{ str($note->note)->words(10) }}</flux:text>
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-0.5 text-[10px] sm:text-xs">
            <flux:icon.clock variant="solid" class="size-3 sm:size-4" />
            <span>{{ $note->created_at->diffForHumans() }}</span>
        </div>
        <div>
            <flux:button color="" class="cursor-pointer" :loading="true" size="xs" icon="eye"
                wire:click="$dispatch('openModal', {{ \Illuminate\Support\Js::from(['component' => 'note.show', 'arguments' => ['note' => $note->id]]) }})">
            </flux:button>
            <flux:button variant="danger" :loading="true" icon="trash" size="xs" class="cursor-pointer"
                wire:click="$parent.delete('{{ $note->id }}')" wire:confirm="sure u wanna delete this note ?">
            </flux:button>
        </div>
    </div>
</div>
