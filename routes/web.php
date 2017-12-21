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

    return redirect('posts');
});
// Public Routes
Route::group(['middleware' => ['web',]], function () {

    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'ActivateController@exceeded']);
});




Route::get('/home', function() {
        return redirect('posts');
    });

Route::resource('posts', 'PostsController' );
Route::resource('posts.comments', 'CommentsController', ['only' => ['store']]);

Auth::routes();

Route::resource('posts/tags/{tag}', 'TagsController');

// Route::get('posts/{post}/comments', 'CommentsController@store');
