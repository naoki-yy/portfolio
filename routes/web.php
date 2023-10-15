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


Route::get('/', 'UsersController@index');

// ユーザ新規登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//ユーザ詳細
Route::prefix('users')->group(function () {
    Route::get('{id}', 'UsersController@show')->name('users.show');
});

//たびLogを見る
Route::get('log/{user_id}/{id}', 'PostsController@log')->name('posts.log');

// ログイン後
Route::group(['middleware' => 'auth'], function () {
    // たびLog投稿
    Route::prefix('posts')->group(function () {
        Route::get('create', 'PostsController@create')->name('post.create');
        Route::post('', 'PostsController@store')->name('post.store');
        Route::delete('{id}', 'PostsController@destroy')->name('post.delete');
    });

    //マイページ
    Route::get('mypage', 'UsersController@mypage')->name('users.mypage');
    
});