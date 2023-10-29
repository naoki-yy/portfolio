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

Route::get('top', 'UsersController@top')->name('top');
Route::get('/', 'UsersController@index')->name('/');

//AI
Route::get('/generate-memory', 'chatGPTController@generate')->name('gpt');
Route::get('topic/show/{place}', 'PostsController@showAreaPosts')->name('topic.show');


Route::get('search', 'PostsController@index')->name('post.search');

// ユーザ新規登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//ユーザ
Route::group(['prefix' => 'users/{id}'],function(){
    Route::get('', 'UsersController@show')->name('users.show');
    Route::delete("","UsersController@destroy")->name('users.delete');
    Route::get('favorites','UsersController@favorites')->name('users.favorites');
});

//たびLogを見る
Route::get('log/{user_id}/{id}', 'PostsController@log')->name('posts.log');

// ログイン後
Route::group(['middleware' => 'auth'], function () {
    // たびLog投稿
    Route::prefix('posts')->group(function () {
        Route::get('create', 'PostsController@create')->name('post.create');
        Route::post('', 'PostsController@store')->name('post.store');
        //たびLog削除
        Route::delete('{id}', 'PostsController@destroy')->name('post.delete');
        //たびLog編集
        Route::get('{id}/edit', 'PostsController@edit')->name('post.edit');
        Route::put('{id}', 'PostsController@update')->name('post.update');
    });

    //マイページ
    Route::get('mypage', 'UsersController@mypage')->name('users.mypage');

    // いいね
    Route::group(['prefix' => 'posts/{id}'],function(){
        Route::post('favorite','FavoriteController@store')->name('favorite');
        Route::delete('unfavorite','FavoriteController@destroy')->name('unfavorite');
    });
    
});