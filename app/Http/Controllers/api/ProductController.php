<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class ProductController extends BaseController
{
    public function product_image(Request $request)
    {
        $product_id=$request->product_id;
        $fileName = 'image';
        $file = $request->file($fileName);
        if (empty($file)) {
            $result['alert']['title'] = array(
                'text' => 'product'
            );
            $result['alert']['message'] = array(
                'text' => 'Please select file'
            );
            $msg = 'Success';
            $code = 0;
            return $this->sendResponse($result, $msg, $code);
        }
        $get_data = Product::where('id',$product_id )->first();
        if($get_data=='')
        {
            $result['alert']['title'] = array(
                'text' => 'product'
            );
            $result['alert']['message'] = array(
                'text' => 'Product not found'
            );
            $msg = 'Success';
            $code = 0;
            return $this->sendResponse($result, $msg, $code); 
        }

        $product_image = time() . $file->getClientOriginalName();
        $product_image = str_replace(' ', '-', $product_image);
        $check = $file->move(public_path() . "/uploads/product/", $product_image);
        if ($check) {
            if ($get_data) {
                $product_image_save = Product::where('id', $product_id)->update(['image' => $product_image]);
            }
            $result['toast']['title'] = array(
                'text' => 'Product'
            );
            $result['toast']['message'] = array(
                'text' => 'Profile image updated'
            );
            if (!$product_image_save) {
                $result['alert']['title'] = array(
                    'text' => 'product'
                );
                $result['alert']['message'] = array(
                    'text' => 'Can not store the file'
                );
                $msg = 'Success';
                $code = 0;
                return $this->sendResponse($result, $msg, $code);
            }
        }
        $msg = 'Success';
        $code = 0;
        return $this->sendResponse($result, $msg, $code);
    }
    public function product_list(Request $request)
    {
        $products= product::get();
        if($products=='')
        {
            $result['alert']['title'] = array(
                'text' => 'product'
            );
            $result['alert']['message'] = array(
                'text' => 'No Products found'
            );
            $msg = 'Success';
            $code = 0;
            return $this->sendResponse($result, $msg, $code); 
        }
            // return $active;
        //$sis= array_unique($active);
        //$active = array_unique( $active->toArray() );
        
        
        foreach($products as $product)
        {
              //return json_encode ($DriverName);
            // $pending=$assigned-$deliverd;
            $data[]=array(
                "labels" => array(
                array("text" =>'Name : '.$product->name."\n".'Catgory : '.$product->category->name."\n".' image: '.asset('uploads/product/'.$product->image)),
                                 
            ),
       
                    
        );
        }
                 
         $result["top_navigation"] = array(
                        "labels"=>array(array('text'=> 'product list')));
        $result['sections']= array(
            array(
                "content" => array(
                    "layout" => array(
                        "size" => array(
                            "height" => 140
                        )
                        ),
                        "items" =>  $data
        
                    
                )
            )
        );
                
        $msg ='Success';
        $code = 0;
        return $this->sendResponse($result,$msg,$code);     

    }
}

