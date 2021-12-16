{{-- 
    
Title:      stock/index.blade.php
Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
Details:    This page generates the current stocks content of the website which displays all the stocks
            the user has and their quantities on hand. 
    
--}}

@extends('layouts.master')

@section('content')
<h1 class="banner1">Stock</h1>
<div class="album py-5 contOpa rounded">  
 {{-- <a href="/stock/create"> <button type="submit" class="btn btn-primary mb-2">Add</button></a> --}}
 

        <table class="table table-hover table-striped table-dark">
            <thead>
              <tr>
                <th style="text-align:center" scope="col">Fish Name</th>
                <th style="text-align:center" scope="col">Personal Stock</th>
                <th style="text-align:center" scope="col"></th>
                <th style="text-align:center" scope="col"></th>
          
              </tr>
            </thead>
            <tbody>
              @foreach ($stocks as $stock)
              <tr>
              <td class="center" >{{$stock->stockDescription}}</td>
              <td class="center" >{{$stock->stockQuantity}}</td>
              <td><a href="/stock/edit{{$stock->stockId}}"><button class="btn btn-primary mb-2">Edit</button></a></td>
              <td><a href="/stock/show/{{$stock->stockId}}"><button type="submit" class="btn btn-primary mb-2">View</button></a></td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
       
        @include('layouts.errors')
    </div>

@endsection