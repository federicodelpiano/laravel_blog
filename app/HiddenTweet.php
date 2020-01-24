<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HiddenTweet extends Model
{
    protected $table = 'hidden_tweets';

    public function user() {
        return $this->belongsTo('App\User');
    }
}
