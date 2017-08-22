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

Route::get('/products/add_cart/{id}','ProductController@add_to_cart');
// public function add_cart(Request $request, $id) {// 取得已經存在 session 的資料 $prev = $request->session()->get('cart'); // 預設 arr 為空 $arr  = []; // 如果 prev 已經含有資料 則先 decode 到 arr if( $prev != null ) {$arr = json_decode($prev); } // 從尾部新增內容（ 同 push ) $arr[] = $id; // 存回 Session $request->session()->put('cart', json_encode($arr)); return ['status' => true ]; }

Route::get('/products/list_cart','ProductController@list_cart');
// public function list_cart(Request $request) {// 取得 session 裡面的資料成為一個陣列 $id_list = json_decode($request->session()->get('cart')); $prod_list = []; // 根據 Product ID 取得每筆商品資料 foreach($id_list as $id) {$prod_list[] = Product::find($id); } return $prod_list; }

ROute::get('/cart','ProductController@cart');
// public function cart() {return view('cart'); }