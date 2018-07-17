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
Route::get("tweets/index", "TweetsController@index");
Route::get("tweets/add", "TweetsController@add")->middleware("auth");
Route::post("tweets/add", "TweetsController@create")->middleware("auth");
Route::get("tweets/search", "TweetsController@search")->middleware("auth");
Route::get("tweets/edit", "TweetsController@edit")->middleware("auth");
Route::post("tweets/edit", "TweetsController@update")->middleware("auth");
Route::get("tweets/delete", "TweetsController@delete")->middleware("auth");
Route::post("tweets/delete", "TweetsController@remove")->middleware("auth");

// ログイン認証
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
