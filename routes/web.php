<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::view('register_twitter', 'auth.twitter_login')->name('twitter.register');
Route::get('twitter/login', 'TwitterController@login')->name('twitter.login');
Route::get('twitter/callback', 'TwitterController@callback')->name('twitter.callback');

Route::resource('users', 'UserController')->only(['show']);
Route::resource('entries', 'EntryController')->only(['create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::resource('hidden_tweets', 'HiddenTweetsController')->only(['store', 'destroy']);