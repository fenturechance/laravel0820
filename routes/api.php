<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', 'PostController@index');
// public function index() {return Post::simplePaginate(10); }

Route::get('/posts/{id}', 'PostController@show'); //給show這個function
// public function show($id) {return Post::findOrFail($id); }

Route::post('/posts', 'PostController@store'); 
// public function store(Request $request) {$validator = Validator::make($request->all(),['title'=>'required|max:20', 'note'=>'required', 'author'=>'required|integer']); if($validator->fails()){return ['erros'=>$validator->errors()]; } return Post::create($request->all()); }

Route::get('/products', 'ProductController@index');
// public function index() {return Product::all(); }