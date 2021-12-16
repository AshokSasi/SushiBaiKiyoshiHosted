@extends('layouts.master')

@section('content')
<div class="col-md-8 blog-main">
<h1>Create a post</h1>
<hr/>

<form method="POST" action="/posts">
    
    {{ csrf_field() }} <!--include this in all forms-->

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>

    <div class="form-group">
      <label for="body">Body</label>
      <textarea name="body" id="body" class= "form-control" cols="30" rows="10" ></textarea>
      
    </div>

    <div class="form-group">

      <button type="submit" class="btn btn-primary">Publish</button>
      
    </div>

    @if (count($errors))
    <div class="form-gorup">

      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error }}</li>
          @endforeach
        </ul>
      </div>

    </div>
    @endif
  </form>
  
</div>
@endsection