@extends ('layouts.master')

{{-- @section('content') --}}

 
  <h1  >Welcome to Sushi Bai Kiyoshi</h1>

  
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="/img/salmon-sushi.jpg" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="/img/tuna-sushi.jpg" alt="Chicago">
    </div>

    <div class="item">
      <img src="/img/tuna-sushi.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

{{-- <section class="py-5 text-center container">
  {{-- <div class="album py-5 contOpa rounded">  
    <div class="row py-lg-5">
      
      <div class="col-lg-6 col-md-8 mx-auto">
        
        <h5 class="white-text">Have a look at our menu and check out our mouth watering sushi.</h5>
        <p>
        </p>
      </div>
    </div>
  </div> 

  
  </section> --}}
    {{-- @endsection --}}