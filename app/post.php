<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
        'id', 'user_id'
    ];

    public function postID()
    {
        return $this->belongsTo('App\post');
    }
}
