@php
    $bgStyle = $note->custom_color ? "background-color: {$note->custom_color};" : null;
    $textClass = $note->text_color;
    $btnBgClass = $textClass === 'text-white' ? 'hover:bg-black/12' : 'hover:bg-white/8';
@endphp

<div class="bg-{{ $note->color }} h-1/2 space-y-4 p-8" style="{{ $bgStyle }}">

    <div class="flex items-center justify-between">
        <div class="{{ $textClass }} flex items-center gap-0.5 text-[10px] sm:text-xs">
            <flux:icon.clock variant="solid" class="size-3 sm:size-4" />
            <span>{{ $note->created_at->toDayDateTimeString() }}</span>
        </div>
        <button wire:click="$dispatch('closeModal')"
            class="{{ $btnBgClass }} {{ $textClass }} inline-flex cursor-pointer items-center rounded-md p-1.5 transition hover:bg-opacity-20">
            <flux:icon.x-mark class="size-4" />
        </button>
    </div>
    <h2 class="{{ $textClass }} text-base font-semibold capitalize tracking-wide">{{ $note->name }}</h2>

    <flux:separator class="{{ $textClass }}" />

    <flux:text class="{{ $textClass }} whitespace-pre-line">{!! $note->note !!}</flux:text>

</div>
