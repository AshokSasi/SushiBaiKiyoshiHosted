@extends('layouts.master')

@section('content')
    
<h1 class="banner1">Create User</h1>

<div class="album py-5 contOpa rounded">  
    <div class="col-md-8">
    
        <form action="/admin" >
            {{csrf_field()}}

            <div class="form-group">
                <label for="fname">First Name</label>

                <input type="text" class="form-control" id="fname" name="fname"  >
            </div>
            
            <div class="form-group">
                <label for="lname">Last Name</label>

                <input type="text" class="form-control" id="lname" name="lname"  >
            </div>
          
            <div class="form-group">
                <label for="email">Email</label>

                <input type="email" class="form-control" id="email" name="email"  >
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>

                <input type="number" class="form-control" id="phone" name="phone"  >
            </div>

            <div class="form-group">

                <label for="password">Password:</label>

                <input type="password" class="form-control" id="password" name="password" required>

            </div>

            <div class="form-group">

                <label for="password_confirmation">Password Confirmation:</label>

                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>

            </div>

             <div class="form-group">
            <label for="role">Role:</label>
            <select name="role" id="role">
                <option value="a">Admin</option>
                <option value="e">Employee</option>
	            <option value="c">Customer</option>
            </select>
              </div>

           
           
               
       
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Edit</button>
                <button type="submit" class="btn btn-danger"   onclick="return confirm('Are you sure?');">Delete</button>
            </div>
        
   
            @include('layouts.errors')

        </form>
    </div>
</div>

@endsection