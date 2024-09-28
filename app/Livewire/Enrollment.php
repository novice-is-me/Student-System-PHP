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

    public function enrollCourse($courseId){
        // Find that specific id
        $specificCourse = Course::find($courseId);
        
        // Check if user is enrolled in any course
        // Check the userId in course table
        $id = Auth::user()->id;
        $currentlyEnrolledCourse = Course::where('user_id', $id)->first();
        if($currentlyEnrolledCourse){
            dd('You are currently enrolled in another course');
            // create a event modal
        }else{
            dd('You are enrolled now');
            $specificCourse->user_id = $id;
            $specificCourse->save();

            // create an event modal
            
        }
    }
    public function render()
    {
        return view('livewire.enrollment');
    }
}
