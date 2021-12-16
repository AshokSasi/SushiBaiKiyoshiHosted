{{-- 
    
Title:      stock/create.blade.php
Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
Details:    This page generates the fish stock index page content of the website which displays
            historical fish prices and. 
    
--}}

@extends('layouts.master')

@section('content')
    
<h1 class="banner1">Add Stock Item</h1>

<div class="album py-5 contOpa rounded">  
    <div class="col-md-8">
    
        <form method="POST" action="/menu" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
                <label for="fishname">Fish Name</label>

                <input type="text" class="form-control" id="fishname" name="fishname" required >
            </div>

            <div class="form-group">
                <label for="price">Market Price</label>

                <input type="number" class="form-control" id="price" name="price" step=".01" required >
            </div>

                 <div class="form-group">
                <label for="date">Date</label>

                <input type="date" class="form-control" id="date" name="date"  required >
            </div>

            
            <div class="form-group">
                <label for="quantity">Current Stock Quantity</label>

                <input type="number" class="form-control" id="quantity" name="quantity" required >
            </div>
            <br/>
     
                {{-- <br/> --}}
              {{-- <label for="months">Add Tags:</label>
              <!--Do a loop querying through every tag -->
                <select name="months" id="cars">
                    <option value="volvo">Salmon</option>
                    <option value="volvo">Rice</option>
                </select> --}}

                {{-- <button class="btn btn-primary btn-sm">Add Tag</button> --}}
       
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        
   
            @include('layouts.errors')

        </form>
    </div>
</div>

@endsection