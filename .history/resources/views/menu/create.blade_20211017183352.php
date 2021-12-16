@extends('layouts.master')

@section('content')
    
    <div class="col-md-8">
        <h1>My Account</h1>

        <form method="POST" action="/menu">
            {{csrf_field()}}

            <div class="form-group">
                <label for="email">Item Name</label>

                <input type="text" class="form-control" id="name" name="name" required >
            </div>
          
            <div class="form-group">
                <label for="email">Item Description:</label>

                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="email">Price</label>

                <input type="number" class="form-control" id="name" name="name" required >
            </div>

       
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        
   
            @include('layouts.errors')

        </form>
    </div>

@endsection