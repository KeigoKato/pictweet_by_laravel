<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// モデルファイルを使ってDBにアクセスしないとcreated_atなどの時刻が記録されない
use App\Tweet;
use Illuminate\Support\Facades\Auth;
use Log;
use DB;

class TweetsController extends Controller
{
    // public function getAuth(Request $request) {
    //     return view("tweets.auth", ["message"=>"ログインしてください"]);
    // }

    // public function postAuth(Request $request) {
    //     $username = Auth::user()->name
    //     $email = $request->email;
    //     $password = $request->password;
    //     if (Auth::attempt([
    //         "email" => $email,
    //         "password" => $password,
    //     ])) {
    //         $msg = "ログインしました。(".$username.")";
    //     } else {
    //         $msg = "ログインに失敗しました。";
    //     }
    //     return view("tweets.auth", ["message" => $msg]);
    // }

    public function index() {
        // ログインしているユーザーのインスタンスを返す
        // ログインしていなければnullになる
        $user = Auth::user();

        $tweets = Tweet::all();
        // ユーザーインスタンスをテンプレートに渡すために連想配列に追加する
        return view("tweets.index", ["tweets"=>$tweets, "user"=>$user]);
    }

    public function add() {
        return view("tweets.add");
    }

    public function create(Request $request) {
        $tweet = new Tweet;
        $form = $request->all();
        unset($form["_token"]);
        $tweet->fill($form)->save();
        return redirect("tweets/index");
    }

    public function search(Request $request) {
        $keyword = $request->keyword;
        $results = Tweet::where('title','like','%'.$keyword.'%')
            ->orWhere('body','like','%'.$keyword.'%')
            ->get();
        // デバッグしたいときはLogを使う
        // Log::debug('$results: '.$results);
        return view("tweets.search", ["results"=>$results]);
    }

    public function edit(Request $request) {
        $id = $request->id;
        $tweet = Tweet::find($id);
        return view("tweets.edit", ["tweet"=>$tweet]);
    }

    public function update(Request $request) {
        $id = $request->id;
        $form = $request->all();
        unset($form["_token"]);
        $tweet = Tweet::find($id)->fill($form)->save();
        return redirect("tweets/index");
    }

    public function delete(Request $request) {
        $id = $request->id;
        $tweet = Tweet::find($id);
        return view("tweets.delete", ["tweet"=>$tweet]);
    }

    public function remove(Request $request) {
        $id = $request->id;
        $tweet = Tweet::find($id)->delete();
        return redirect("tweets/index");
    }
}
