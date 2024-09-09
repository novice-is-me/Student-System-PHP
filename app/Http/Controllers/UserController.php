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

        $user = Auth::user();
        $courses = $user->course; 

        // This is to check if the user has any course and avoid null errors
        if($courses === null){
            $courses = collect();
            $subjects = collect();
        } else {
            $subjects = $courses->subjects;
        }
             
        return view('student.dashboard')->with([
            'user' => $user,
            'courses' => $courses,
            'subjects' => $subjects
        ]);
    }

    public function enrollment(){
        $user = Auth::user();
        $courses = Course::all();
       
        return view('student.enrollment')->with([
            'user' => $user,
            'courses' => $courses
        ]);
    }

    public function addSubject(Request $request){
        $user = Auth::user();

        return view('student.subject');
    }

    public function enrollCourse(Request $request){
        dd($request->input('course_name'));

        // check if the user is logged in / authenticated
        $user = Auth::user();

        if($user){
            // enroll the user to the course
           

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
