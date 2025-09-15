@props(['label', 'name', 'text' => 'text-white', 'placeholder' => ''])

<label class="flex flex-col space-y-2">
    {{-- The x-data directive now wraps everything, giving the button and textarea a shared scope. --}}
    <div x-data="{
        boldSelection: function() {
            // Get the textarea element using a reference from Alpine.js.
            const textarea = this.$refs.textarea;
    
            // Get the start and end positions of the user's text selection.
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
    
            // Check if any text is actually selected.
            if (start === end) {
                return;
            }
    
            // Extract the selected text from the textarea's value.
            const selectedText = textarea.value.substring(start, end);
    
            // Construct the new text by wrapping the selected text with bold (<b>) tags.
            const newText = textarea.value.substring(0, start) + '<b>' + selectedText + '</b>' + textarea.value.substring(end);
    
            // Update the textarea's value and dispatch an 'input' event to Livewire.
            textarea.value = newText;
            textarea.dispatchEvent(new Event('input'));
        }
    }">

        {{-- This wrapper now handles the label and button alignment --}}
        <div class="flex items-center justify-between">
            <p class="{{ $text }} text-sm capitalize">{{ $label }}</p>

            {{-- The bold button is now inside the correct x-data scope. --}}
            <button type="button"
                class="{{ $text }} {{ $text == 'text-white' ? 'bg-black/20 hover:bg-black/30' : 'bg-white/60 hover:bg-white/50' }} {{ $text == 'text-white' ? 'border-white/20' : 'border-gray-200' }} shadow-xs mb-1 cursor-pointer rounded-md border px-2.5 py-1 text-sm font-bold shadow-gray-500 transition-all duration-200 ease-in-out"
                @click="boldSelection()">
                B
            </button>
        </div>

        {{-- The textarea element remains the same, with the x-ref directive. --}}
        <textarea x-ref="textarea" placeholder="{{ $placeholder }}" {{ $attributes }}
            class="focus:border-accent dark:focus:border-accent-content shadow-xs {{ $errors->has($name) ? 'outline-1 outline-red-400 dark:outline-red-500' : 'border-transparent' }} w-full rounded-lg border bg-white/75 px-2 py-2 text-base text-gray-900 outline-0"></textarea>
        <div class="{{ $text }} font-semibol flex justify-end text-xs">
            <p>content can be filled with pure html</p>
        </div>
    </div>

    <x-must.error error="{{ $name }}" />
</label>
