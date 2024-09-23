@props(['name', 'selectedSubject', 'subjectCode'])

<div 
    x-data="{ show : false, name: '{{ $name }}' }"
    x-show="show"
    x-on:open-modal.window="show = ($event.detail.name === name)"
    x-on:close-modal.window="show = false"
    x-on:keydown.escape.window="show = false"
    x-transition
    style="display: none"
    class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50"
>
    <div class="bg-white p-6 rounded-lg">
        @if ($selectedSubject)
            <h1 class="text-2xl font-bold mb-2">{{ $selectedSubject->name }}</h1>
            <p class="text-lg">Subject Code: {{ $subjectCode }}</p>
        @else
            <p>No subject selected.</p>
        @endif
    <div class="mt-4 flex justify-center">
        <button 
            class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600"
            @click="$dispatch('close-modal')">
            Close
        </button>
    </div>
    </div>
</div>