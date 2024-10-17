<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class AddCourse extends Component
{
    public $course;
    public $subjects;
    public $new_subject;
    public function mount(){
        $this->course = Course::all();
        $this->new_subject = collect();
    }

    public function submitForm(){
        $this->validate([
            'course_name' => 'required|string'
        ]);

        //Check if there is no existing course

        //dispatch something

        // fetch 
        $course = Course::create([
            'name' => $this->course_name
        ]);

    }



    public function render()
    {
        return view('livewire.add-course');
    }
}
