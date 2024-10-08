<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function welcome(){
        return view('welcome');
    }

    public function register(){
        return view('auth.register');
    }

    public function login(){ 
        return view('auth.login'); 
    }

    public function index(){

        // checking user role
        $user = Auth::user();
        // for user 
        if($user->admin === 0){
            $courses = $user->course; 
            // dd($courses);
    
            // This is to check if the user has any course and avoid null errors
            if($courses === null){
                $courses = collect();
                $subjects = collect();
            } else {
                $subjects = $courses->subjects;
                // dd($subjects);
            }
                 
            return view('livewire.student.dashboard')->with([
                'user' => $user,
                'courses' => $courses,
                'subjects' => $subjects
            ]);

        }else{
            // for admin bro
            
        }
    }

    public function enrollment(){
        dd('not login');
        return view('livewire.enrollment');
    }

    public function addSubject(Request $request){
        $user = Auth::user();

        return view('student.subject');
    }

    public function enrollCourse(Request $request){
        // dd($request->input('course_name'));

        // check if the user is logged in / authenticated
        $user = Auth::user();
        if($user){
            // dd($user->course);
            // if user is logged in, check if the user is enrolled in a course
           if($user->course === null){
               // if user is not enrolled in a course, enroll the user in a course
               $course = Course::where('name', $request->input('course_name'))->first();
            //    dd($course);
               $user->course = $course->id;
               $course->user_id = $user->id;
            //    dd($course->user_id);
               $course->save();

               return redirect('/dashboard');
           } else {
                // if user is already enrolled in a course, redirect to dashboard
                return redirect('/dashboard');
           }

        }else{
            // if not login, redirect to login page
            return redirect('/login');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}
