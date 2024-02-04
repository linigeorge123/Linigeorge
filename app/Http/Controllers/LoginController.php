<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        //return view('auth.login');
    }
    public function login()
    {
        return view('auth.login');
    }
    
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // $credentials = $request->only('email','password');
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(auth::attempt($credentials)){
            return redirect()->route('profile.index')->with('success', 'Login success');
            // app()->call('App\Http\Controllers\HomeController@index');

        }
        return back()->with("error","Invalid email or password");
        // return redirect("login")->withSuccess('Login details are not valid');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('login');
    }
}
