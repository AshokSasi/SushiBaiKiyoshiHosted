<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\User;

class CommentsController extends Controller
{
    public function store(Post $post, User $user)
    {
        
        //validation
        $this->validate(request(), ['body' => 'required|min:2']);

       //$post->addComment(request('body'));

       $post->comments()->create([     // this will associate 'post_id' (eloquent)
        'user_id' => auth()->id()     // explicitly associate 'user_id'
        'body'    => request('body'),
    ]);

        return back();
    }
}
//========================OLD CODE=====================