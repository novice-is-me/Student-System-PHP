<?php

namespace App\Livewire;

use App\Models\Course;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class EditCourse extends Component
{

    public $course;
    public $subjects;
    public $new_subject;

    public function mount($id){
        $this->course = Course::find($id);
        $this->subjects = $this->course->subjects;
    }

    public function addSubject(){
        // Adding a subject to the specific Course

        $this->validate([
            'new_subject' => 'string'
        ]);

        $this->course->subjects()->create([
            'name' => $this->new_subject
        ]);

        $this->dispatch('close-add-subject');
    }

    public function delete($id){

    }

    public function render()
    {
        return view('livewire.edit-course');
    }
}
