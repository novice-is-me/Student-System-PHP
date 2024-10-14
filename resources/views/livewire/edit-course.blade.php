<div wire:poll>
    <a href="{{ route('admin')}}" class="bg-black px-4 py-2 rounded hover:cursor-pointer text-white">< Back</a>
    <div class=" flex items-center gap-4 mt-4">
        <h3 class=" text-3xl font-semibold">{{ $course->name }}</h3>
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24" class=" hover:cursor-pointer">
            <path d="M 19.171875 2 C 18.448125 2 17.724375 2.275625 17.171875 2.828125 L 16 4 L 20 8 L 21.171875 6.828125 C 22.275875 5.724125 22.275875 3.933125 21.171875 2.828125 C 20.619375 2.275625 19.895625 2 19.171875 2 z M 14.5 5.5 L 3 17 L 3 21 L 7 21 L 18.5 9.5 L 14.5 5.5 z"></path>
        </svg>
    </div>
    <div class=" flex justify-between items-center">
        <p class=" text-xl font-bold my-4">Subjects Under this Course:</p>
        <a class="bg-green-300 px-4 py-2 rounded font-semibold hover:cursor-pointer" @click="$dispatch('open-add-subject')">Add Subject +</a>
    </div>
    @if(session('success'))
        <div class=" p-4 bg-green-200 rounded-[20px] mb-4">
            <p class=" font-semibold text-xl">{{ session('success')}}</p>
        </div>
    @elseif (session('error'))
        <div class=" p-4 bg-red-200 rounded-[20px] mb-4">
            <p class=" font-semibold text-xl">{{ session('error')}}</p>
        </div>
    @endif
    <div class=" mb-7">
        <x-table>
            <x-slot name="thead">
                <th>Subject</th>
                <th>Options</th>
            </x-slot>
            <x-slot name="tbody">
                @if($subjects != null)
                    @if($subjects->count() > 0)
                        @foreach ($subjects as $subject)
                            <tr wire:key='{{ $subject->id }}' class="flex justify-evenly font-medium text-center p-5">
                                <td>{{ $subject->name }}</td>
                                <td>
                                    <a class=" bg-green-400 px-4 py-2 rounded hover:cursor-pointer" href="">Edit</a>
                                    <a class=" bg-red-400 px-4 py-2 rounded hover:cursor-pointer" href="">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="flex justify-evenly font-medium text-center p-5">
                            <td class="">
                                <a href="" class="bg-green-300 px-4 py-2 rounded font-semibold hover:cursor-pointer" @click="$dispatch('open-add-student')">Add Subject + </a>
                            </td>
                        </tr>
                    @endif
                @endif
            </x-slot>
        </x-table>
    </div>

    @include('components.add-subject-modal')
</div>
