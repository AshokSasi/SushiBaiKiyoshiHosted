@extends('layouts.master')

@section('content')

<div class="col-md-8 blog-main">


    <h1> {{$post -> title}}</h1>

    {{$post -> body}}


    <div class="comments">
        @foreach ($post->comments as $comment)
            <article>
                {{$comment->body}}
            </article>
        @endforeach
    </div>

</div>

    

@endsection