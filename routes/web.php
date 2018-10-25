<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//frontendsite.....
Route::get('/', 'HomeController@index');

//show catagory wise product
Route::get('/product_by_category/{category_id}','HomeController@show_product_by_category');
Route::get('/product_by_manufacture/{manufacture_id}','HomeController@show_product_by_manufacture');
Route::get('/view_product/{product_id}','HomeController@product_details_by_id');





//backendsite.....
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard','AdminController@dashboard');


//Catagory related route
Route::get('/add-category','CatagoryController@index');
Route::get('/all-category','CatagoryController@all_category');
Route::post('/save-category','CatagoryController@save_category');
Route::get('/edit-category/{category_id}','CatagoryController@edit_category');
Route::post('/update-category/{category_id}','CatagoryController@update_category');
Route::get('/delete-category/{category_id}','CatagoryController@delete_category');
Route::get('/unactive-category/{category_id}','CatagoryController@unactive_category');
Route::get('/active-category/{category_id}','CatagoryController@active_category');


//Manufacture related route
Route::get('/add-manufacture','ManufactureController@index');
Route::get('/all-manufacture','ManufactureController@all_manufacture');
Route::post('/save-manufacture','ManufactureController@save_manufacture');
Route::get('/edit-manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}','ManufactureController@update_manufacture');
Route::get('/delete-manufacture/{manufacture_id}','ManufactureController@delete_manufacture');
Route::get('/unactive-manufacture/{manufacture_id}','ManufactureController@unactive_manufacturey');
Route::get('/active-manufacture/{manufacture_id}','ManufactureController@active_manufacture');


//product related route
Route::get('/add-product','ProductController@index');
Route::get('/all-product','ProductController@all_product');
Route::post('/save-product','ProductController@save_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');


//Slider related route
Route::get('/add-slider','SliderController@index');
Route::get('/all-slider','SliderController@all_slider');
Route::post('/save-slider','SliderController@save_slider');
Route::get('/unactive-slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active-slider/{slider_id}','SliderController@active_slider');
