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
        @foreach(session('cart') as $id => $menuItems)
        
           @php($totalQuant+= $menuItems['quantity'])
        @endforeach
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
      <form class="needs-validation" novalidate>
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="firstName" class="form-label">First name</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

          <div class="col-sm-6">
            <label for="lastName" class="form-label">Last name</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
          <div class="col-sm-6">
            <label for="phone" class="form-label">Phone Number</label>
            <div class="input-group">
              <input type="text" class="form-control" id="phone" placeholder="999-999-(9999)" required>
            
            </div>
          </div>
   
   
    @endif


    <div class="col-md-7 col-lg-8">
       
        {{-- <form method="POST" action="/order">
          <div class="row g-3">
 

          <hr class="my-4 white-text">

          <h4 class="mb-3 white-text">Payment</h4>

          {{-- <div class="my-3">
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
          </div> --}}

         

           
{{-- 
          <hr class="my-4 white-text">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
          
        </form> --}}

                <form method="POST" action="/order" >
            {{csrf_field()}}

            <div class="form-group">
                <label for="itemname">Item Name</label>

                <input type="text" class="form-control" id="itemname" name="itemname" required >
            </div>
          
           <div class="form-group">
             <label for="body">Body</label>
            <textarea name="body" id="body" class= "form-control" cols="30" rows="6" ></textarea>
      
            </div>

            <div class="form-group">
                <label for="price">Price</label>

                <input type="number" class="form-control" id="price" name="price" step=".01" required >
            </div>
            <br/>
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control-file" name="image" id="image">
              </div>
                <br/>
              <label for="months">Add Tags:</label>
              <!--Do a loop querying through every tag -->
                <select name="months" id="cars">
                    <option value="volvo">Salmon</option>
                    <option value="volvo">Rice</option>
                </select>

                {{-- <button class="btn btn-primary btn-sm">Add Tag</button> --}}
       
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
      </div>
    </div>
     </div>
    @endsection