@extends('layouts.master')

@section('content')

<h1 class="banner1">Order # {{$order->orderId}}</h1>
<div class="album py-5 contOpa rounded">  

            <hr class="text-white"/>
            <br/>
            <br/>
            <table class="table table-hover table-striped table-dark">   
              <tr>
                <td>
                  <h3>Customer Name:</h3>
                  <td>
                <td>     
                  <p>{{ $user->orderUser->userFirstName}} {{ $user->orderUser->userLastName}}</p> 
                </td>
              </tr>
              <tr>
                <td>
                  <h3>Order Total:</h3>
                  <td>
                <td>     
                  <p>{{$order->orderTotal}}</p> 
                </td>
              </tr>
              <tr>
                <td>
                  <h3>Order Date:</h3>
                  <td>
                <td>     
                  <p>{{$order->created_at}}</p> 
                </td>
              </tr>
              <tr>
                <td>
                  <h3>Order Status:</h3>
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
       
        @include('layouts.errors')
    </div>

@endsection