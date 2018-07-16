<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
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

    public function find() {
        return view("tweets.find");
    }

    public function search(Request $request) {
        $title = $request->input;
    }
}
