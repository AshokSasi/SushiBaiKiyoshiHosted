@extends('layouts.master')

@section('content')
    
<h1>Add Item</h1>

<div class="album py-5 contOpa rounded">  
    <div class="col-md-8">
    
        <form method="POST" action="/menu">
            {{csrf_field()}}

            <div class="form-group">
                <label for="text">Item Name</label>

                <input type="text" class="form-control" id="itemname" name="itemname" required >
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
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image">
              </div>
              
              <label for="months">Add Tags:</label>
              <!--Do a loop querying through every tag -->
                <select name="months" id="cars">
                    <option value="volvo">Salmon</option>
                    <option value="volvo">Rice</option>
                </select>

                <button class="btn btn-primary btn-sm">Add Tag</button>
       
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        
   
            @include('layouts.errors')

        </form>
    </div>
</div>

@endsection