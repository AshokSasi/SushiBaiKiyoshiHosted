@extends ('layouts.master')

@section('content')
    
<h1 class="banner1">Register</h1>
<div class="album py-5 contOpa rounded">  
<div class="col-sm-8">


    <form method="POST" action="/register">
        {{csrf_field()}}

        <div class="form-group">

            <label for="name">First Name:</label>

            <input type="text" class="form-control" id="userFirstName" name="userFirstName" required>

        </div>
          <div class="form-group">

            <label for="name">Last Name:</label>

            <input type="text" class="form-control" id="userLastName" name="userLastName" required>

        </div>

        <div class="form-group">

            <label for="email">Email:</label>

            <input type="email" class="form-control" id="email" name="email" required>

        </div>

            <div class="form-group">

            <label for="name">Phone Number:</label>

            <input type="text" class="form-control" id="userPhoneNumber" name="userPhoneNumber" required>

        </div>

        <div class="form-group">

            <label for="password">Password:</label>

            <input type="password" class="form-control" id="password" name="password" required>

        </div>

        <div class="form-group">

            <label for="password_confirmation">Password Confirmation:</label>

            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>

        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              <a href="">Terms and Conditions</a>
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Sign up to our mailing list
            </label>
          </div>

        <button type="submit" class="btn btn-primary">Register</button>
   
            @include('layouts.errors')

    </form>
   

</div>
</div>

@endsection