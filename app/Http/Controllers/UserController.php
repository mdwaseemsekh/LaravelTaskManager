<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
       return view('login') ;
    }
    public function check(Request $request){
    $validation = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    if(Auth::attempt($validation)){
        return redirect()->to('/');
    }

    }

    public function register(){
    return view('register');
    }
    public function save(){

    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->to('/login');
        }
    }
    
}
