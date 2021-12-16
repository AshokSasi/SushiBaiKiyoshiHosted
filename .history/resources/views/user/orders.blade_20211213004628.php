{{-- 

Title:      user/orders.blade.php
Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
Details:    This page generates the orders page content for the current logged in user of the website which 
            allows a user to all their own personal orders. 

--}}

@extends('layouts.master')

@section('content')
<h1 class="banner1">Previous Orders</h1>
<div class="album py-5 contOpa rounded">

        <table class="table table-hover table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Order#</th>
                <th scope="col">Order Total</th>
                <th scope="col">Order Status</th>
                <th scope="col">Created At</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              <tr>
                <th scope="row">{{$order->orderId}}</th>
                <td>${{$order->orderTotal}}</td>
                <td>{{$order->orderStatus}}</td>
                <td>{{$order->created_at}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

        @include('layouts.errors')
    </div>

@endsection