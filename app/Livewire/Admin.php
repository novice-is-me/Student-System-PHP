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
    public $chosenUser;
    public $first_name;
    public $last_name;
    public $email;
    public $selectedUser;
    public $course;
    public $subject;

    public function mount(){

        $this->users = User::where('admin', 0)->get();
        $this->courses = Course::all();
        $this->subjects = Subject::all();

    }

    public function userDetails($id){
        $this->chosenUser = User::find($id);

        // Bind data in the form field for update form
        $this->first_name = $this->chosenUser->first_name;
        $this->last_name = $this->chosenUser->last_name;
        $this->email = $this->chosenUser->email;
        
        $this->dispatch('open-edit-student');
    }

    public function update(){

        $this->validate([
            'email' => 'string|email|max:255'
        ]);

        $this->chosenUser->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email
        ]);

        $this->users = User::all();

        $this->dispatch('close-edit-student');
    }

    public function viewMore($id){
        // Getting the selectedUser through the ID
        $this->selectedUser = User::find($id);
        
        // Assigning the selectedUser course and subject to the public variable
        if($this->selectedUser){
            if($this->selectedUser->course){
                $this->course = $this->selectedUser->course;
                $this->subject = $this->selectedUser->course->subjects;
            }
        }

        $this->dispatch('open-view-more');
        $this->dispatch('close-edit-student');
    }

    public function deleteCourse($id){

    }
    
    public function render()
    {
        return view('livewire.admin');
    }
}
