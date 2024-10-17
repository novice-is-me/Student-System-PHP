@props([
    'action'
])
<div>
    <form wire:submit.prevent="{{ $action }}">
        {{ $slot }}
        <button class="bg-blue-300 px-4 py-2 rounded font-semibold hover:cursor-pointer" type="submit">Submit</button>
    </form>
</div>