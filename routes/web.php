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


Route::group(['prefix' => 'admin'], function() {
	Route::group(['prefix' => 'post'], function() {
		Route::get('/', ['as' => 'admin.post', 'uses' => 'PostController@getPostList']);
		Route::get('/add', ['as' => 'admin.post.getNew', 'uses' => 'PostController@getNewPost']);
		Route::post('/add', ['as' => 'admin.post.postNew', 'uses' => 'PostController@postNewPost']);
		Route::get('/edit/{id}', ['as' => 'admin.post.getEdit', 'uses' => 'PostController@getEditPost']);
		Route::post('/edit/{id}', ['as' => 'admin.post.postEdit', 'uses' => 'PostController@postEditPost']);
		Route::post('/delete', ['as' => 'admin.delete', 'uses' => 'PostController@DeleteEditPost']);
	});
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
