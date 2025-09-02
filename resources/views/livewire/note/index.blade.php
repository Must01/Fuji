<div class="grid grid-cols-1 gap-2 p-2 text-center sm:grid-cols-3 sm:gap-3 sm:p-3">
    @foreach ($notes as $note)
        <livewire:note.note-card :key="$note->id" :note="$note" />
    @endforeach
</div>
