


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sushi Bai Kiyoshi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/product/1') ? 'active' : null }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/menu/index">Menu</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>


        @if(Auth::check())
        <li class="nav-item">
          <a class="nav-link " href="/user/index">{{ Auth::user()->userFirstName }}</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="/cart/index">Cart</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="/user/orders">Order History</a>
        </li>
        @if(Auth::user()->userPosition == "a")
        <li class="nav-item">
          <a class="nav-link " href="/orders/index">All Orders</a>
        </li>
          <li class="nav-item">
          <a class="nav-link " href="/stock/index">Stock</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="/admin/index">All Users</a>
        </li>
        @endif
      

        <li class="nav-item">
          <a class="nav-link " href="/logout">Logout</a>
        </li>
        
      @endif
     
      @if(!Auth::check())
      <a class="nav-link ml-auto" href="/login">Login</a>
      @endif
      </ul>
        
      
    </div>
  </div>
</nav>
   



