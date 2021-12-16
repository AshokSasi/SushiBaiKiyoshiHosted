{{-- 
    
Title:      menuitem/index.blade.php
Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
Details:    This page generates menu page content of the website which displays all the items in the 
            menu and allow users to add them to their cart, as well as allows admins options to modify
            the menu.
    
--}}

@extends('layouts.master')

@section('content')


<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>  
<h1 class="banner1">Our Sushi</h1>
<main>

  
 
  <div class="album py-5 contOpa rounded">
    <div class="container">

      @if(Auth::check())
      @if(Auth::user()->userPosition == "a")
      <a href="/menu/create">
         <button type="submit" class="btn btn-primary">Add Item</button>
       </a>
     
     @endif 
      @endif
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-1">
        @foreach ($menuItem as $menuItem)
        
        <div class="col">
          <div class="card shadow-sm">
            
            <img width="100%" height="225" src="/img/{{ $menuItem->menuItemImage }}" alt="Salmon Sushi">
            <div class="card-body">
              <h3 class="card-text">
                <u>{{ $menuItem->menuItemName }}</u>
              </h3>

              <h4 class="card-text">${{number_format((float)$menuItem->menuItemPrice,2)  }}</h4>

              <p class="card-text">{{ $menuItem->menuItemDescription }}</p>
              {{-- <p class="card-text">{{ $menuItem->menuDiscountPercent }}</p> --}}
              {{-- <p class="card-text">{{ $menuItem->menuDiscountDate }}</p> --}}
              {{-- <h5 class="card-text text-right">{{ $menuItem->menuItemPrice }} </h5> --}}
              <ul>
                @foreach ($menuItem->menuStock as $tag)

                    <li>{{$tag->stockDescription}}</li>

                    @endforeach
              </ul>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="/cart/add/{{$menuItem->id}}"><button type="submit" class="btn btn-sm btn-outline-secondary">Add to Cart</button></a>
                  @if(Auth::check())
                  @if(Auth::user()->userPosition == "a")
                  <a href="/menu/edit/{{ $menuItem->id}}">
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </a>
                  
                  <!-- Make a form for the delete button action will be the id of the item $menuItem->id  -->
                  <form  method="GET" action="/menu/delete/{{ $menuItem->id}}">
                   {{csrf_field()}}
                    <button type="submit"  class="btn btn-sm btn-outline-secondary">Delete</button>
               
                  </form>

                  <form  method="POST" action="/menu/discount/{{ $menuItem->id}}">
                    {{csrf_field()}}
                     <button type="submit"  class="btn btn-sm btn-outline-secondary">Apply Discount</button>
                
                   </form>
                  
                  @endif
                 @endif
                </div>
              </div>
            </div>
          </div>
        </div>

        @endforeach
     
        
      </div>
    </div>
  </div>
</main>
   

@endsection