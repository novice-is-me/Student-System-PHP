<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $subjects = $courses->subjects;
        
        return view('student.dashboard')->with([
            'user' => $user,
            'courses' => $courses,
            'subjects' => $subjects
        ]);
    }

    public function addSubject(Request $request){
        $user = Auth::user();

        return redirect('/dashboard');
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}
