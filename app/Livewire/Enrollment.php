<?php

namespace App\Livewire;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Enrollment extends Component
{
    public $user;
    public $courses;

    public function mount(){
        $this->user = Auth::user();
        $this->courses = Course::all();
    }
    public function render()
    {
        return view('livewire.enrollment');
    }
}
