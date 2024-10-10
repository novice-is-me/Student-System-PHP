<div class=" mb-4">
    <x-table>
        <x-slot name="thead">
            <th>Course</th>
            <th>Option</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($courses as $course )
            <tr wire:key='{{ $course->id }}' class="flex justify-evenly font-medium text-center p-5">
                <td>{{ $course->name}}</td>
                <td>
                    <a class="bg-blue-400 px-4 py-2 rounded hover:cursor-pointer" href="{{ route('edit-course', ['id' => $course->id]) }}">View</a>
                    <a class=" bg-red-400 px-4 py-2 rounded hover:cursor-pointer" wire:click='deleteCourse({{ $course->id }})'>Delete</a>
                </td>
            </tr>
        @endforeach
        </x-slot>
    </x-table>
</div>