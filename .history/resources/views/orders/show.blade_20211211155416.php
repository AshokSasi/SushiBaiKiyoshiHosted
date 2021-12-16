{{-- 
    
Title:      fishstock/index.blade.php
Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
Details:    This page generates the fish stock index page content of the website which displays
            historical fish prices and. 
    
--}}

@extends('layouts.master')

@section('content')

<h1 class="banner1">Order # {{$order->orderId}}</h1>
<div class="album py-5 contOpa rounded">  

            <hr class="text-white"/>
            <br/>
            <h3 class="white-text"><strong> Order Summary</strong></h3>
            <table class="table table-hover table-striped table-dark">   
              <tr>
                <td>
                  <h5>Customer Name:</h5>
                  <td>
                <td>     
                  <p>{{ $user->orderUser->userFirstName}} {{ $user->orderUser->userLastName}}</p> 
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Order Total:</h5>
                  <td>
                <td>     
                  <p>${{number_format((float)$order->orderTotal,2)}}</p> 
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Order Date:</h5>
                  <td>
                <td>     
                  <p>{{$order->created_at}}</p> 
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Order Status:</h5>
                  <td>
                <td>     
                  <p>{{$order->orderStatus}}</p> 
                </td>
              </tr>          
           
        <table class="table table-hover table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Item</th>
                <th scope="col">Price ($)</th>
                <th scope="col">Quantity</th>
           
              </tr>
            </thead>
            <tbody>
          
                @foreach ($currentItem->orderMenu as $itemOrdered)
          
                <tr>
                    <th scope="row">{{$itemOrdered->menuItemName}}</th>
                   
                    <td>${{number_format((float)$itemOrdered->menuItemPrice,2)}}</td>
                    @foreach($order->items as $quantity)
                    
                    @if($quantity->menuItemId == $itemOrdered->id)
                     
                     <td>{{$quantity->orderedQuantity}}</td>
                     @endif
                     @endforeach 
                </tr>
             
      
                @endforeach 
                
              
             
         
            </tbody>
          </table>
          
          <a href="/orders/index"><button class="btn btn-primary">Return to All Orders</button></a>

        @include('layouts.errors')
    </div>

@endsection