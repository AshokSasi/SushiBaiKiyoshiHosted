<?php

namespace App;


class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComeent($body)
    {
       //add a comment to a post

       Comment::create([
        'body' => request('body'),
        'post_id' => $this->id
    ]);
    }
    
    //protected $guarded = [];
}
