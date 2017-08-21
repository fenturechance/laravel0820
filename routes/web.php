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
 // public function index() {return view('user',['users'=>User::all() ]); }

Route::get('/user/delete/{id}', 'UserController@destroy');
// public function destroy($id) {User::destroy($id); return redirect('/user'); }

Route::post('/user', 'UserController@store'); 
// public function store(Request $request) {$validator = Validator::make($request->all(),['name'=>'required', 'email'=>'required|unique:users', 'password'=>'required|confirmed']); if($validator->fails()){return redirect('/user') ->withErrors($validator) ->withInput(); } User::create($request->all()); return redirect('/user'); }


Route::get('/products', 'ProductController@list');
 // public function list() {return view('product-list'); }

// Route::get('/product/add_cart/{id}','ProductController@add_to_cart');