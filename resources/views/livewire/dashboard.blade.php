<div>
    @if ($courses->count() <= 0)
        <a wire:click='' href="/enrollment" class=" bg-slate-400 p-3 rounded-[20px] hover:cursor-pointer">Add Course</a>
    @endif
    <h2 class=" mt-5 text-3xl font-bold mb-2">Enrolled Course</h2>
    <div class="mt-2">
        <x-table>
            <x-slot name="thead">
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Course Unit</th>    
            </x-slot>
            <x-slot name="tbody">
                @php
                    $courseCode = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
                    $courseUnit = str_pad(rand(0, 24), 2, '1', STR_PAD_LEFT);
                @endphp
                @if ($courses->count() > 0)
                <tr class="flex justify-evenly font-medium">
                    <td>{{ $courseCode }}</td>
                    <td>{{ $courses->name }}</td>
                    <td>{{ $courseUnit }}</td>
                </tr>
                @else
                <tr class="flex justify-evenly font-medium">
                    <td colspan="3">No course enrolled yet</td>
                </tr>
                @endif
            </x-slot>
        </x-table>
    </div>
    
    <h2 class="mt-5 text-3xl font-bold mb-2">Subjects Available</h2>
    <div class="">
        <x-table>
            <x-slot name="thead">
                <th>Subject Code</th>
                <th>Course Title</th>
                <th>Enrolled</th>
            </x-slot>
            <x-slot name="tbody">
                @if ($subjects->count() > 0)
                @foreach ($subjects as $subject)
                    @php
                    $subjectCode = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
                    @endphp
                    <tr wire:key='{{ $subject->id }}' class="flex justify-evenly font-medium text-center">
                        <td>{{ $subjectCode }}</td>
                        <td>{{ $subject->name }}</td>
                        @if ($subject->user_id === Auth::user()->id)
                            <td>
                                {{-- Put here enrolled (red and green) --}}
                                <a wire:click='enroll' class="bg-slate-400 p-2 rounded-[20px] hover:cursor-pointer">Enrolled</a>
                            </td>
                        @else
                            <td>
                                {{-- Put here enrolled (red and green) --}}
                                <a wire:click='enroll' class="bg-slate-400 p-2 rounded-[20px] hover:cursor-pointer">Enroll</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                @else
                <tr class="flex justify-evenly font-medium">
                    <td colspan="2">Enrolled at Course first</td>
                </tr>
                @endif
            </x-slot>
        </x-table>
    </div>
</div>
    