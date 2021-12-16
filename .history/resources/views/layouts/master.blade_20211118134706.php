
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
     <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template -->
   
  
  <link href="/css/app.css" rel="stylesheet"> 
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
