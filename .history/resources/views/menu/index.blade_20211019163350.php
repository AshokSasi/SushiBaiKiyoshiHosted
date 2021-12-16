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
<main>
  <h1 class="fw-light">Our Sushi</h1>
  
 
  <div class="album py-5 contOpa rounded">
    <div class="container">

      @if(Auth::check())
      <a href="/menu/create">
         <button type="submit" class="btn btn-primary">Add Item</button>
       </a>
     
     
      @endif
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-1">
        @for ($i = 0; $i < 9; $i ++)
        
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <ul>
                <a href=""><li>Salmon</li></a>
              <a href=""><li>Rice</li></a>
              <a href=""><li>Tuna</li></a>
              </ul>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                  @if(Auth::check())
                  <a href="/menu/edit">
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </a>
                
                  <button type="button"  class="btn btn-sm btn-outline-secondary">Delete</button>
                 @endif
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>

        @endfor
     
        
      </div>
    </div>
  </div>
</main>
   

@endsection