@extends('layouts.master')

@section('content')
    
    <div class="col-md-8">
        <h1>My Account</h1>

        <form method="POST" action="/menu">
            {{csrf_field()}}

            <div class="form-group">
                <label for="email">Item Name</label>

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

@endsection