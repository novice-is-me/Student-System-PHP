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
    public $course_name;
    // public $trigger_course = false;
    public $specific_subject;
    public $specific_subject_name;
    public $specific_subject_id;
    public function mount($id){

        $this->course = Course::find($id);
        $this->subjects = $this->course->subjects;
        $this->course_name = $this->course->name;
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

    public function delete($id){
        $deletedSubject = Subject::find($id);

        if($deletedSubject){
            $deletedSubject->delete();

            $this->dispatch('close-delete-modal');
        }else{
            session()->flash('error', 'Subject not found');
        }
    }

    public function editCourseName(){

        $this->validate([
            'course_name' => 'string'
        ]);

        $this->course->update([
            'name' => $this->course_name
        ]);

        $this->dispatch('close-edit-name', name: 'edit_course_name');
    }

    public function setSubjectForEditing($subjectId){
        $this->specific_subject = Subject::find($subjectId);

        if ($this->specific_subject) {
            $this->specific_subject_id = $this->specific_subject->id;
            $this->specific_subject_name = $this->specific_subject->name;
        }
    }

    public function editSubjectName(){
        $subject = Subject::find($this->specific_subject_id);

        if ($subject) {
            $subject->update([
                'name' => $this->specific_subject_name 
            ]);
        } 

        $this->subjects->where('id', $this->specific_subject_id)->first()->name = $this->specific_subject_name;

        $this->dispatch('close-edit-name', name: 'edit_subject_name');
    }

    public function closeModal(){
        // $this->trigger_course = false;
        $this->dispatch('close-edit-name', name: 'edit_course_name');
    }

    public function render()
    {
        $subjects = $this->course->subjects;
        return view('livewire.edit-course', [
            'subjects' => $subjects
        ]);
    }
}
