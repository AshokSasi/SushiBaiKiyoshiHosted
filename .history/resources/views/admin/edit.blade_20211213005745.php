{{-- 
    
Title:      admin/edit.blade.php
Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
Details:    This page generates the edit users page content of the website for editing an
            existing user. 
    
--}}

@extends('layouts.master')

@section('content')
    
<h1 class="banner1">Edit User</h1>

<div class="album py-5 contOpa rounded">  
    <div class="col-md-8">
    
        <form method="POST" action="/admin/update/{{$user->userId}}" >
            {{csrf_field()}}

            <div class="form-group">
                <label for="userFirstName">First Name</label>

                <input type="text" class="form-control" id="userFirstName" name="userFirstName" value="{{$user->userFirstName}}" required >
            </div>
            
            <div class="form-group">
                <label for="userLastName">Last Name</label>

                <input type="text" class="form-control" id="userLastName" name="userLastName" value="{{$user->userLastName}}" required >
            </div>
          
            <div class="form-group">
                <label for="userEmail">Email</label>

                <input type="email" class="form-control" id="userEmail" name="userEmail" value="{{$user->userEmail}}" required  >
            </div>

            <div class="form-group">
                <label for="userPhoneNumber">Phone Number</label>

                <input type="number" class="form-control" id="userPhoneNumber" name="userPhoneNumber" value="{{$user->userPhoneNumber}}" required >
            </div>

            <div class="form-group">

                <label for="userPassword">Password:</label>

                <input type="password" class="form-control" id="userPassword" name="userPassword" value="{{$user->userPassword}}" required>

            </div>

            <div class="form-group">

                <label for="userPassword_confirmation">Password Confirmation:</label>

                <input type="password" class="form-control" id="userPassword_confirmation" name="userPassword_confirmation" value="{{$user->userPassword}}" required>

            </div>

       

             <div class="form-group">
            <label for="role">Role:</label>
            <select class="form-control"name="role" id="role">
                <option value="a" @if($user->userPosition === "a" ){{ $var="selected"}} @endif>Admin</option>
                <option value="e" @if($user->userPosition === "e") {{$var="selected"}}  @endif>Employee</option>
	            <option value="c" @if($user->userPosition === "c") {{$var="selected"}}  @endif>Customer</option>
            </select>
              </div>

              <br/>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        
   
            @include('layouts.errors')

        </form>
    </div>
</div>

@endsection