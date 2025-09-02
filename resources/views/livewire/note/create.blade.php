<div>
    <form wire:submit="create">
        <label>
            <span>Name</span>
            <input type="text" wire:model="name" />
            @error('name')
                <em>{{ $message }}</em>
            @enderror
        </label>
        <label>
            <span>Note</span>
            <textarea wire:model="note"></textarea>
            <small>Charachters:<span x-text="$wire.note.length"></span></small>
            @error('note')
                <em>{{ $message }}</em>
            @enderror
        </label>
        <label>
            <span>Color</span>
            <input type="color" wire:model="color"></input>
            @error('color')
                <em>{{ $message }}</em>
            @enderror
        </label>
        <label>
            <span>Tags</span>

        </label>

        <button type="submit">Create</button>
    </form>
</div>
