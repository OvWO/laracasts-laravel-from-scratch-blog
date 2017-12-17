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

Route::get('/', function () {//abort(404, 'The resource you are looking for could not be found');

    return redirect('posts');
});

// Route::get('/', 'PostsController@index')->name('home');
Route::resource('posts', 'PostsController' );
Route::resource('posts.comments', 'CommentsController', ['only' => ['store']]);

Auth::routes();

Route::resource('posts/tags/{tag}', 'TagsController'); // Route::get('/home', 'HomeController@index')->name('home');
// Route::get('posts/{post}/comments', 'CommentsController@store');
