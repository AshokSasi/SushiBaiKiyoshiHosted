@extends('layouts.master')

@section('content')
    
<h1 class="banner1">Add Item</h1>

<div class="album py-5 contOpa rounded">  
    <div class="col-md-8">
    
        <form action="/admin" >
            {{csrf_field()}}

            <div class="form-group">
                <label for="id">ID:</label>

                <input type="text" class="form-control" id="id" name="id" readonly >
            </div>
          
           <div class="form-group">
             <label for="body">Body</label>
            <textarea name="body" id="body" class= "form-control" cols="30" rows="6" ></textarea>
      
            </div>

            <div class="form-group">
                <label for="price">Price</label>

                <input type="number" class="form-control" id="price" name="price" step=".01" required >
            </div>
            <br/>
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control-file" name="image" id="image">
              </div>
                <br/>
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