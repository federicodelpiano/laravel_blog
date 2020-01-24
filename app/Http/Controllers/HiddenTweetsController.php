<?php

namespace App\Http\Controllers;

use App\HiddenTweet;
use Illuminate\Http\Request;

class HiddenTweetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $hiddenTweet = new HiddenTweet;
        $hiddenTweet->user_id = $request->user()->id;
        $hiddenTweet->tweet_id = $request->tweet_id;
        $hiddenTweet->save();

        return response()->json($hiddenTweet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HiddenTweet  $hiddenTweet
     * @return \Illuminate\Http\Response
     */
    public function show(HiddenTweet $hiddenTweet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HiddenTweet  $hiddenTweet
     * @return \Illuminate\Http\Response
     */
    public function edit(HiddenTweet $hiddenTweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HiddenTweet  $hiddenTweet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HiddenTweet $hiddenTweet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HiddenTweet  $hiddenTweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $hiddenTweet = HiddenTweet::where('tweet_id', $id)->delete();

        return response()->json($hiddenTweet);
    }
}
