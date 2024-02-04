<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Role;


class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('role.list', compact('roles'));
    }
    public function create()
    {
        return view('role.create');
    }
    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required|max:100|unique:roles',
            // 'image' => 'mimes:jpeg,jpg,png,gif|nullable' // max 10000kb
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $role = new Role();
        $role->name = $request->name;
        $role->save();



        return redirect()->route('role.index')->with('success', 'Saved Sucessfully');
    }
    public function edit($id)
    {
        $role = Role::find($id);
        return view('role.edit', compact('role'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $validator = validator::make($request->all(), [
            'name' => ['required', \Illuminate\Validation\Rule::unique('roles')->ignore($id)],
            // 'image' => 'mimes:jpeg,jpg,png,gif|nullable' // max 10000kb
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();



        return redirect()->route('role.index')->with('success', 'Saved Sucessfully');
    }
    public function destroy($id)
    {
        $role = User::where('role_id',$id)->get();
        if(count($role)==0)
        {
            $role = Role::find($id);
            $role->delete();
            return redirect()->route('role.index')->with('success', 'Deleted Sucessfully');

        }
        else
        {
           
            return redirect()->back()->with('error', "Sorry This role assigned for User, so can't be deleted !");

        }

    }
}
