<?php

namespace App;


class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
       //add a comment to a post
        $this->comments()->create(compact('body'));
       Comment::create([
        'body' => request('body'),
        'post_id' => $this->id
    ]);
    }
    
    
}
//========================OLD CODE=====================
//protected $guarded = [];