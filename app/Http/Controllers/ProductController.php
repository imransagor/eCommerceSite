<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use File;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function index()
    {
    	return view('admin.add_product');
    }

     public function all_product()
    {
    	/*$all_product_info=DB::table('tbl_products')->get();
    	$manage_product=view('admin.all_product')
    		->with('all_product_info',$all_product_info);

    	return view('admin_layout')
    		->with('admin.all_product',$manage_product);*/

    }
     public function save_product(Request $request)
    {
    	$data=array();
    	$data['product_name']=$request->product_name;
    	$data['category_id']=$request->category_id;
    	$data['manufacture_id']=$request->manufacture_id;
    	$data['product_short_description']=$request->product_short_description;
    	$data['product_long_description']=$request->product_long_description;
    	$data['product_price']=$request->product_price;
    	$data['product_size']=$request->product_size;
    	$data['product_color']=$request->product_color;
    	$data['product_status']=$request->product_status;
    	$image=$request->file('product_image');
    if($image)	{
    	$image_name=str_random(20);
    	$ext=strtolower($image->getClientOriginalExtension());
    	$image_full_name=$image_name.'.'.$ext;
    	$upload_path='image/';
    	$image_url=$upload_path.$image_full_name;
    	$success=$image->move($upload_path,$image_full_name);
    	if($success){
    		$data['product_image']=$image_url;
    			DB::table('tbl_products')->insert($data);
    			//Session::put('message','Product added Successful !');
    			//return Redirecte::to('/add-product');
    	}
    }

		Session::put('message','Category added successfully !!');
		return Redirect::to('/add-product');

    	
    }
}
