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

Route::get('/', function () {
	return view('welcome');
});


Auth::routes();

Route::get('/posts', function(){
	return view('post');
});

Route::get('/posts/{id}', function($id){
	return view('post-single',[
			'id'=>$id //把網址的數字放到變數中，讓blade可以用
		]);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'UserController@index');
Route::get('/user/delete/{id}', 'UserController@destroy');
Route::post('/user', 'UserController@store'); 

Route::get('/product', 'ProductController@index');