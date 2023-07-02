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
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- <ul class="navbar-nav me-auto"> </ul> -->

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                   @guest
                   
                    <!-- Authentication Links -->
                      
                            <!-- @if (Route::has('login')) -->
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li> -->
                            <!-- @endif -->

                            <!-- @if (Route::has('register')) -->
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> -->
                            <!-- @endif -->

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