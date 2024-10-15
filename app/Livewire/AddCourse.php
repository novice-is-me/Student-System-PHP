<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class AddCourse extends Component
{
    public $course;
    public $subjects;
    public function mount(){
        $this->course = Course::all();

    }

    public function render()
    {
        return view('livewire.add-course');
    }
}
