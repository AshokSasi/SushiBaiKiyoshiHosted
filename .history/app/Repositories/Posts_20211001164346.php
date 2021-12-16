<?php


namespace App\Repositories;
use App\Post;
use Illuminate\Support\Facades\Redis;

class Posts
{

    public function __construct(Redis $redis)
    {   
        $this->redis = $redit;
        
    }

    public function all()
    {

        //return all posts
        return Post::all();
    }



   

}

//=============OLD CODE====================

/*
 public function find()
    {

    }
*/