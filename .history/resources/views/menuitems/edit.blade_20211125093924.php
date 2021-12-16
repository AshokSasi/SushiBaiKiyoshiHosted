@extends('layouts.master')

@section('content')
    <!-- Make this page have unique url using wild card in route for the id of the item and then fill in the details of the items-->
    <h1 class="banner1">Edit Item</h1>
    <div class="album py-5 contOpa rounded">  
    <div class="col-md-8">
    

        <form method="POST" action="/menu" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
                <label for="itemname">Item Name</label>

                <input type="text" class="form-control" id="name" name="name" value="{{$item->menuItemName}}" required >
            </div>
          
            <div class="form-group">
                <label for="description">Item Description:</label>

                <textarea class="form-control" id="description" rows="3" required>{{$item->menuItemDescription}}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
               
                <input type="number" class="form-control" id="price" name="price" step=".01" value="{{$item->menuItemPrice}}" required >
            </div>

              <div class="form-group">
                <label for="image" class="form-label">Image</label>
         
                <input type="file" class="form-control-file" name="image" id="image"  >
              </div>
       
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        
   
            @include('layouts.errors')

        </form>
    </div>
    </div>

@endsection