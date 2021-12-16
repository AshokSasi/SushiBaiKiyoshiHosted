@extends('layouts.master')

@section('content')


<h1 class="banner1">All Orders</h1>
<div class="album py-5 contOpa rounded">  

  <form action="/orders/filter" method="post">
    {{csrf_field()}}
        <label for="months">Filter by Month:</label>
        <select name="months" id="cars">
            <option value="volvo">All</option>
            <option value="volvo">Jan</option>
            <option value="saab">Feb</option>
            <option value="opel">March</option>
            <option value="audi">April</option>
          </select>

          <label for="statusFilter">Filter by Status</label>
              <select  name="statusFilter" id="statusFilter">
                        <option value="ALL" @if($statusFilterFlag == "ALL" ){{ $var="selected"}}@endif>All</option>
                        <option value="In Progress" @if($statusFilterFlag == "In Progress" ){{ $var="selected"}}@endif>In Progress</option>
                        <option value="Completed" @if($statusFilterFlag == "Completed" ){{ $var="selected"}}@endif>Completed</option>
	                      <option value="Cancelled" @if($statusFilterFlag == "Cancelled" ){{ $var="selected"}}@endif>Cancelled</option>
            </select>


            <label for="menuFilter">Filter by Item</label>
            <select name="menuFilter" id="menuFilter">
                <option value="ALL" @if ($menuFilterFlag == 'ALL'){{ $var = 'selected' }}@endif>All</option>

                @foreach ($menuList as $menuItem)
                    <option value={{ $menuItem->menuItemName }} @if ($menuFilterFlag == $menuItem->menuItemName){{ $var = 'selected' }}@endif>{{ $menuItem->menuItemName }}
                    </option>
                @endforeach

            </select>
              
              <button class="btn btn-primary pl-3">Filter</button>
            </form>
            {{-- {{$filterStatusFlag = }} --}}

            <hr class="text-white"/>
            <br/>
            <br/>
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

              @if($menuFilterFlag != "ALL")
              @foreach($orderMenuList as $menuItemList)
              @if($menuItemList->contains($menuFilterFlag))
              @if ($statusFilterFlag == "ALL")
              @foreach($orders as $order)
                <tr>
                <th scope="row">{{$order->orderId}}</th>
                <td>{{$order->userId}}</td>
                <td>${{number_format((float)$order->orderTotal,2)}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                  <form action="/orders/update/{{$order->orderId}}" method="post">
                      {{csrf_field()}}
                     <select  name="status" id="status">
                {{-- <option value="" selected disabled hidden>Choose here</option> --}}
                        <option value="In Progress" @if($order->orderStatus === "In Progress" ){{ $var="selected"}} @endif>In Progress</option>
                        <option value="Completed" @if($order->orderStatus === "Completed") {{$var="selected"}}  @endif>Completed</option>
	                      <option value="Cancelled" @if($order->orderStatus === "Cancelled") {{$var="selected"}}  @endif>Cancelled</option>
                      </select>
                </td>
                
                <td> <button type="submit" class="btn btn-primary">Update</button></td>
                 </form>
                <td> <a href="/orders/show/{{$order->orderId}}"><button type="submit" class="btn btn-primary">View</button></a></td>
              </tr>
              @endforeach

              @else
              @foreach($orders as $order)
              
              @if ($order->orderStatus == $statusFilterFlag)
                <tr>
                <th scope="row">{{$order->orderId}}</th>
                <td>{{$order->userId}}</td>
                <td>${{number_format((float)$order->orderTotal,2)}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                  <form action="/orders/update/{{$order->orderId}}" method="post">
                      {{csrf_field()}}
                     <select  name="status" id="status">
                {{-- <option value="" selected disabled hidden>Choose here</option> --}}
                        <option value="In Progress" @if($order->orderStatus === "In Progress" ){{ $var="selected"}} @endif>In Progress</option>
                        <option value="Completed" @if($order->orderStatus === "Completed") {{$var="selected"}}  @endif>Completed</option>
	                      <option value="Cancelled" @if($order->orderStatus === "Cancelled") {{$var="selected"}}  @endif>Cancelled</option>
                      </select>
                </td>
                
                <td> <button type="submit" class="btn btn-primary">Update</button></td>
                 </form>
                <td> <a href="/orders/show/{{$order->orderId}}"><button type="submit" class="btn btn-primary">View</button></a></td>
              </tr>
              @endif
              @endforeach
              @endif
              @endif
              @endforeach

              @else



              @if ($statusFilterFlag == "ALL")
              @foreach($orders as $order)
                <tr>
                <th scope="row">{{$order->orderId}}</th>
                <td>{{$order->userId}}</td>
                <td>${{number_format((float)$order->orderTotal,2)}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                  <form action="/orders/update/{{$order->orderId}}" method="post">
                      {{csrf_field()}}
                     <select  name="status" id="status">
                {{-- <option value="" selected disabled hidden>Choose here</option> --}}
                        <option value="In Progress" @if($order->orderStatus === "In Progress" ){{ $var="selected"}} @endif>In Progress</option>
                        <option value="Completed" @if($order->orderStatus === "Completed") {{$var="selected"}}  @endif>Completed</option>
	                      <option value="Cancelled" @if($order->orderStatus === "Cancelled") {{$var="selected"}}  @endif>Cancelled</option>
                      </select>
                </td>
                
                <td> <button type="submit" class="btn btn-primary">Update</button></td>
                 </form>
                <td> <a href="/orders/show/{{$order->orderId}}"><button type="submit" class="btn btn-primary">View</button></a></td>
              </tr>
              @endforeach

              @else
              @foreach($orders as $order)
              
              @if ($order->orderStatus == $statusFilterFlag)
                <tr>
                <th scope="row">{{$order->orderId}}</th>
                <td>{{$order->userId}}</td>
                <td>${{number_format((float)$order->orderTotal,2)}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                  <form action="/orders/update/{{$order->orderId}}" method="post">
                      {{csrf_field()}}
                     <select  name="status" id="status">
                {{-- <option value="" selected disabled hidden>Choose here</option> --}}
                        <option value="In Progress" @if($order->orderStatus === "In Progress" ){{ $var="selected"}} @endif>In Progress</option>
                        <option value="Completed" @if($order->orderStatus === "Completed") {{$var="selected"}}  @endif>Completed</option>
	                      <option value="Cancelled" @if($order->orderStatus === "Cancelled") {{$var="selected"}}  @endif>Cancelled</option>
                      </select>
                </td>
                
                <td> <button type="submit" class="btn btn-primary">Update</button></td>
                 </form>
                <td> <a href="/orders/show/{{$order->orderId}}"><button type="submit" class="btn btn-primary">View</button></a></td>
              </tr>
              @endif
              @endforeach
              @endif
@endif
         
            </tbody>
          </table>
       
        @include('layouts.errors')
    </div>

@endsection