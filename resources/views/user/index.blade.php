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
     
        
        <form method="POST" action="/user/edit/{{Auth::user()->userId}}">
            {{csrf_field()}}

         <div class="form-group">
                <label for="userFirstName">First Name</label>

                <input type="text" class="form-control" id="userFirstName" name="userFirstName" value={{Auth::user()->userFirstName}}  >
            </div>
            
            <div class="form-group">
                <label for="userLastName">Last Name</label>

                <input type="text" class="form-control" id="userLastName" name="userLastName" value={{Auth::user()->userLastName}}  >
            </div>
          
            <div class="form-group">
                <label for="userEmail">Email</label>

                <input type="email" class="form-control" id="userEmail" name="userEmail" value={{Auth::user()->userEmail}} >
            </div>

            <div class="form-group">
                <label for="userPhoneNumber">Phone Number</label>

                <input type="number" class="form-control" id="userPhoneNumber" name="userPhoneNumber" value={{Auth::user()->userPhoneNumber}} >
            </div>

            <div class="form-group">

                <label for="userPassword">Password:</label>

                <input type="password" class="form-control" id="userPassword" name="userPassword" required>

            </div>

            <div class="form-group">

                <label for="userPassword_confirmation">Password Confirmation:</label>

                <input type="password" class="form-control" id="userPassword_confirmation" name="userPassword_confirmation" required>

            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        
   
            @include('layouts.errors')

        </form>
 
    </div>
</div>

@endsection