<?php

namespace App\Http\Controllers;

use App\User;
use App\HiddenTweet;
use Twitter;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request, $id)
    {
        $user = User::where('id', $id)->with(['entries' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->first();

        $hiddenTweets = HiddenTweet::where('user_id', $id)->get('tweet_id');

        $hiddenTweets = $hiddenTweets->toArray();
        //dd($user);
        $tweets = [];
        if($user->twitter_username) {
            try {
                $tweets = Twitter::getUserTimeline(['screen_name' => $user->twitter_username, 'count' => 10, 'format' => 'object']);
            }catch (\RuntimeException $e) {}
        }

        return view('users.show')->with([ 'user' => $user, 'tweets' => $tweets, 'hiddenTweets' => $hiddenTweets ]);
    }
}
