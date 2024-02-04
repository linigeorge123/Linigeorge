<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Validator;

class ProductController extends Controller
{
    public function index()
    {
        $Products =Product ::get();
        return view('product.index', compact('Products'));
 
    }
    public function create()
    {    
        $catgorys =ProductCategory ::get();
        return view('product.create',compact('catgorys'));
 
    }
    public function store(Request $request)
    {    
        $validator = validator::make($request->all(), [
            'name' => 'required|max:100|unique:products',
           // 'image' => 'mimes:jpeg,jpg,png,gif|nullable' // max 10000kb
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $name='';
    if ($request->hasFile('image')) {
        $image           = $request->file('image');
        $name = 'product-' . time() . '.' . $image->getClientOriginalName();
        $destinationPath = public_path('/uploads/product');
        $image->move($destinationPath, $name);

       
    }
        $product = new Product();
        $product->name = $request->name;
        $product->catgory_id = $request->catgory_id;
        $product->image=$name;
        $product->save();
        return redirect()->route('product.index')->with('success', 'Saved Sucessfully');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $catgorys =ProductCategory ::get();
        return view('product.edit', compact('product','catgorys')); 
    }
    public function update(Request $request)
    {   
        $id=$request->id; 
        $validator = validator::make($request->all(), [
            'name' => ['required', \Illuminate\Validation\Rule::unique('products')->ignore($id)],

           // 'image' => 'mimes:jpeg,jpg,png,gif|nullable' // max 10000kb
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $product =Product::find($id);
        $name=$product->image;
    if ($request->hasFile('image')) {
        $image           = $request->file('image');
        $name = 'product-' . time() . '.' . $image->getClientOriginalName();
        $destinationPath = public_path('/uploads/product');
        $image->move($destinationPath, $name);

       
    }
        $product->name = $request->name;
        $product->catgory_id = $request->catgory_id;
        $product->image=$name;
        $product->save();
        return redirect()->route('product.index')->with('success', 'Saved Sucessfully');
    }
    public function destroy($id)
    {
        
            $role = Product::find($id);
            $role->delete();
            return redirect()->route('product.index')->with('success', 'Deleted Sucessfully');

       

    }
}
