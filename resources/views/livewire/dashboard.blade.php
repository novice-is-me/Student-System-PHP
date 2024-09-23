<div wire:poll.keep-alive>
    @if ($courses->count() <= 0)
        <a wire:click='' href="/enrollment" class="bg-slate-400 p-3 rounded-[20px] hover:cursor-pointer">Add Course</a>
    @endif

    <h2 class="mt-5 text-3xl font-bold mb-2">Enrolled Course</h2>
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
                <th>Options</th>
            </x-slot>
            <x-slot name="tbody">
                @if ($subjects->count() > 0)
                @foreach ($subjects as $subject)
                    @php
                    $subjectCode = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
                    @endphp
                    <tr wire:key='{{ $subject->id }}' class="flex justify-evenly font-medium text-center p-5">
                        <td>{{ $subjectCode }}</td>
                        <td>{{ $subject->name }}</td>
                        <td></td>
                        @if ($subject->user_id === Auth::user()->id)
                            <td>
                                <a wire:click='enroll({{ $subject->id }})' class="bg-blue-400 p-2 rounded-[20px] hover:cursor-pointer">Enrolled</a>
                                <a wire:click='check({{ $subject->id }})' class=" bg-green-400  p-2 rounded-[20px] hover:cursor-pointer" >View</a>
                            </td>
                        @else
                            <td>
                                <a wire:click='enroll({{ $subject->id }})' class="bg-red-400 p-2 rounded-[20px] hover:cursor-pointer">Enroll</a>
                                <a wire:click='check({{ $subject->id }})' class=" bg-green-300  p-2 rounded-[20px] hover:cursor-pointer">View</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                @else
                    <tr class="flex justify-evenly font-medium">
                        <td colspan="2">Enroll in a Course first</td>
                    </tr>
                @endif
            </x-slot>
        </x-table>
    </div>

    <!-- Move the modal outside of the subjects loop -->
    @if ($selectedSubject)
        <x-modal name="subject-details" :selectedSubject="$selectedSubject" :subjectCode="$subjectCode"/>
    @endif
    
</div>
