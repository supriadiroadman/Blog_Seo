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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FrontController@index');
Route::get('/articles/{slug}', 'FrontController@articles')->name('articles');

Route::middleware(['auth'])->group(function () {
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');

    Route::get('/posts/trash', 'PostController@trash')->name('posts.trash');
    Route::get('/posts/restore/{id}', 'PostController@restore')->name('posts.restore');
    Route::delete('/posts/forcedelete/{id}', 'PostController@forcedelete')->name('posts.forcedelete');
    Route::resource('/posts', 'PostController');
    Route::resource('/users', 'UserController');
});
