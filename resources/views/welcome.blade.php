{{-- 
    
Title:      vendor/welcome.blade.php
Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
Details:    This page generates the home page content for the website which displays the home page
            of the website which welcomes the user. Features an auto scrolling carasol which cycles
            through various options for users.
    
--}}

@extends ('layouts.master')

@section('content')

 
  <h1 class="banner1">Welcome to Sushi Bai Kiyoshi</h1>


  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" height="100%" src="/img/sushibaikiyoshiimg.jpg" alt="First slide">

        <div class="container">
          <div class="carousel-caption text-start">
            
              <h1>Home of the most mouthwatering sushi in Downtown Toronto</h1>      
                <p><a class="btn btn-lg btn-primary" href="/login">Login to start ordering</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" height="100%" src="/img/interior.jpg" alt="Second slide">

        <div class="container">
          <div class="carousel-caption">
            <h1>Dont have an account? Sign up to recieve promotions and discounts.</h1>
        
            <p><a class="btn btn-lg btn-primary" href="/register">Sign Up Here</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
         <img class="d-block w-100" height="100%" src="/img/slideimg-3.jpg" alt="First slide">

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Check out our menu</h1>
            <p>Browse our selection of mouthwatering sushi!</p>
            <p><a class="btn btn-lg btn-primary" href="/menu/index">Browse Menu</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

    @endsection