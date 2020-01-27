<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;

class TwitterController extends Controller
{
    public function login() {
        $sign_in_twitter = true;
        $force_login = false;

        \Twitter::reconfig(['token' => '', 'secret' => '']);
        $token = \Twitter::getRequestToken(route('twitter.callback'));

        if (isset($token['oauth_token_secret']))
        {
            $url = \Twitter::getAuthorizeURL($token, $sign_in_twitter, $force_login);

            Session::put('oauth_state', 'start');
            Session::put('oauth_request_token', $token['oauth_token']);
            Session::put('oauth_request_token_secret', $token['oauth_token_secret']);

            return Redirect::to($url);
        }

        return Redirect::route('twitter.register');
    }

    public function callback() {
        if (Session::has('oauth_request_token'))
        {
            $request_token = [
                'token'  => Session::get('oauth_request_token'),
                'secret' => Session::get('oauth_request_token_secret'),
            ];

            \Twitter::reconfig($request_token);

            $oauth_verifier = false;

            if (request()->has('oauth_verifier'))
            {
                $oauth_verifier = request()->get('oauth_verifier');
                $token = \Twitter::getAccessToken($oauth_verifier);
            }

            if (!isset($token['oauth_token_secret']))
            {
                return Redirect::route('twitter.register')->with('flash_error', 'We could not log you in on Twitter.');
            }

            $credentials = \Twitter::getCredentials();

            if (is_object($credentials) && !isset($credentials->error))
            {
                Session::put('access_token', $token);

                return Redirect::route('register')->with('twitter_screen_name', $credentials->screen_name);
            }

            return Redirect::route('twitter.register')->with('flash_error', 'Crab! Something went wrong while signing you up!');
        }
    }
}
