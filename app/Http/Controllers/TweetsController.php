<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// モデルファイルを使ってDBにアクセスしないとcreated_atなどの時刻が記録されない
use App\Tweet;
use Log;
use DB;

class TweetsController extends Controller
{
    public function index() {
        $tweets = Tweet::all();
        return view("tweets.index", ["tweets"=>$tweets]);
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
        Log::debug('$tweet: '.$tweet);
        return view("tweets.edit", ["tweet"=>$tweet]);
    }

    public function update(Request $request) {
        $id = $request->id;
        $tweet = Tweet::find($id);
        $form = $request->all();
        unset($form["_token"]);
        $tweet->fill($form)->save();
        return redirect("tweets/index");
    }
}
