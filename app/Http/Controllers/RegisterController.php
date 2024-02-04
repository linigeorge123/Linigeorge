<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Validator;
use App\Models\User;
use illuminate\Support\Facades\Facade;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|unique:users,email|max:50',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            
            return redirect()->route('register.create')
                ->withErrors($validator)
                ->withInput();
            
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();


        return redirect()->back()->with('success', 'Saved Sucessfully');
    }
}
