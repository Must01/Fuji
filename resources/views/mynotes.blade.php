<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="min-h-1/4 flex overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <livewire:note.create />
        </div>
        <div class="relative h-full flex-1 rounded-xl border border-neutral-200 dark:border-neutral-700">
            <livewire:note.index />
        </div>
    </div>
</x-layouts.app>
