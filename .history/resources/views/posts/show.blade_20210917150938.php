@extends('layouts.master')

@section('content')

<div class="col-md-8 blog-main">


    <h1> {{$post -> title}}</h1>

    {{$post -> body}}

    <hr/>

    <div class="comments">

        <ul class="list-group">

            @foreach ($post->comments as $comment)
            
            <li class="list-group-item">
                <strong>
                    {{commnet->createad_at}}
                </strong>
                {{$comment->body}}

            </li>

        @endforeach

        </ul>
        
    </div>

</div>

    

@endsection