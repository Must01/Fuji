@props(['label', 'name', 'text' => 'text-white', 'placeholder' => '', 'type' => 'text'])

<label class="{{ $text }} flex flex-col space-y-2">
    <span class="text-sm capitalize">{{ $label }}</span>
    <input type="text" placeholder="{{ $placeholder }}" type="{{ $type }}" {{ $attributes }}
        class="focus:border-accent dark:focus:border-accent-content {{ $errors->has($name) ? 'outline-1  outline-red-400 dark:outline-red-500' : 'border-transparent' }} w-full rounded-lg border bg-white/75 px-2 py-2 text-base text-gray-900 shadow-sm outline-0" />
    <x-must.error error="{{ $name }}" />
</label>
