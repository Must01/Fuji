<div class="bg-{{ $oldnote->color ?? $color }} space-y-4 p-4 sm:p-8">
    <div class="flex justify-between px-0.5">
        <flux:heading size="lg" level="2">{{ $heading }} a Note.</flux:heading>

        <flux:button wire:click="$dispatch('closeModal')" size="sm" class="cursor-pointer" icon="x-mark"
            variant="ghost" inset />
    </div>
    <form wire:submit="save" class="space-y-4">
        <flux:input wire:model="name" type="text" label="Name" />

        <flux:textarea wire:model="note" label="note" />

        <div class="flex flex-wrap gap-2">
            @foreach ($colors as $clr)
                <button type="button" wire:click="setColor('{{ $clr }}')" @class([
                    'h-8 w-8 rounded-lg',
                    'bg-' . $clr,
                    'ring-2 ring-current ring-offset-2' => $clr == $color,
                ])>
                </button>
            @endforeach
        </div>


        <flux:input badge="optional" label="tag" wire:keydown.enter.prevent="addTag" wire:model="taginput" />

        <div class="flex overflow-x-auto overflow-y-hidden">
            @foreach ($tags as $tag)
                <div>
                    <flux:badge class="flex gap-1">
                        {{ $tag }}
                        <flux:icon.x-circle variant="micro" wire:click="removeTag('{{ $tag }}')" />
                    </flux:badge>

                </div>
            @endforeach
        </div>

        <flux:button variant="primary" class="cursor-pointer" type="submit">Save</flux:button>
    </form>

</div>
