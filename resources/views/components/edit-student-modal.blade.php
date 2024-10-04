@props(['user'])
<div
    x-data="{ showStudent: false }"
    x-show="showStudent"
    x-on:open-edit-modal.window="showStudent = true"
    x-on:close-edit-modal.window="showStudent = false"
    x-on:keydown.escape.window="showStudent = false"
    x-transition:enter="transition ease-out duration-300"
    style="display: none"
    class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50"
>
    hello
</div>