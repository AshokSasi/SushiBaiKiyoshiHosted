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
                    {{$comment->created_at->diffForHumans()}}: &nbsp;
                </strong>

                {{$comment->body}}

            </li>

        @endforeach

        </ul>
        
    </div>

    {{--Section for adding comments--}}
    <hr/>
    <div class="card">
        <div class="card-block">
            
            <form >
                <div class="form-gorup ">

                    <textarea name="body" placeholder="Your comment here." class="form-control">
                    </textarea>

                </div>

                <div class="form-group ml-2 mt-3">

                    <button type="submit" class="btn btn-primary">Add Comment</button>

                </div>

            </form>

        </div>

    </div>

</div>

    

@endsection