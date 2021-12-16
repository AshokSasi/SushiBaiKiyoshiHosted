{{-- 
    
Title:      sessions/create.blade.php
Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
Details:    This page generates the login page content of the website which allows a user to login
            using their information to access more features from our website available to their role.
    
--}}

@extends('layouts.master')

@section('content')
<h1 class="banner1">Sign In</h1>
   
<div class="album py-5 contOpa rounded">  
<div class="col-md-8">
      

        <form  method="POST" action="/login">
            {{csrf_field()}}

            <div class="form-group">
                <label for="userEmail">Email:</label>

                <input type="email" class="form-control" id="userEmail" name="userEmail" required>
            </div>


            <div class="form-group">

                <label for="userPassword">Password:</label>
    
                <input type="password" class="form-control" id="userPassword" name="userPassword" required>
    
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