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


Auth::routes();

Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');


// location
Route::get('/add_location','LocationController@create');
Route::post('/store_location','LocationController@store');
Route::get('/edit_location','LocationController@edit');
Route::post('/update_location/{id}','LocationController@update');
Route::get('/delete_location/{id}','LocationController@delete');