<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TweetsController extends Controller
{
    public function index() {
        $tweets = DB::table("tweets")->get();
        return view("tweets.index", ["tweets"=>$tweets]);
    }

    public function add() {
        return view("tweets.add");
    }

    public function create(Request $request) {
        $param = [
            "title" => $request->title,
            "body" => $request->body,
        ];
        DB::table("tweets")->insert($param);
        return redirect("tweets/index");
    }
}
