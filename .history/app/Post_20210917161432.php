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

        //validation
        $this->validate(request(), ['body' => 'required|min:2'])

       //add a comment to a post
        $this->comments()->create(compact('body'));
      
    }
    
    
}
//========================OLD CODE=====================
//protected $guarded = [];

// Comment::create([
//     'body' => request('body'),
//     'post_id' => $this->id
// ]);