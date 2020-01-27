<?php

namespace App\Http\Controllers;

use App\HiddenTweet;
use Illuminate\Http\Request;

class HiddenTweetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $hiddenTweet = new HiddenTweet;
        $hiddenTweet->user_id = $request->user()->id;
        $hiddenTweet->tweet_id = $request->tweet_id;
        $hiddenTweet->save();

        return response()->json($hiddenTweet);
    }

    public function destroy(Request $request, $id)
    {
        $hiddenTweet = HiddenTweet::where('tweet_id', $id)->delete();

        return response()->json($hiddenTweet);
    }
}
