@extends('layouts.master')

@section('content')
<h1 class="banner1">{{$stocks->stockDescription}} Stock</h1>
<div class="album py-5 contOpa rounded">  
 <a href="/stock/index"> <button class="btn btn-primary mb-2">Return</button></a>
 

        <table class="table table-hover table-striped table-dark">
            <thead>
              <tr>
                <th style="text-align:center" scope="col">Fish Price</th>
                <th style="text-align:center" scope="col">Year</th>
             
          
              </tr>
            </thead>
            <tbody>
              @foreach ($stocks as $stock)
              {{-- @foreach ($stock->fish as $fish) --}}
              <tr>
                <td class="center" >{{$stocks->stockDescription}}</td>
              
              {{-- <td class="center" >${{number_format((float)$stock->fishPrice,2)}}</td>
              <td class="center" >{{$stock->fishPriceDate}}</td> --}}
          
             
              </tr>
              {{-- @endforeach --}}
              @endforeach

               
              
            </tbody>
          </table>
       
        @include('layouts.errors')
    </div>

@endsection