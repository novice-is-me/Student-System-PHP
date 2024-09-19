<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $user;
    public $courses;
    public $subjects;
    
    public function mount(){
        
        $user = Auth::user();
        // Check if the user is not an admin
        if ($user->admin === 0) {
            $courses = $user->course;
            
            // Check if the user has no courses to avoid null errors
            if ($courses === null) {
                $courses = collect();  // Empty collection for courses
                $subjects = collect();  // Empty collection for subjects
            } else {
                $subjects = $courses->subjects;  // Retrieve subjects from the user's courses
            }
            
            // Set the properties so they can be used in the render method
            $this->user = $user;
            $this->courses = $courses;
            $this->subjects = $subjects;
            
        } else {
            // Logic for admin can be added here
            dd('not login');
        }
    }
    public function render()
    {
        
        return view('livewire.dashboard');
    }
}
