{{-- 
    
Title:      layouts/master.blade.php
Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
Details:    This page generates the overall layout template of the website which all other pages
            use along with their content to generate a webpage in the site. 
    
--}}


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Sushi Bai Kiyoshi</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">
   

    <!-- Bootstrap core CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  
    <!-- Custom styles for this template -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


 

  <link href="/css/app.css" rel="stylesheet"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @yield('scripts')
</head>

  <body>

    <header>
      

    @include('layouts.nav')

    
   

    @if($flash = session('message'))
    <div id="flash-message" class="alert alert-success" role="alert">

      {{$flash}}

    </div>
    @endif

    
    </header>
    
<div class="container p-3 p-md-5">
  <div class="row">
    @yield('content')

  
  </div>

</div>
@include('layouts.footer')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
  </body>
</html>
