<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>BarJa.Tech</title>
    @include('layouts.script')

    <!-- Scripts -->

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->

    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <style type="text/css">
        body{
            background-image: url('images/sunrise.jpg');
        }
    </style>
</head>
<body>

    <!-- banner -->
<div class="banner_top" id="home">
	<div data-vide-bg ="video/gift-packs">
		<div class="center-container inner-container">
			<div class="w3_agile_header">
						<div class="w3_agileits_logo">
								
							</div>
							<div class="w3_menu">
							<div class="agileits_w3layouts_banner_info">
				
                            <div class="w3_agileits_logo">
								<h1><a href="#">BaJa.Tech<span>Barokah Jaya Technologi</span></a></h1>
                            </div>
								<form action="#" method="post"> 
									<input type="search" name="search" placeholder=" " required="">
									<input type="submit" value="Search">
								</form>
							
								<div class="top-nav">
								<nav class="navbar navbar-default">
									
									<!-- Collect the nav links, forms, and other content for toggling -->
									<!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
										<ul class="nav navbar-nav">
											<li class="home-icon"><a href="index.html"><span class="fa fa-home" aria-hidden="true"></span></a></li>
											<li><a href="about.html">About</a></li>
											<li><a href="gallery.html" class="active">Gallery</a></li>
											<li><a href="buynow.html">Buy</a></li>
											<li><a href="#" class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
												<ul class="dropdown-menu">
													<li><a class="hvr-bounce-to-bottom" href="icons.html">Web Icons</a></li>
													<li><a class="hvr-bounce-to-bottom" href="codes.html">Short Codes</a></li>
												</ul>
											</li>	 
											<li><a href="contact.html">Contact</a></li>
											<li class="nav-cart-w3ls">
												<form action="#" method="post" class="last"> 
													<input type="hidden" name="cmd" value="_cart">
													<input type="hidden" name="display" value="1">
													<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
												</form> 
											</li>
										</ul>	
									</div>	 -->
								</nav>	
							</div>
						</div>

					<div class="clearfix"></div>
			    </div>
				<!-- banner-text -->		
      </div>
   </div>
     </div>
     <br>
<!-- //banner -->


    <div id="app">
      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="nav-item" style="margin-right:10px">
                                <a class="nav-link btn btn-primary" href="{{ url('/') }}">HOME</a>
                        </li>
                        @if (Auth::check())
                        <li class="nav-item dropdown" style="margin-right:10px">
                            <a class="nav-link dropdown-toggle btn btn-primary " href="#" id="navbarDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Product
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.products.index')
                                }}">List</a>

                                <a class="dropdown-item" href="{{ route('admin.products.create')
                                }}"> Tambah</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown" style="margin-right:10px">
                            <a class="nav-link dropdown-toggle btn btn-primary" href="#" id="navbarDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Order
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.orders.index')
                                }}"><i class="fas fa-list"></i> List</a>

                                <a class="dropdown-item" href="{{ route('admin.orders.create')
                                }}"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary" href="{{ route('carts.index') }}"><i class="fa fa-shopping-cart"></i> Cart <span class="badge badge-pill badge-danger">
                            @if(session('cart'))
                                {{ count(session('cart')) }}
                            @else
                                0
                            @endif
                            </span></a>
                        </li>
                        @endif
                    </ul>
                    <div class="clearfix"> </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a style="margin-right:10px" class="nav-link btn btn-primary" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-primary" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa fa-user"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
