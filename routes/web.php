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

// Route::resource("tweets", "TweetsController");

// middleware("auth")はログインしているかどうかを判定し、していなければログインページへリダイレクトされる。
// middleware("auth")と書けば、Kernel.php内にまとめてある"auth"キーの値にあるミドルウェアが全て適用される
Route::middleware('auth')->group(function() {
    Route::get("tweets/index", "TweetsController@index");
    Route::get("tweets/add", "TweetsController@add");
    Route::post("tweets/add", "TweetsController@create");
    Route::get("tweets/search", "TweetsController@search");
    Route::get("tweets/edit", "TweetsController@edit");
    Route::post("tweets/edit", "TweetsController@update");
    Route::get("tweets/delete", "TweetsController@delete");
    Route::post("tweets/delete", "TweetsController@remove");
});

// ログイン認証
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('tweets/auth', 'TweetsController@getAuth')->middleware('guest');
Route::post('tweets/auth', 'TweetsController@postAuth')->middleware('guest');