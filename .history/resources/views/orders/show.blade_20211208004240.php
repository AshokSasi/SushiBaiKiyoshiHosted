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
                    {{dd($itemOrdered->menuItemId)}}
                    @if($quantity->menuItemId == $itemOrdered->menuItemId)
                     
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