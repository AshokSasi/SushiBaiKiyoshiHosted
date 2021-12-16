<?php


namespace App\Repositories;
use App\Post;

class Posts
{

    public function __construct(Redis)
    {
        
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