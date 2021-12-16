@extends('layouts.master')

@section('content')
    <!-- Make this page have unique url using wild card in route for the id of the item and then fill in the details of the items-->
    <h1>Edit Item</h1>
    <div class="col-md-8">
    

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

            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="formFile">
              </div>
       
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        
   
            @include('layouts.errors')

        </form>
    </div>

@endsection