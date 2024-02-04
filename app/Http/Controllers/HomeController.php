<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Validator;
use App\Models\User;
use illuminate\Support\Facades\Facade;
use illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        
        $user = User::select('name','email')->where('id',$id)->first();

        return view('home',['id' => $id,'user' => $user]);
    }
    public function profile()
    {
        $id = Auth::user()->id;
        
        $user = User::where('id',$id)->first();

        return view('profile',['id' => $id,'user' => $user]);
    }
}
