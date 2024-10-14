<div
    x-data="{ deleteModal: false, subjectId: null }"
    x-show="deleteModal"
    x-on:open-delete-modal.window="deleteModal = true; subjectId = $event.detail.id"
    x-on:close-delete-modal.window="deleteModal = false; subjectId = null"
    x-on:keydown.escape.window="deleteModal = false"
    x-transition:enter="transition ease-out duration-300"
    style="display: none"
    class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50"
>
    <div class="bg-white p-6 rounded-lg">
        <h1 class=" text-2xl text-red-600 font-bold text-center">Warning!</h1>
        <p>Are you sure you want to delete this?</p>
        <div class="mt-4 flex justify-center gap-4">
            <!-- Use Alpine.js variable for the Livewire deleteSubject method -->
            <button class="bg-red-500 text-black px-4 py-2 rounded hover:bg-red-700"
                    @click="$wire.deleteSubject(subjectId)">Delete</button>
            <button class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-700"
                    @click="$dispatch('close-delete-modal')">Cancel</button>
        </div>
    </div>
</div>
