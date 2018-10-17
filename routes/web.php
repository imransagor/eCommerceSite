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







//backendsite.....
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');


//Catagory related route
Route::get('/add-category','CatagoryController@index');
Route::get('/all-category','CatagoryController@all_category');
Route::post('/save-category','CatagoryController@save_category');

