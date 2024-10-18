<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class AddCourse extends Component
{
    public $course_name;
    public $subjects;
    public $new_subject;
    public array $added_subject = [];
    public $added_course;
    public function mount(){
        $this->course_name = Course::pluck('name');
    }

    public function addCourse(){
        // check if the field is empty
        if($this->new_subject === "" || $this->new_subject === null){
            $this->dispatch('close-edit-name', name: 'add_course');
        }else{
            // push added_subject to the array of new subjects
            array_push($this->added_subject, $this->new_subject);
            // clear the input field
            $this->reset('new_subject');
            // close the modal
            $this->dispatch('close-edit-name', name: 'add_course');
        }
    }   

    public function submitForm(){
      
        $this->validate([
            'added_course' => 'required|string',
            'added_subject' => 'required|array|min:1',
        ], 
        [
            'added_course.required' => 'Course is required',
            'added_subject.required' => 'Subject is required'
        ]
        );
       
        
        if($this->added_course !== $this->course_name){
            // add the added course to the database
            $course = Course::create([
                'name' => $this->added_course
            ]);

            // add the added subjects to the database
            foreach($this->added_subject as $subject){
                $course->subjects()->create([
                    'name' => $subject
                ]);
            }

            // redirect to the admin page
            return redirect()->route('admin');
        }
    }

    public function deleteSubject($index){
       unset($this->added_subject[$index]);

       $this->added_subject = array_values($this->added_subject);
    }

    public function render()
    {
        return view('livewire.add-course');
    }
}
