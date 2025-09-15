@php
    $bgStyle = $note->custom_color ? "background-color: {$note->custom_color};" : null;
    $textClass = $note->text_color;
    $btnBgClass = $textClass === 'text-white' ? 'hover:bg-black/12' : 'hover:bg-white/25';
@endphp

<div style="{{ $bgStyle }}"
    class="note-card {{ $textClass }} {{ !$bgStyle ? 'bg-' . $note->color : '' }} ring-white/6 flex min-h-[10rem] transform-gpu flex-col justify-between rounded-xl bg-white/40 p-3 shadow-sm ring-1 transition-transform hover:-translate-y-0.5 hover:opacity-90 hover:shadow-lg sm:p-4 dark:bg-transparent">

    {{-- header --}}
    <div class="flex items-start justify-between gap-3">
        {{-- title --}}
        <h3 class="{{ $textClass }} text-base font-semibold capitalize tracking-wide">
            {{ str($note->name)->words(3) }}
        </h3>

        {{-- edit --}}
        <button
            wire:click="$dispatch('openModal', {{ \Illuminate\Support\Js::from([
                'component' => 'note.form',
                'arguments' => ['oldnote' => $note->id, 'heading' => 'Edit'],
            ]) }})"
            class="{{ $btnBgClass }} {{ $textClass }} inline-flex cursor-pointer items-center rounded-md p-1.5 transition hover:scale-105 hover:bg-opacity-20 active:scale-95">
            <flux:icon.pencil class="size-4" />
        </button>
    </div>

    {{-- body --}}
    <div class="mt-2 flex flex-1 items-center justify-center break-words text-left text-base leading-relaxed">
        <p class="{{ $textClass }} line-clamp-4">{!! str($note->note)->words(2) !!}</p>
    </div>

    {{--  time + actions --}}
    <div class="mt-4 flex items-center justify-between">
        {{-- time --}}
        <div class="{{ $textClass }} flex items-center gap-2 text-xs opacity-90">
            <flux:icon.clock class="size-4" />
            <span>{{ $note->created_at->diffForHumans() }}</span>
        </div>

        <div class="space-between flex items-center">
            {{-- view --}}
            <button
                class="{{ $btnBgClass }} {{ $textClass }} {{ $textClass == 'text-black' ? 'hover:ring-black' : 'hover:ring-white' }} inline-flex cursor-pointer items-center rounded-md p-1.5 transition transition hover:scale-105 hover:bg-opacity-20 active:scale-95"
                aria-label="View"
                wire:click="$dispatch('openModal', {{ \Illuminate\Support\Js::from(['component' => 'note.show', 'arguments' => ['note' => $note->id]]) }})">
                <flux:icon.eye class="size-4" />
            </button>

            {{-- delete --}}
            <flux:modal.trigger name="delete-{{ $note->id }}">
                <button
                    class="{{ $btnBgClass }} {{ $textClass }} inline-flex cursor-pointer items-center rounded-md p-1.5 transition hover:scale-105 hover:bg-opacity-20 active:scale-95">
                    <flux:icon.trash class="size-4" />
                </button>
            </flux:modal.trigger>
            <flux:modal name="delete-{{ $note->id }}">
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
                            variant="danger"> Delete Note</flux:button>
                    </div>
                </div>
            </flux:modal>
        </div>


    </div>
</div>
