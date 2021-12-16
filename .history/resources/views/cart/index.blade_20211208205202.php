@extends ('layouts.master')

@section('content')
<h1 class="banner1 mb-3">Checkout</h1>
<div class="album py-5 contOpa rounded">  
<div class="row g-5">
    <div class="col-md-5 col-lg-4 order-md-last">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="white-text ">Your cart</span>
         @php($totalQuant=0)
         @php($total=0)
          @if(session('cart'))

        @foreach(session('cart') as $id => $menuItems)
        
           @php($totalQuant+= $menuItems['quantity'])
        @endforeach
        @endif
        <span class="badge bg-primary rounded-pill">{{ $totalQuant}}</span>
      </h4>
      @if(session('cart'))
      @foreach(session('cart') as $id => $menuItems)
      @php($total += $menuItems['price'] * $menuItems['quantity'])
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-sm">
          <div>
       
            <h6 class="my-0">{{ $menuItems['name'] }} x {{ $menuItems['quantity']}}</h6>
             
            <strong class="">${{ number_format((float)$menuItems['price'],2) }}</strong>
          </div>
          {{-- <span class="pull-right">${{ number_format((float)$menuItems['price'],2) }}</span> --}}
          <a href="/cart/destroy/{{$id}}"><button type="submit" class="btn btn-danger btn-sm">Remove</button></a>
            
        </li>
     @endforeach
     @endif
      <li class="list-group-item d-flex justify-content-between">
            <span>Total (CAD)</span>
            <strong>${{number_format((float)$total,2)}}</strong>
          </li>
    
        {{-- <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">−$5</span>
        </li> --}}
        {{-- <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>$20</strong>
        </li> --}}
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <button type="submit" class="btn btn-secondary">Redeem</button>
        </div>
      </form>
    </div>

{{--END OF CART--}}
    @if(Auth::user()->userPosition == "a" || Auth::user()->userPosition == "e")
    <div class="col-md-7 col-lg-8">
      <h4 class="mb-3 white-text">Billing Information</h4>
      <form method="POST" action="/orders/find">
    
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="" value="" >
           
          </div>

         <button type="submit" class="btn btn-primary">Find</button>
      
          {{-- <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button> --}}
        </form>
   
   
    @endif


    <div class="col-md-7 col-lg-8">
       
        <form method="POST" action="/orders">
            {{csrf_field()}}
          <div class="row g-3">
 

          <hr class="my-4 white-text">

          <h4 class="mb-3 white-text">Payment</h4>

         <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked >
              <label class="form-check-label white-text" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" >
              <label class="form-check-label white-text" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" >
              <label class="form-check-label white-text" for="paypal">PayPal</label>
            </div>
          </div>

         

           

          <hr class="my-4 white-text">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
          
        </form>
  
      </div>
    </div>
     </div>
    @endsection