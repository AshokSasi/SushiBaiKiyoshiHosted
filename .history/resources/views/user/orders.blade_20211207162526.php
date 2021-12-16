@extends('layouts.master')

@section('content')
<h1 class="banner1">Previous Orders</h1>
<div class="album py-5 contOpa rounded">  

        <table class="table table-hover table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Order#</th>
                <th scope="col">Item Name</th>
                <th scope="col">Qty</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Sushi</td>
                <td>2</td>
                <td>2021-10-17</td>
                <td>Completed</td>
              </tr>
              
            </tbody>
          </table>
       
        @include('layouts.errors')
    </div>

@endsection