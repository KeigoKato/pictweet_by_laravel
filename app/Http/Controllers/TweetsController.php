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
}
