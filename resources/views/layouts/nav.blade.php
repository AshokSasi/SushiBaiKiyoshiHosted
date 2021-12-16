{{-- 
    
Title:      layouts/nav.blade.php
Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
Details:    This page generates navigation bar at the top the website which displays the navigation
            options for the user. Options will vary depending on the user's role. 
    
--}}


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sushi Bai Kiyoshi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : null }}" aria-current="page" href="/">Home</a>
        </li>

         <li class="nav-item">
          <a class="nav-link {{ Request::is('about') ? 'active' : null }}" href="/about">About</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('menu/index') ? 'active' : null }}" href="/menu/index">Menu</a>
        </li>

       


        @if(Auth::check())
       

        <li class="nav-item">
          <a class="nav-link {{ Request::is('cart/index') ? 'active' : null }}" href="/cart/index">Cart</a>
        </li>
        @if(Auth::user()->userPosition == "c")
        <li class="nav-item">
          <a class="nav-link {{ Request::is('user/orders') ? 'active' : null }}" href="/user/orders">Order History</a>
        </li>
        @endif
        @if(Auth::user()->userPosition == "a" || Auth::user()->userPosition == "e")
        <li class="nav-item">
          <a class="nav-link {{ Request::is('orders/index') ? 'active' : null }}" href="/orders/index">All Orders</a>
        </li>

        @if(Auth::user()->userPosition == "a")
          <li class="nav-item">
          <a class="nav-link {{ Request::is('stock/index') ? 'active' : null }}" href="/stock/index">Stock</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/index') ? 'active' : null }}" href="/admin/index">All Users</a>
        </li>
        @endif
        @endif

         <li class="nav-item">
          <a class="nav-link {{ Request::is('user/index') ? 'active' : null }}" href="/user/index">{{ Auth::user()->userFirstName }}</a>
        </li>
      

        <li class="nav-item">
          <a class="nav-link " href="/logout">Logout</a>
        </li>
        
      @endif
     
      @if(!Auth::check())
      <a class="nav-link ml-auto {{ Request::is('login') ? 'active' : null }}"  href="/login">Login</a>
      @endif
      </ul>
        
      
    </div>
  </div>
</nav>
   



