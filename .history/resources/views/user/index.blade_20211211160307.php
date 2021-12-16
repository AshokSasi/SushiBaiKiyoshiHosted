{{-- 
    
Title:      user/index.blade.php
Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
Details:    This page generates the user page content for the current logged in user of the website which 
            allows a user to change their own personal information. 
    
--}}

@extends('layouts.master')

@section('content')
<h1 class="banner1">My Account</h1>
<div class="album py-5 contOpa rounded">    
<div class="col-md-8">
     
        
        <form method="POST" action="/login">
            {{csrf_field()}}

            <div class="form-group ">
                <label for="email">Name</label>

                <input type="text" class="form-control" id="name" name="name" required value="{{ Auth::user()->name }}">
            </div>
          
            <div class="form-group">
                <label for="email">Email:</label>

                <input type="email" class="form-control" id="email" name="email" required value="{{ Auth::user()->email }}">
            </div>


            <div class="form-group">

                <label for="password">Change Password:</label>
    
                <input type="password" class="form-control" id="password" name="password" required value="">

                <label for="password">Confim Password:</label>
    
                <input type="password" class="form-control" id="password" name="password" required placeholder="Confirm Password">
    
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        
   
            @include('layouts.errors')

        </form>
 
    </div>
</div>

@endsection