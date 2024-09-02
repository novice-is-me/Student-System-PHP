@extends('layouts.app')

@section('content')
    <h1>STUDENT DASHBOARD</h1>
    <h4>Hello  {{ $user->last_name }} {{ $user->first_name }}!</h4>
    
    <h2 class=" mt-5">Enrolled Course</h2>
    <div class=" border border-green-200 flex ">
        <table class=" border ">
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Course Unit</th>
                    <th>Course Description</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
@endsection