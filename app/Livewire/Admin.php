<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Course;
use App\Models\Subject;

class Admin extends Component
{

    public $users;

    public $courses;

    public $subjects;

    public function mount(){

        $this->users = User::all();
        $this->courses = Course::all();
        $this->subjects = Subject::all();

    }

    public function view($id){

        $this->dispatch('open-edit-student', name: 'edit-student');
        dd($id);
    }

    public function render()
    {
        return view('livewire.admin');
    }
}
