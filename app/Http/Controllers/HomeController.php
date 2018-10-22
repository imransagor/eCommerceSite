<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{
    public function index()
    {
    	$all_published_product=DB::table('tbl_products')
    					->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    					->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
    					->where('product_status',1)
    					->limit(9)
    					->get();
    	$manage_published_product=view('pages.home_contents')
    		->with('all_published_product',$all_published_product);

    	return view('layout')
    		->with('pages.home_contents',$manage_published_product);

    	//return view('pages.home_contents');
    }
}
