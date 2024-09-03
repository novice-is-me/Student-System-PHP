@extends('layouts.app')

@section('content')
    <h2 class=" mt-5 text-3xl font-bold mb-2">Enrolled Course</h2>
    <div class="">
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
                <tr class="flex justify-evenly font-medium">
                    <td>{{ $courseCode }}</td>
                    <td>{{ $courses->name }}</td>
                    <td>{{ $courseUnit }}</td>
                </tr>
            </x-slot>
        </x-table>
    </div>

    <h2 class="mt-5 text-3xl font-bold mb-2">Subject Enrolled</h2>
    <div class="">
        <x-table>
            <x-slot name="thead">
                <th>Subject Code</th>
                <th>Course Title</th>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($subjects as $subject)
                    @php
                        $subjectCode = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
                    @endphp
                    <tr class="flex justify-evenly font-medium text-center">
                        <td>{{ $subjectCode }}</td>
                        <td>{{ $subject->name }}</td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
    </div>
@endsection