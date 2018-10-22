<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use File;
use Illuminate\Support\Facades\Redirect;
session_start();

class SliderController extends Controller
{
   public function index()
   {
   	return view('admin.add_slider');
   }

 public function all_slider()
   {
   		$all_slider=DB::table('tbl_slider')->get();
    	$manage_slider=view('admin.all_slider')
    		->with('all_slider',$all_slider);

        
    	return view('admin_layout')
    		->with('admin.all_slider',$manage_slider);
   	
   }
   public function save_slider(Request $request)
   {
   	$data=array();
   	$data['publication_status']=$request->publication_status;
   	$image=$request->file('slider_image');
    if($image)	{
    	$image_name=str_random(20);
    	$ext=strtolower($image->getClientOriginalExtension());
    	$image_full_name=$image_name.'.'.$ext;
    	$upload_path='Slider/';
    	$image_url=$upload_path.$image_full_name;
    	$success=$image->move($upload_path,$image_full_name);
    	if($success){
    		$data['slider_image']=$image_url;
    			DB::table('tbl_slider')->insert($data);
    			//Session::put('message','Product added Successful !');
    			//return Redirecte::to('/add-product');
    	}
    }

		Session::put('message','slider added successfully !!');
		return Redirect::to('/add-slider');

   }
}
