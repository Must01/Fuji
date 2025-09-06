<div class="bg-{{ $note->color }} h-1/2 space-y-4 p-8">

    <div class="flex items-center justify-between">
        <div class="flex items-center gap-0.5 text-[10px] sm:text-xs">
            <flux:icon.clock variant="solid" class="size-3 sm:size-4" />
            <span>{{ $note->created_at->toDayDateTimeString() }}</span>
        </div>
        <flux:button wire:click="$dispatch('closeModal')" size="sm" icon="x-mark" variant="ghost" inset />
    </div>
    <flux:heading size="lg" level="2">{{ $note->name }}</flux:heading>

    <flux:separator />

    <flux:text class="whitespace-pre-line">{{ $note->note }}</flux:text>

</div>
