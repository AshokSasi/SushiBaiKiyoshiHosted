{{-- 
    
Title:      stock/create.blade.php
Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
Details:    This page generates the new stock page content of the website which allows a user to add
            new stock items into their stock page. 
    
--}}

@extends('layouts.master')

@section('content')
    
<h1 class="banner1">Edit {{$stock->stockDescription}} Stock</h1>

<div class="album py-5 contOpa rounded">  
    <div class="col-md-8">
 
        <h4 class="white-text">Current Quantity: {{$stock->stockQuantity}}</h4>
    
        <form method="POST" action="/stock/update/{{$stock->stockId}}">
            {{csrf_field()}}

          

            <div class="form-group">
                <label for="quantity">Stock Quantity:</label>

                <input type="number" class="form-control" id="quantity" name="quantity" required >
            </div>

                

            
        
            <br/>
       
            <div class="mt-2">
                <button type="submit" class="btn btn-primary mb-2">Edit</button>
               
            </div>
        
   
            @include('layouts.errors')

        </form>
        
    </div>
     <a href="/stock/index"> <button class="btn btn-primary mb-2">Return</button></a>
</div>

@endsection