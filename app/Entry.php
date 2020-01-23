<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
    use SoftDeletes;

    protected $table = 'entries';

    public function user() {
        return $this->belongsTo('App\User');
    }
}
