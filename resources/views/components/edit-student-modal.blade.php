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
        <p>{{ $user->first_name }}</p>
        <form action="">
            
        </form>
    </div>
</div>