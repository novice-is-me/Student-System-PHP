<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Subject;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Dashboard extends Component
{
    public $user;
    public $courses;
    public $subjects;

    public $selectedSubject;
    
    public function mount(){

        $this->user = Auth::user();
        // Check if the user is not an admin
        if ($this->user->admin === 0) {
            $this->courses = $this->user->course;
            
            // Check if the user has no courses to avoid null errors
            if ($this->courses === null) {
                $this->courses = collect();  // Empty collection for courses
                $this->subjects = collect();  // Empty collection for subjects
            } else {
                $this->subjects = $this->courses->subjects;  // Retrieve subjects from the user's courses
            }
            
        } else {
            // Logic for admin can be added here
            dd('not login');
        }
        
    }

    public function check(Subject $subject)
    {
        $this->selectedSubject = $subject;
        $this->dispatch('open-modal', name : 'subject-details');
    }

    public function enroll($subjectId){
        // Logic for enrolling in a course can be added here
        $selectedSubject = Subject::find($subjectId);
        $id = Auth::user()->id;

        if($selectedSubject->user_id === $id){
            $selectedSubject->user_id = null;
        }else{
            $selectedSubject->user_id = $id;
        }

        $selectedSubject->save();
        $this->subjects = $this->courses->subjects;
                
        $this->dispatch('open-success-modal', ['name' => 'success-modal']);
    }

    public function render()
    {

        return view('livewire.dashboard');
    }
}
