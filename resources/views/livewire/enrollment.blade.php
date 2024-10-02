<div>
    <h1 class=" text-red-600 font-bold text-4xl text-center">Enrollment Section</h1>

    <div class=" mt-4">
        <h3 class=" text-xl font-semibold">Available Courses:</h3>
        <x-table>
            <x-slot name="thead">
                <th>Available Course</th>
                <th>Options</th>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($courses as $course)
                    <tr wire:key='{{ $course->id }}' class=" flex justify-evenly bg-red-100">
                        <td class=" my-auto">
                            {{$course->name}}
                            <input type="hidden" name="course_name" value="{{$course->name}}">
                        </td>
                        <td class=" py-4">
                                <button wire:click='enrollCourse({{$course->id}})'  class=" bg-green-400 p-2 rounded-[20px] hover:cursor-pointer">Enroll</button>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        {{-- Enrollment course modal --}}
        @dd($specificCourse)
        <x-enroll-modal name="course-enroll" :course='$specificCourse'/>
    </div>
</div>
