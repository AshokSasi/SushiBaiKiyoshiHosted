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
           {{-- @php(dd($orderedItem)) --}}
           @foreach ($orderedItem as $itemOrdered)
           
              <p>{{$itemOrdered->menuItemName}}</p>
     
            @endforeach 
        <table class="table table-hover table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Order ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Total ($)</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                <th scope="col"></th>
           
              </tr>
            </thead>
            <tbody>
              {{-- @foreach($order as $order)
                <tr>
                {{-- <th scope="row">{{$order->orderId}}</th>
                <td>{{$order->userId}}</td>
                <td>${{number_format((float)$order->orderTotal,2)}}</td>
                <td>{{$order->created_at}}</td> --}}
              </tr>
              {{-- @endforeach --}} 
              {{-- @foreach($menuItems as $menu)
              @foreach($menu->menuOrder as $menuOrder)
              
              @endforeach
              @endforeach --}}
         
            </tbody>
          </table>
       
        @include('layouts.errors')
    </div>

@endsection