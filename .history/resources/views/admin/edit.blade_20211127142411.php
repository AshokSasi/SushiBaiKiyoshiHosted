@extends('layouts.master')

@section('content')
    
<h1 class="banner1">Edit User</h1>

<div class="album py-5 contOpa rounded">  
    <div class="col-md-8">
    
        <form method="POST" action="/admin" >
            {{csrf_field()}}

            <div class="form-group">
                <label for="userFirstName">First Name</label>

                <input type="text" class="form-control" id="userFirstName" name="userFirstName"  >
            </div>
            
            <div class="form-group">
                <label for="userLastName">Last Name</label>

                <input type="text" class="form-control" id="userLastName" name="userLastName"  >
            </div>
          
            <div class="form-group">
                <label for="email">Email</label>

                <input type="email" class="form-control" id="email" name="email"  >
            </div>

            <div class="form-group">
                <label for="userPhoneNumber">Phone Number</label>

                <input type="number" class="form-control" id="userPhoneNumber" name="userPhoneNumber"  >
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
            <select class="form-control"name="role" id="role">
                <option value="a">Admin</option>
                <option value="e">Employee</option>
	            <option value="c">Customer</option>
            </select>
              </div>

              <br/>
            <button type="submit" class="btn btn-primary">Create</button>
        
   
            @include('layouts.errors')

        </form>
    </div>
</div>

@endsection