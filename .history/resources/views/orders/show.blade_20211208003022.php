@extends('layouts.master')

@section('content')

<h1 class="banner1">Order # {{$order->orderId}}</h1>
<div class="album py-5 contOpa rounded">  

            <hr class="text-white"/>
            <br/>
            <br/>
           <p>{{$order->orderTotal}}</p> 
           <p>{{ $user->orderUser->userFirstName}} {{ $user->orderUser->userLastName}}</p> 
           <p>{{$order->orderStatus}}</p> 
           <p>{{$order->created_at}}</p> 
          
           
        <table class="table table-hover table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Item</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total ($)</th>
           
              </tr>
            </thead>
            <tbody>
           
                @foreach ($currentItem->orderMenu as $itemOrdered)
          
                <tr>
                    <th scope="row">{{$order->orderId}}</th>
                    <td>{{$order->userId}}</td>
                    <td>${{number_format((float)$order->orderTotal,2)}}</td>
                    <td>{{$order->created_at}}</td>
                </tr>
              <p>{{$itemOrdered->menuItemName}}</p>
      
                @endforeach 
                
              
             
         
            </tbody>
          </table>
       
        @include('layouts.errors')
    </div>

@endsection