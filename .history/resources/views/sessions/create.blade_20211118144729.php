@extends('layouts.master')

@section('content')
<h1 class="banner1">Sign In</h1>
   
<div class="album py-5 contOpa rounded">  
<div class="col-md-8">
      

        <form  method="POST" action="/login">
            {{csrf_field()}}

            <div class="form-group">
                <label for="email">Email:</label>

                <input type="email" class="form-control" id="email" name="email" required>
            </div>


            <div class="form-group">

                <label for="password">Password:</label>
    
                <input type="password" class="form-control" id="password" name="password" required>
    
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Sign In</button>
            </div>
           
          <p class="text-center white-text">If you don't have an account register <a href="/register">here.</a></p>

                

        
   
            @include('layouts.errors')

        </form>
    </div>
</div>

@endsection