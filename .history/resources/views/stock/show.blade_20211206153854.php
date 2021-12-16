@extends('layouts.master')

@section('content')
<h1 class="banner1">Stock</h1>
<div class="album py-5 contOpa rounded">  
 <a href="/stock/index"> <button class="btn btn-primary mb-2">Return</button></a>
 

        <table class="table table-hover table-striped table-dark">
            <thead>
              <tr>
                <th style="text-align:center" scope="col">Fish Name</th>
                <th style="text-align:center" scope="col">Fish Price</th>
                <th style="text-align:center" scope="col">Year</th>
             
          
              </tr>
            </thead>
            <tbody>
              @foreach ($stocks as $stock)
              @foreach ($stock->fish as $fish)
              <tr>
              <td class="center" >{{$stocks->stockDescription}}</td>
              
              <td class="center" >${{number_format((float)$fish->fishPrice,2)}}</td>
              <td class="center" >{{$fish->fishPriceDate}}</td>
          
             
              </tr>
              @endforeach
              @endforeach

               
              
            </tbody>
          </table>
       
        @include('layouts.errors')
    </div>

@endsection