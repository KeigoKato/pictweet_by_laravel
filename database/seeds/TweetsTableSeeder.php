<?php

use Illuminate\Database\Seeder;
use App\Tweet;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            "title" => "abc",
            "body" => "def",
        ];
        $tweets = new Tweet;
        $tweets->fill($param)->save();

        $param = [
            "title" => "ghi",
            "body" => "jkl",
        ];
        $tweets = new Tweet;
        $tweets->fill($param)->save();

        $param = [
            "title" => "mno",
            "body" => "pqr",
        ];
        $tweets = new Tweet;
        $tweets->fill($param)->save();

        $param = [
            "title" => "stu",
            "body" => "vwx",
        ];
        $tweets = new Tweet;
        $tweets->fill($param)->save();

        $param = [
            "title" => "vxw",
            "body" => "yzA",
        ];
        $tweets = new Tweet;
        $tweets->fill($param)->save();

        $param = [
            "title" => "ott",
            "body" => "ffs",
        ];
        $tweets = new Tweet;
        $tweets->fill($param)->save();
    }
}
