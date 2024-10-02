@props(['course'])
<div
    x-data="{ enrollModal: false }"
    x-show="enrollModal"
    x-on:open-enroll-modal.window="enrollModal = true"
    x-on:close-enroll-modal.window="enrollModal = false"
    x-on:keydown.escape.window="enrollModal = false"
    x-transition:enter="transition ease-out duration-300"
    {{-- style="display: none" --}}
    class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50"
>
    <div class="bg-white p-6 rounded-lg">
        <h1 class=" text-2xl text-green-600 font-bold">Success!</h1>
        <p>You are now enrolled at course: {{ $course->name }} </p>
        <div class="mt-4 flex justify-center">
            <button class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600" @click="$dispatch('close-success-modal')">Close</button>
        </div>
    </div>
</div>