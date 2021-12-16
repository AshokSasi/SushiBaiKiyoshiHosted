@extends('layouts.master')

@section('content')
<h1>Stock</h1>
<div class="album py-5 contOpa rounded">  
  <button class="btn btn-primary mb-2">Historical Price For (insert fish)</button>

        <table class="table table-hover table-striped table-dark">
            <thead>
              <tr>
                <th style="text-align:center" scope="col">Date</th>
                <th style="text-align:center" scope="col">Market Price</th>
               
        
          
              </tr>
            </thead>
            <tbody>
              <tr>
              
                <td style="text-align:center">2020-03-9</td>
                <td style="text-align:center">$18.00</td>
                
        
              </tr>
              <tr>
               
                <td style="text-align:center">2019-03-14</td>
                <td style="text-align:center">$17.00</td>
              </tr>
              <tr>
           
                <td style="text-align:center">2028-02-10</td>
                <td style="text-align:center">$17.00</td>
              </tr>

               
              
            </tbody>
          </table>
       
        @include('layouts.errors')
    </div>

@endsection