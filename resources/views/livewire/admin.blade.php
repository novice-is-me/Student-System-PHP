<div>
    <p class=" text-center text-2xl font-bold mb-4 uppercase">User in System</p>
        <x-table>
            <x-slot name="thead" >
                <th>Name</th>
                <th>Email</th>
                <th>Options</th>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($users as $user )
                    <tr wire:key='{{ $user->id }}' class="flex justify-evenly font-medium text-center p-5">
                        <td>{{ $user->first_name . " " . $user->last_name}}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a class=" bg-red-400 px-4 py-2 rounded hover:cursor-pointer" wire:click='userDetails({{ $user->id }})'>Edit</a>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        {{-- For edit view --}}
        @if ($chosenUser)
            {{-- <x-edit-student-modal name="edit-student" :user='$chosenUser'/> --}}
            {{-- Must be a form --}}
            @include('components.edit-student-modal', ['user' => $chosenUser])
        @endif

        @if($selectedUser)
            @include('components.view-more', [
                'course' => $course,
                'subjects' => $subject,
                'user' => $chosenUser
            ])
        @endif
</div>      
