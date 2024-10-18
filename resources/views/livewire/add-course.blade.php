<div>
    <div class=" mb-4">
        <a href="{{ route('admin')}}" class="bg-black px-4 py-2 rounded hover:cursor-pointer text-white">< Back</a>
    </div>
    <x-form name="submit" :action="'submitForm'">
        <div class=" mb-4">
            <x-label name="course_name">Course Name</x-label>
            <x-input name="course_name" type="text" :model="'added_course'"/>
            @error('added_course')
                <x-error>{{ $message }}</x-error>
            @enderror
        </div>

        <div class=" mb-5">
            <a class="bg-green-300 px-4 py-2 rounded font-semibold hover:cursor-pointer" @click="$dispatch('open-edit-name', {
                name: 'add_course'
            })">Add Subject +</a>
        </div>

        <x-table>
            <x-slot name="thead">
                <th>Subject</th>
                <th>Options</th>
            </x-slot>
            <x-slot name="tbody">
                @if ($added_subject != null)
                    @if($added_subject != 0)
                        @foreach ($added_subject as $index => $subject)
                            <tr class="flex justify-evenly font-medium text-center p-5">
                                <td>{{ $subject }}</td>
                                <td>
                                    <a wire:click='deleteSubject({{ $index }})' class=" bg-red-400 px-4 py-2 rounded hover:cursor-pointer">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="flex justify-evenly font-medium text-center p-5">
                            <td class="">
                                <p>No subject</p>
                            </td>
                        </tr>
                    @endif
                @endif
               
            </x-slot>
        </x-table>
        @error('added_subject')
            <x-error>{{ $message }}</x-error>
        @enderror
    </x-form>
    
    <x-edit-name 
        name="add_course"
        :function_name="'addCourse'"
        :title="'Add Subject'"
        :has_model="false"
        :data_model="'new_subject'"
    />
</div>
