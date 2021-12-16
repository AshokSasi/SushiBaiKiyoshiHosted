@extends('layouts.master')

@section('content')
    
<h1>Add Item</h1>

<div class="album py-5 contOpa rounded">  
    <div class="col-md-8">
    
        <form method="POST" action="/menu" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
                <label for="itemname">Item Name</label>

                <input type="text" class="form-control" id="itemname" name="itemname" required >
            </div>
          
           <div class="form-group">
             <label for="body">Body</label>
            <textarea name="body" id="body" class= "form-control" cols="30" rows="6" ></textarea>
      
            </div>

            <div class="form-group">
                <label for="price">Price</label>

                <input type="number" class="form-control" id="price" name="price" required >
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image">
              </div>
              
              <label for="months">Add Tags:</label>
              <!--Do a loop querying through every tag -->
                <select name="months" id="cars">
                    <option value="volvo">Salmon</option>
                    <option value="volvo">Rice</option>
                </select>

                {{-- <button class="btn btn-primary btn-sm">Add Tag</button> --}}
       
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        
   
            @include('layouts.errors')

        </form>
    </div>
</div>

@endsection