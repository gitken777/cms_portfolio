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
Route::get('/','FrontController@index');

Route::get('show/{post}','FrontController@showpost');
Route::get('blog/categories/{categories}','PostsController@category');
Route::get('blog/tags/{tag}','PostsController@tag');


Route::get('search','FrontController@search');


Route::middleware(['auth'])->group(function (){

    Route::get('/home', 'HomeController@index')->name('home');



//Route For Users
    Route::get('users','UsersController@index');
    Route::post('users/{user}','UsersController@makeAdmin');
    Route::get('users/edit','UsersController@edit');
    Route::put('users/update','UsersController@update');



//Route For Posts
    Route::get('trashed-posts','PostsController@trashed');
    Route::get('post/create','PostsController@create');
    Route::post('post/store','PostsController@store');
    Route::get('post','PostsController@index');
    Route::get('post/{post}/edit','PostsController@edit');
    Route::put('post/{post}','PostsController@update');
    Route::delete('post/{post}','PostsController@destroy');
    Route::put('restore/{post}','PostsController@restore');

//Route For Tags
    Route::get('tag','TagsController@index');
    Route::get('tag/{tag}/edit','TagsController@edit');
    Route::delete('tag/{tag}','TagsController@destroy');
    Route::get('tag/create','TagsController@create');
    Route::post('tag/store','TagsController@store');
    Route::put('tag/{tag}','TagsController@update');

//Route For Categories
    Route::get('category','CategoriesController@index');
    Route::get('category/create','CategoriesController@create');
    Route::post('category/store','CategoriesController@store');
    Route::get('category/{categories}/edit','CategoriesController@edit');
    Route::put('category/{categories}','CategoriesController@update');
    Route::delete('category/{categories}','CategoriesController@destroy');
});