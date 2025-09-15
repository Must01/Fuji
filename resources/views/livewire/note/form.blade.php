@php
    $customBgColor = $custom_color ? "background-color: {$custom_color};" : null;
    $text_color = $custom_color ? pickTextColor($custom_color) : '';
    $btnBgClass = $text_color == 'text-white' ? 'hover:bg-black/12' : 'hover:bg-white/8';
@endphp

<div style="{{ $customBgColor }}" class="{{ 'bg-' . $color }} space-y-4 p-4 sm:p-8">
    <div class="flex justify-between">
        <flux:heading class="{{ $text_color }}" size="lg" level="2">{{ $heading }} a Note.</flux:heading>

        <button wire:click="$dispatch('closeModal')"
            class="{{ $text_color }} {{ $btnBgClass }} inline-flex cursor-pointer items-center rounded-md p-1.5 transition hover:bg-opacity-20">
            <flux:icon.x-mark class="size-4" />
        </button>
    </div>
    <form wire:submit="save" class="space-y-4">

        <x-must.input wire:model="name" label="name" name="name" text="{{ $text_color }}"
            placeholder="note name.." />

        <x-must.textarea wire:model="note" x-text="" label="note" name="note" text="{{ $text_color }}"
            placeholder="note content.." />

        <x-must.colors :colors="$colors" :color="$color" :custom-color="$custom_color" :text-color="$text_color" />

        <x-must.input text="{{ $text_color }}" label="tag" wire:keydown.enter.prevent="addTag"
            wire:model="taginput" name="taginput" placeholder="write, hit enter to save tag" />

        <div class="{{ $text_color }} flex gap-2 overflow-x-auto overflow-y-hidden">
            @foreach ($tags as $tag)
                <flux:badge livewire:key="{{ $tag }}" variant="filled" color="{{ $color ? $color : '' }}"
                    class="{{ $text_color == 'text-white' ? 'border-white' : 'border-gray-800' }} flex gap-1 border text-gray-900">
                    {{ $tag }}
                    <flux:icon.x-circle variant="micro" class="cursor-pointer"
                        wire:click="removeTag('{{ $tag }}')" />
                </flux:badge>
            @endforeach
        </div>

        <flux:button variant="filled" class="cursor-pointer" type="submit">Save</flux:button>
    </form>

</div>
