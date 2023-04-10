<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{route('welcome')}}">E-Shop</a>
    <div class="search-bar">
 
      <form action="{{route('searchproduct')}}" method="post"> 
        <div class="input-group">
          <input type="search" class="form-control" id="search_product" name="product_name" required placeholder="Search Products" aria-label="Username" aria-describedby="basic-addon1">
          <button class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></button>
        </div>
      </form>

    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('category_products')}}">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('cart_show')}}">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('wish_list')}}">Wish List</a>
        </li>
        <li>
        @guest

            @if (Route::has('login'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif

            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                    <a href="{{route('my_orders')}}" class="dropdown-item">
                      My Orders
                    </a>
                  </li>
                  <li>
                    <a href="" class="dropdown-item">
                      My Profile
                    </a>
                  </li>
                  <li>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </li>
                </ul>
            </li>

        @endguest

        </li>
      </ul>
    </div>
  </div>
</nav>