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

        <p>Current Amount: {{$stock->stockQuantity}}</p>
    
        <form method="POST" action="/stock">
            {{csrf_field()}}

          

            <div class="form-group">
                <label for="price">Stock Amount:</label>

                <input type="number" class="form-control" id="price" name="price" step=".01" required >
            </div>

                

            
        
            <br/>
       
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        
   
            @include('layouts.errors')

        </form>
    </div>
</div>

@endsection