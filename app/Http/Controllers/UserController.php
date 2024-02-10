<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }

    public function signup(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('signup');
    }
    
    public function signupPost(Request $req){
        $req->validate([
            'username' =>'required|alpha',
            'email' => 'required|email|unique:users',
            'password' => 'required|size:8',
        ]);

        $data['name'] = $req->username;
        $data['email'] = $req->email;
        $data['password'] = Hash::make($req->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('signup'))->with("error","Failed to SignUp");
        }
        return redirect(route('login'))->with("success","SignUp successful, please login");
    }

    public function loginPost(Request $req){
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $req->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error","Login credentials are not valid");
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
