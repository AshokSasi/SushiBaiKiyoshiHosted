@extends('layouts.master')

@section('content')

<h1 class="banner1">All Orders</h1>
<div class="album py-5 contOpa rounded">  

        <label for="months">Filter by Month:</label>
        <select name="months" id="cars">
            <option value="volvo">All</option>
            <option value="volvo">Jan</option>
            <option value="saab">Feb</option>
            <option value="opel">March</option>
            <option value="audi">April</option>
          </select>

        

          <label for="months">Filter by Status</label>
          <select name="months" id="cars">
            <option value="volvo">All</option>
              <option value="volvo">Completed</option>
              <option value="saab">Cancelled</option>
              <option value="opel">In Progress</option>
            </select>

            <label for="months">Filter by Item</label>
            <select name="months" id="cars">
              <option value="volvo">All</option>
                <option value="volvo">Salmon Roll</option>
                <option value="saab">Crab Roll</option>
                <option value="opel">California Roll</option>
              </select>
              
              <button class="btn btn-primary pl-3">Filter</button>

            <hr class="text-white"/>
            <br/>
            <br/>
        <table class="table table-hover table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Order ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Item Name</th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
           
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              @foreach($order->items as $items)
              
                <tr>
                <th scope="row">{{$order->orderId}}</th>
                <td>{{$order->userId}}</td>
                <td>{{$items->menuId}}</td>
                <td>{{$items->orderedQuantity}}</td>
                <td>$30.50</td>
                <td>{{$order->created_at}}</td>
                <td>
                   {{$order->orderStatus}}
                </td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                 </td>
              </tr>
              @endforeach
              @endforeach
              {{-- @foreach($menuItems as $menu)
              @foreach($menu->menuOrder as $menuOrder)
              
              @endforeach
              @endforeach --}}
         
            </tbody>
          </table>
       
        @include('layouts.errors')
    </div>

@endsection