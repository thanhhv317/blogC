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


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::group(['prefix' => 'post'], function() {
		Route::get('/', ['as' => 'admin.post', 'uses' => 'PostController@getPostList']);
		Route::get('/draf', ['as' => 'admin.post.draf', 'uses' => 'PostController@getPostListDraf']);

		Route::get('/add', ['as' => 'admin.post.getNew', 'uses' => 'PostController@getNewPost']);
		Route::post('/add', ['as' => 'admin.post.postNew', 'uses' => 'PostController@postNewPost']);

		Route::get('/edit/{id}', ['as' => 'admin.post.getEdit', 'uses' => 'PostController@getEditPost']);

		Route::post('/edit/{id}', ['as' => 'admin.post.postEdit', 'uses' => 'PostController@postEditPost']);

		Route::post('/delete', [
			'as' => 'admin.delete', 
			'uses' => 'PostController@DeleteEditPost'
		]);

		Route::post('/changeStatus', [
			'as' => 'admin.post.changeStatus', 
			'uses' => 'PostController@postChangeStatus'
		]);
	});

	Route::get('/profile', 'ProfileController@getProfile')->name('profile');
	Route::post('/profile', 'ProfileController@postProfile');

	Route::group(['prefix' => 'comment'], function() {
		Route::get('/', ['as' => 'admin.comment', 'uses' => 'CommentController@getCommentWaitList']);
		Route::get('/availability', ['as' => 'admin.comment.availability', 'uses' => 'CommentController@getCommentAvailabilityList']);
		Route::get('/spam', ['as' => 'admin.comment.spam', 'uses' => 'CommentController@getCommentSpamList']);
		Route::post('/edit', ['as' => 'admin.comment.edit', 'uses' => 'CommentController@postEditStatusComment']);
	});

	Route::group(['prefix' => 'statistical'], function() {
		Route::get('/post', ['as' => 'admin.statistical.post', 'uses' => 'StatisticalController@getPosts']);
		Route::get('/comment', ['as' => 'admin.statistical.comment', 'uses' => 'StatisticalController@getComments']);
		
	});
});

Route::get('/', 'HomepageController@getHome')->name('homepage');
Route::get('/category/{slug}', 'HomepageController@getCategory')->name('category');
Route::get('/about-me', 'HomepageController@getAboutMe')->name('aboutMe');
Route::get('/search', 'HomepageController@searchPost')->name('search');
Route::get('/blog-post/{slug}', 'HomepageController@getBlogPost')->name('blogPost');
Route::post('/loadMore', 'HomepageController@loadMore')->name('loadMore');
Route::post('/sendComent', 'CommentController@sendComent')->name('sendComent');

Route::get('auth/{provider}', 'SocialiteController@redirectToProvider');
Route::get('auth/{provider}/callback', 'SocialiteController@handleProviderCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
