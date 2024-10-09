<div
x-data="{ view: false }"
x-show="view"
x-on:open-view-more.window="view = true"
x-on:close-view-more.window="view = false"
x-on:keydown.escape.window="view = false"
x-transition:enter="transition ease-out duration-300"
style="display: none"
class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50"
>
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">User Information</h5>
        <div>
            <p class="mb-3 text-2xl font-normal text-gray-700 dark:text-gray-400">Name:</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $user->first_name . " " . $user->last_name}}</p>
        </div>
        <div>
            <p class="mb-3 text-2xl font-normal text-gray-700 dark:text-gray-400">Course:</p>
                @if($course !== null)
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$course->name}}</p>
                @else
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Not enrolled in any course</p>
            @endif
        </div>
        <div>
            <p class="mb-3 text-2xl font-normal text-gray-700 dark:text-gray-400">Subject:</p>
                @if ($subjects !== null)
                    @if($subjects->count() > 0)
                        <ul class=" list-disc p-6 pt-0">
                            @foreach ($subjects as $subject)
                                <li class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $subject->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                @else
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Not enrolled at any subjects</p>
                @endif
        </div>
        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 hover:cursor-pointer focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" @click="$dispatch('close-view-more')">Close</button>
    </div>

</div>