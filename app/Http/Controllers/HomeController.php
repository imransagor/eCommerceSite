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
    public function show_product_by_category($category_id)
    {
    
        $all_product_by_category=DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->where('tbl_category.category_id',$category_id)
                        ->where('tbl_products.product_status',1)
                        ->limit(18)
                        ->get();
        $manage_product_by_category=view('pages.product_by_category')
            ->with('all_product_by_category',$all_product_by_category);

        return view('layout')
            ->with('pages.product_by_category',$manage_product_by_category);
    }
     public function show_product_by_manufacture($manufacture_id)
    {
    
        $all_product_by_manufacture=DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                        ->where('tbl_manufacture.manufacture_id',$manufacture_id)
                        ->where('tbl_products.product_status',1)
                        ->limit(18)
                        ->get();
        $manage_product_by_manufacture=view('pages.product_by_manufacture')
            ->with('all_product_by_manufacture',$all_product_by_manufacture);

        return view('layout')
            ->with('pages.product_by_manufacture',$manage_product_by_manufacture);
    }
       public function product_details_by_id($product_id)
    {
    
        $product_by_id=DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                        ->where('tbl_products.product_id',$product_id)
                        ->where('tbl_products.product_status',1)
                        ->first();
        $manage_product_by_id=view('pages.product_details')
            ->with('product_by_id',$product_by_id);

        return view('layout')
            ->with('pages.product_details',$manage_product_by_id);
    }

}
