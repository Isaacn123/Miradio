<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/defaults.css') }}" rel="stylesheet">
    <style>
        .nav{
            text-emphasis: none !important;
            background:red !important;
            background-color:red !important;
        }

    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])   
</head>
<body class="bg-blue">
    <div id="app">
    <!-- shadow-sm -->
    <nav class="navbar navbar-expand-lg navbar-light bg-blue">
            <div class="container-fluid">
            <button class="custom-toggler navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                 </button>

                    <!-- <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="dashboard.php">MIRACLE RADIO APP </a>
              </div> -->

            <a class="navbar-brand colord" href="{{ url('/') }}">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    @auth
                    <a class="navbar-brand colord" href="#">MIRACLE RADIO APP </a>
                    @endauth
                </a>


                 <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <!-- <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="dashboard.php">MIRACLE RADIO APP </a>
              </div> -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"> </ul>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                   @guest
                    <!-- <li>M</li>
                    <li>B</li> -->
                    <!-- Authentication Links -->
                      
                            @if (Route::has('login'))
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li> -->
                            @endif

                            @if (Route::has('register'))
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> -->
                            @endif

                   <!-- <li class="nav-item">M</li> -->
                   
                    @else
                    <li class="nav-item dropdown" style="text-decoration:none;">
                                <a style="text-decoration:none;" id="navbarDropdown" class="nav-link text-white  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                    </ul>

                 </div>
   

    </div>
    </nav>
      

           <!-- #Top Bar -->

        <!-- Left Sidebar -->
        @auth
     @include('includes.aside')
        <!-- #END# Left Sidebar -->
        @endauth


        <!-- <section class="content"> -->
            <!-- <div class="container-fluid">
                <h3> Here am tres</h3>

                <div class="row">
                     <h1> Hello here is my title again ghere </h1>
                </div>
    </div> -->
        <!-- </section> -->

        <section class="content">

            
         
             <main class="py-4">
         @if(session()->has('success'))

         <div class="alert alert-success">
         {{session()->get('success')}}
         </div>

         @endif
        

            @yield('content')
        </main>
        </section>
 
   
    </div>
</body>
</html>
