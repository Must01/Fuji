@props(['colors', 'color', 'customColor', 'textColor'])

<div class="space-y-3">
    <label class="{{ $textColor }} mb-2 block text-sm font-medium capitalize">
        note color
    </label>

    <div class="flex flex-wrap gap-2 sm:gap-3">
        @foreach ($colors as $clr)
            <button type="button" wire:click="setColor('{{ $clr }}')" @class([
                'h-8 w-8 sm:h-10 cursor-pointer sm:w-10 rounded-lg border-2 transition-all duration-200 hover:scale-105 active:scale-95',
                'bg-' . $clr,
                'border-gray-800 dark:border-white shadow-md' =>
                    $clr == $color && $customColor == null,
                'border-gray-300 dark:border-gray-600 hover:border-gray-400 dark:hover:border-gray-500' =>
                    $clr != $color || $customColor != null,
            ])
                title="{{ ucfirst(str_replace('-', ' ', $clr)) }} theme">
            </button>
        @endforeach

        <div class="relative">
            <input id="custom_color" type="color" wire:model.live="custom_color" @class([
                'h-8 w-8 sm:h-10 sm:w-10 rounded-lg border-2 cursor-pointer transition-all duration-200 hover:scale-105 active:scale-95',
                ($textColor == 'text-white'
                    ? 'border-zinc-300 dark:border-white'
                    : 'border-gray-600 dark:border-gray-800') . 'shadow-md' =>
                    $customColor != null,
                'border-gray-300 dark:border-gray-600 hover:border-gray-400' =>
                    $customColor == null,
            ])
                title="Custom color picker - click to choose any color" />

            <div class="{{ $textColor }} pointer-events-none absolute inset-0 flex items-center justify-center">
                <flux:icon.paint-brush variant="micro" />
            </div>
        </div>
    </div>

    <x-must.error error="custom_color" />
    <x-must.error error="color" />
</div>
