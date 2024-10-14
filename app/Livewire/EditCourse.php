<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Subject;
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

        $existingSubject = $this->subjects->firstWhere('name', $this->new_subject);
        
        if(!$existingSubject){
            $this->course->subjects()->create([
                'name' => $this->new_subject
            ]);
            session()->flash('success', 'Subject has been added succesfully.');
        }else{
            session()->flash('error', 'Subject already exist');
        }

        $this->dispatch('close-add-subject');
    }

    public function deleteSubject($id){
        $deletedSubject = Subject::find($id);

        if($deletedSubject){
            $deletedSubject->delete(); 
             
            $this->dispatch('close-delete-modal');
        }else{
            session()->flash('error', 'Subject not found');
        }
    }

    public function render()
    {
        $subjects = $this->course->subjects;
        return view('livewire.edit-course', [
            'subjects' => $subjects
        ]);
    }
}
