<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Validator;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('user.list', compact('users'));
 
    }
    public function create(Request $request)
    {
        $roles = Role::get();
        return view('user.create', compact('roles'));
 
    }
    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'email' => 'required|max:100|unique:users',
            'password'        => 'required|max:20|min:6',
            // 'image' => 'mimes:jpeg,jpg,png,gif|nullable' // max 10000kb
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = new User();
        $user->name = $request->name;
        $user->email  = $request->email;
        $user->password  = Hash::make($request->password);
        $user->usertype  = $request->user_type;
        $user->role_id  = $request->role;

        $user->save();



        return redirect()->route('user.index')->with('success', 'Saved Sucessfully');
    }
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get();
        return view('user.edit', compact('user','roles')); 
    }
    public function update(Request $request)
    {
        $id=$request->id;
        $validator = validator::make($request->all(), [
            'email' => ['required','max:100',\Illuminate\Validation\Rule::unique('users')->ignore($id)],
            // 'image' => 'mimes:jpeg,jpg,png,gif|nullable' // max 10000kb
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->email  = $request->email;
        //$user->password  = Hash::make($request->password);
        if($user->usertype!='super_admin')
        {
        $user->usertype  = $request->usertype;
        }
        $user->role_id  = $request->role;

        $user->save();
        return redirect()->route('user.index')->with('success', 'Saved Sucessfully');

    }
}
