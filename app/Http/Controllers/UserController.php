<?php

namespace App\Http\Controllers;

use App\User;
use App\HiddenTweet;
use Twitter;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
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
                $tweets = Twitter::getUserTimeline(['screen_name' => $user->twitter_username, 'count' => 20, 'format' => 'object']);
            }catch (\RuntimeException $e) {}
        }

        return view('users.show')->with([ 'user' => $user, 'tweets' => $tweets, 'hiddenTweets' => $hiddenTweets ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
