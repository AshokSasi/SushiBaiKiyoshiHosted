<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct()
    {
        $this -> middleware('auth') ->except(['index', 'show']);
    }


    public function index()
    {
        $posts = Post::latest()
        ->filter(request(['month','year']))
        ->get();

        // if($month = request('month'))
        // {
        //     $posts->whereMonth('created_at',Carbon::parse($month)->month);
        // }

        // if($year = request('year'))
        // {
        //     $posts -> whereYear('created_at',$year);
        // }

        $archives=Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year','month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();

        return view('posts.index',compact('posts','archives'));
    }

    public function show(Post $post)
    {
        //$post = Post::find($post);
        return view('posts.show',compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
      

        //Validate requires data
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);
        

        auth()->user()->publish(

            new Post(request(['title','body']))

        );

       
        //And redirect to home page
        return redirect('/');
    }
}

//====================OLD COMMENTS======================
// public function index()
// {
//     $posts = \App\Post::all();
//     $posts = \App\Post::orderBy('created_at', 'desc')->get();
//     return view('posts.index', compact('posts'));
// }


 // dd(request(['title', 'body']));
        //Create a new post using the request data
        // $post = new Post;

        // $post->title = request('title');
        // $post->body = request('body');

        // //Save it to the database
        // $post->save();