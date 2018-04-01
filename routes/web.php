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

Route::get('/', 'PageController@index')->name('home');
Route::get('/page/{name}', 'PageController@show')->name('pageName');

Route::get('/post/{slug}', 'PostController@show')->name('post.show');

Route::get('/tag/{slug}', 'PostController@tagFilter')->name('posts.tag');
Route::get('/category/{slug}', 'PostController@categoryFilter')->name('posts.category');

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');


Route::group(['middleware' => 'auth'], function() {
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::post('/profile', 'ProfileController@store');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
	Route::get('/', 'HomeController@index');
	Route::resource('/posts', 'PostController');
	Route::resource('/categories', 'CategoriesController');
	Route::resource('/pages', 'PageController');
	Route::resource('/tags', 'TagController');
	Route::resource('/users', 'UserController');
});
