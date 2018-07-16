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

Route::get("tweets/index", "TweetsController@index");
Route::get("tweets/add", "TweetsController@add");
Route::post("tweets/add", "TweetsController@create");
Route::get("tweets/search", "TweetsController@search");