<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

         
    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/magazin') }}">
                    Magazin
                </a>
                @if(Auth::user()->isAdmin() == 0)

                <a  class="navbar-brand" href="{{ URL::to('users') }}"> 
                    Admin Utilizatori 
                </a>

                <a  class="navbar-brand" href="{{ URL::to('products') }}"> 
                    Admin Produse 
                </a>
                @else
                @endif

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <!-- Cart Link -->
                        <li>
                        <div class="dropdown">
                            <button type="button" class="btn btn-info" data-toggle="dropdown">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                                <span class="badge badge-pill badge-danger">{{ count((array)session('cart')) }}</span>
                            </button>
    
                            <div class="dropdown-menu">
                                <div class="row total-header-section">
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span class="badge badge-pill badge-danger"> {{ count((array)session('cart')) }}</span>
                                </div>
                                @php 
                                    $total = 0 
                                @endphp
                                @foreach((array)session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                @endforeach
                                <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                    <p> Total: <span class="text-info">${{ $total }} </span> </p>
                                </div>
                                </div>
    
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                    <div class="row cart-detail">
                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                            <img src="{{ $details['image'] }}" />
                                        </div>
    
                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                            <p> {{ $details['name'] }} </p>
                                            <span class="price text-info"> ${{ $details['price'] }} </span>
                                            <span class="count">
                                                Quantity:{{ $details['quantity'] }}
                                            </span>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                                  
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="{{ route('cart') }}" class="btn btn-primary btn-block"> View all </a>
                                    </div>
                                </div>
                            </div>
                        </li>
    
    
                        <!-- Authentication Links -->
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
    
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
            <main class="py-4">
                <div class="container">
                    @yield('content')
                </div>
            </main> 
        </div> 

    </div>
    @yield('scripts')
</body>
</html>