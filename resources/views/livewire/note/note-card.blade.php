<div class="flex h-20 flex-col rounded-xl border border-neutral-200 p-2 text-left sm:h-40 dark:border-neutral-700"
    style="background-color: {{ $note->color }};">
    <div class="border-b border-neutral-200 dark:border-neutral-700">
        <span class="p-2">{{ $note->name }}</span>
    </div>
    <div class="flex-1">
        <p>
            {{ str($note->note)->words(10) }}
        </p>

    </div>
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-0.5 text-[10px] sm:text-xs">
            <flux:icon.clock variant="solid" class="size-3 sm:size-4" />
            <span>{{ $note->created_at->diffForHumans() }}</span>
        </div>
        <button
            class="group cursor-pointer rounded-full border border-transparent bg-white p-1 transition-colors duration-75 hover:border-white hover:bg-red-400"
            wire:click="$parent.delete('{{ $note->id }}')" wire:confirm="sure u wanna delete this note ?">
            <flux:icon.trash variant="solid"
                class="size-3 text-red-500 transition-colors duration-75 group-hover:text-white sm:size-4" />
        </button>
    </div>
</div>
