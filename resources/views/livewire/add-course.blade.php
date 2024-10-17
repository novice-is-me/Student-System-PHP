<div>
    <x-form name="Submit" :action="'submitForm'">
        <div class=" mb-4">
            <x-label name="course_name">Course Name</x-label>
            <x-input name="course_name" type="text" />
        </div>

        <div class=" mb-5">
            <a class="bg-green-300 px-4 py-2 rounded font-semibold hover:cursor-pointer" @click="$dispatch('open-add-subject')">Add Subject +</a>
        </div>

        <x-table>
            <x-slot name="thead">
                <th>Subject</th>
                <th>Options</th>
            </x-slot>
            <x-slot name="tbody">
                @if ($new_subject != null)
                    @if($new_subject->count() > 0)
                        @foreach ($new_subject as $subject)
                            <tr wire:key='{{ $subject->id }}' class="flex justify-evenly font-medium text-center p-5">
                                <td>{{ $subject->name }}</td>
                                <td>
                                    <a class=" bg-red-400 px-4 py-2 rounded hover:cursor-pointer" @click="$dispatch('open-delete-modal', { id: {{ $subject->id }}})">Delete</a>
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
    </x-form>
    
    {{-- <x-edit-name 
        name=""
        :function_name="''"
        :data_model="''"
        :title="'Add Subject'"
        :close_modal="''"
        :id="$specific_subject_id"
        :has_parameter=""
    /> --}}
</div>
