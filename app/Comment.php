<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'userName', 'body'
    ];

    public function postID()
    {
        return $this->belongsTo('App\Comment');
    }
}
