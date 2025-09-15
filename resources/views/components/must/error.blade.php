@props(['error'])

@error($error)
    <span class="flex items-center space-x-1 text-sm font-semibold text-red-500">
        <flux:icon.exclamation-triangle variant="micro" />
        <span>{{ $message }}</span>
    </span>
@enderror
