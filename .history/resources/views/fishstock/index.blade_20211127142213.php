@extends('layouts.master')

@section('content')
<h1 class="banner1">Fish Stock</h1>
<div class="album py-5 contOpa rounded">  
  <button class="btn btn-primary mb-2">Add</button>

        <table class="table table-hover table-striped table-dark">
            <thead>
              <tr>
                <th style="text-align:center" scope="col">Fish Name</th>
                <th style="text-align:center" scope="col">Market Price</th>
                <th style="text-align:center" scope="col">Year</th>
                <th style="text-align:center" scope="col">Personal Stock</th>
                <th style="text-align:center" scope="col"></th>
                <th style="text-align:center" scope="col"></th>
          
              </tr>
            </thead>
            <tbody>
              <tr>
              
                <td style="text-align:center">Salmon</td>
                <td style="text-align:center">$20.00</td>
                <td style="text-align:center">2021</td>
                <td style="text-align:center">50</td>
                <td>
           
                    <button class="btn btn-primary">Edit</button>
               
              
                 </td>
                 <td>
                  <a href="/stock/show">
                    <button type="submit" class="btn btn-primary">View</button>
                  </a> 
                 </td>
              </tr>
              <tr>
               
                <td style="text-align:center">Shrimp</td>
                <td style="text-align:center">$1.10</td>
                <td style="text-align:center">2021</td>
                <td style="text-align:center">100</td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                 </td>
                 <td>
                  <a href="/stock/show">
                    <button type="submit" class="btn btn-primary">View</button>
                  </a> 
                 </td>
              </tr>
              <tr>
           
                <td style="text-align:center">Crab</td>
                <td style="text-align:center">$7.60</td>
                <td style="text-align:center">2021</td>
                <td style="text-align:center">15</td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                 
                 </td>
                 <td>
                  <a href="/stock/show">
                    <button type="submit" class="btn btn-primary">View</button>
                  </a> 
                 </td>
              </tr>

               
              
            </tbody>
          </table>
       
        @include('layouts.errors')
    </div>

@endsection