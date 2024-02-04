<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Validator;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $catgorys =ProductCategory ::get();
        return view('productcatgory.list', compact('catgorys'));
 
    }
    public function create()
    {
        return view('productcatgory.create');
 
    }
    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required|max:100|unique:product_categories',
            // 'image' => 'mimes:jpeg,jpg,png,gif|nullable' // max 10000kb
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $role = new ProductCategory();
        $role->name = $request->name;
        $role->save();
        return redirect()->route('productcategory.index')->with('success', 'Saved Sucessfully');

    }


       
}

