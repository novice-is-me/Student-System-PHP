<div
x-data="{ showStudent: false }"
x-show="showStudent"
x-on:open-edit-student.window="showStudent = true"
x-on:close-edit-student.window="showStudent = false"
x-on:keydown.escape.window="showStudent = false"
x-transition:enter="transition ease-out duration-300"
style="display: none"
class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50"
>   
<div class="bg-white p-6 rounded-lg">
    <button class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 mb-5" wire:click='viewMore({{$user->id}})'>View More</button>
    
    <form wire:submit.prevent='update' class="max-w-sm mx-auto">
        <div class="mb-5">
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">First Name</label>
            <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 " 
            
            wire:model='first_name'/>
        </div>
        <div class="mb-5">
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Last Name</label>
            <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
            wire:model='last_name' />
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
            <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" 
            wire:model='email'/>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

        <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 hover:cursor-pointer focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" @click="$dispatch('close-edit-student')"> Cancel</a>
    </form>
</div>
</div>