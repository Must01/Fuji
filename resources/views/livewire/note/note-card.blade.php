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
    <flux:text class="ml-2 flex flex-1 items-center justify-center">{{ str($note->note)->words(10) }}</flux:text>
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-0.5 text-[10px] sm:text-xs">
            <flux:icon.clock variant="solid" class="size-3 sm:size-4" />
            <span>{{ $note->created_at->diffForHumans() }}</span>
        </div>
        <div>
            <flux:button color="" class="cursor-pointer" :loading="true" size="xs" icon="eye"
                wire:click="$dispatch('openModal', {{ \Illuminate\Support\Js::from(['component' => 'note.show', 'arguments' => ['note' => $note->id]]) }})">
            </flux:button>
            <flux:modal.trigger name="delete-{{ $note->id }}">
                <flux:button variant="danger" :loading="true" icon="trash" size="xs"
                    class="cursor-pointer" />
            </flux:modal.trigger>

            <flux:modal name="delete-{{ $note->id }}" class="min-w-[22rem]">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Delete Note?</flux:heading>

                        <flux:text class="mt-2">
                            <p>You're about to delete this note.</p>
                            <p>This action cannot be reversed.</p>
                        </flux:text>
                    </div>

                    <div class="flex gap-2">
                        <flux:spacer />

                        <flux:modal.close>
                            <flux:button variant="ghost">Cancel</flux:button>
                        </flux:modal.close>

                        <flux:button wire:click="$parent.delete('{{ $note->id }}')" class="cursor-pointer"
                            variant="danger">
                            Delete Note</flux:button>
                    </div>
                </div>
            </flux:modal>
        </div>
    </div>
</div>
