@extends('layouts.master')

@section('content')
    
<h1 class="banner1">Add Item</h1>

<div class="album py-5 contOpa rounded">  
    <div class="col-md-8">
    
        <form action="/admin" >
            {{csrf_field()}}

            <div class="form-group">
                <label for="id">ID:</label>

                <input type="text" class="form-control" id="id" name="id" value="{{$user->id}}" readonly >
            </div>

            <div class="form-group">
                <label for="fname">First Name</label>

                <input type="text" class="form-control" id="fname" name="fname" value="{{$user->userFirstName}}" readonly >
            </div>
            
            <div class="form-group">
                <label for="lname">Last Name</label>

                <input type="text" class="form-control" id="lname" name="lname" value="{{$user->userLastName}}" readonly >
            </div>
          
            <div class="form-group">
                <label for="email">Email</label>

                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" readonly >
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>

                <input type="number" class="form-control" id="phone" name="phone" value="{{$user->userPhoneNumber}}" readonly >
            </div>

            @if({{$user->userPosition}})
            <div class="form-group">
                <label for="position">Position</label>

                <input type="text" class="form-control" id="position" name="position" value="{{$user->userPosition}}" readonly >
            </div>
           
               
       
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        
   
            @include('layouts.errors')

        </form>
    </div>
</div>

@endsection