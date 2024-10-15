
<div
x-data="{ editCourseName: false }"
x-show="editCourseName"
x-on:open-edit-name.window="editCourseName = true"
x-on:close-edit-name.window="editCourseName = false"
x-on:keydown.escape.window="editCourseName = false"
x-transition:enter="transition ease-out duration-300"
style="display: none"
class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50">

<div class="bg-white p-6 rounded-lg">
    <form wire:submit.prevent='editCourseName' class="max-w-sm mx-auto">
        <div class="mb-5">
            <label for="new_subject" class="block mb-2 text-sm font-medium text-gray-900 ">Course Name:</label>
            <input type="text" id="course_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" wire:model='course_name'/>
        </div>
        <button class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 hover:cursor-pointer focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="submit">Update</button>

        <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 hover:cursor-pointer focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" @click="$dispatch('close-edit-name')"> Cancel</button>
    </form>
</div>
</div>