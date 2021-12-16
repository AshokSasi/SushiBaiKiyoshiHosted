@extends('layouts.master')

@section('content')

<div class="col-md-8 blog-main">


    <h1> {{$post1 -> title}}</h1>

    {{$post1 -> body}}

</div>

    

@endsection