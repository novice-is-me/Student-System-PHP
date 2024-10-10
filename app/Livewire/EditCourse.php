<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class EditCourse extends Component
{

    public $course;
    public $subjects;

    public function mount($id){
        $this->course = Course::find($id);
        $this->subjects = $this->course->subjects;
    }

    public function addSubject(){

        $this->dispatch('add-subject');
    }

    public function delete($id){

    }

    public function render()
    {
        return view('livewire.edit-course');
    }
}
