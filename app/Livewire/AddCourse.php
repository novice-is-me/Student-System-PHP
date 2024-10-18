<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class AddCourse extends Component
{
    public $course;
    public $subjects;
    public $new_subject;
    public array $added_subject = [];
    public function mount(){
        $this->course = Course::all();
    }

    public function addCourse(){
        // check if the field is empty
        if($this->new_subject === "" || $this->new_subject === null){
            $this->dispatch('close-edit-name', name: 'add_course');
        }else{
            // push added_subject to the array of new subjects
            array_push($this->added_subject, $this->new_subject);
            // clear the input field
            $this->reset('new_subject');
            // close the modal
            $this->dispatch('close-edit-name', name: 'add_course');
        }
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
