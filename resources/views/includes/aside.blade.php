 <!-- <aside id="leftsidebar" class="sidebar"> -->
            <!-- User Info -->
            <!-- <div class="user-info">
                <div>
                    <img src="{{asset('assets/images/ic_launcher.png')}}" width="48" height="48" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                    </div>
                    <div class="email">{{ Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="edit-member.php?id={{ Auth::user()->id }}"><i class="material-icons">person</i>Profile</a></li>
                            <li><a href="logout.php"><i class="material-icons">power_settings_new</i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <!-- #User Info -->
            <!-- Menu -->
            <!-- <div class="menu">
                <ul class="list">
                    <li class="header">MENU</li>
                    <li class="active">
                        <a href="{{ route('home')}}">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('albums') }}">
                            <i class="material-icons">album</i>
                            <span>Albums</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('category.index')}}">
                            <i class="material-icons">view_list</i>
                            <span>Manage Category</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{route('message.index')}}">
                            <i class="material-icons">view_list</i>
                            <span>Manage Messages</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="material-icons">library_books</i>
                            <span>Manage Radio</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="material-icons">people</i>
                            <span>Manage Social</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="material-icons">monetization_on</i>
                            <span>Manage Ads</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="material-icons">notifications</i>
                            <span>Notification</span>
                        </a>
                    </li>

                    <li>
                        <a href="#p">
                            <i class="material-icons">people</i>
                            <span>Administrators</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="material-icons">settings</i>
                            <span>Settings</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="material-icons">vpn_key</i>
                            <span>License</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="material-icons">power_settings_new</i>
                            <span>Logout</span>
                        </a>
                    </li>

                </ul>
            </div> -->
            <!-- #Menu -->
            <!-- Footer -->
            <!-- <div class="legal">
                <div class="copyright">
                    Copyright &copy; 2023 <a href="#" target="_blank">Isaac Dev</a>
                </div>
                <div class="version">
                    <b>Version: </b> 5.2.0
                </div>
            </div> -->
            <!-- #Footer -->
        <!-- </aside> -->

        <!-- bg-blue-grey -->
        <!-- <div id="sidebar-wrapper" class="toggled">
        <aside class='col-12 col-md-2 p-0  flex-shrink-1 hidde' >

        <nav class="navbar navbar-expand navbar-dark bg-white flex-md-column flex-row align-items-start py-2 sidebar navb">

        <div class="collapse navbar-collapse">
            
        <div class="menu"> -->
        <!-- <div class="user-info">
                <div>
                    <img src="{{asset('assets/images/ic_launcher.png')}}" width="48" height="48" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                    </div>
                    <div class="email">{{ Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="edit-member.php?id={{ Auth::user()->id }}"><i class="material-icons">person</i>Profile</a></li>
                            <li><a href="logout.php"><i class="material-icons">power_settings_new</i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
                <!-- <ul class="list flex-md-column flex-row navbar-nav w-100 justify-content-between">
                    <li class="header">MENU</li>
                    <li class="active">
                        <a  class="nav-link p1-0" href="{{ route('home')}}">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link p1-0" href="{{ route('albums') }}">
                            <i class="material-icons">album</i>
                            <span>Albums</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a   class="nav-link p1-0" href="{{route('category.index')}}">
                            <i class="material-icons">view_list</i>
                            <span>Manage Category</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a  class="nav-link p1-0" href="{{route('message.index')}}">
                            <i class="material-icons">view_list</i>
                            <span>Manage Messages</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link p1-0">
                            <i class="material-icons">library_books</i>
                            <span>Manage Radio</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#">
                            <i class="material-icons">people</i>
                            <span>Manage Social</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="material-icons">monetization_on</i>
                            <span>Manage Ads</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="material-icons">notifications</i>
                            <span>Notification</span>
                        </a>
                    </li>

                    <li>
                        <a href="#p">
                            <i class="material-icons">people</i>
                            <span>Administrators</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="material-icons">settings</i>
                            <span>Settings</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#">
                            <i class="material-icons">vpn_key</i>
                            <span>License</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="material-icons">power_settings_new</i>
                            <span>Logout</span>
                        </a>
                    </li>

</div>
        </div>
        </nav>
        </aside>

</div> -->

<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 asidebar">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{ route('home')}}" class="nav-link align-middle px-0">
                        <i class="material-icons">dashboard</i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('albums') }}"  class="nav-link px-0 align-middle">
                        <i class="material-icons">album</i> <span class="ms-1 d-none d-sm-inline">Albums</span> </a>
                    </li>
                    <li>
                        <a href="{{route('category.index')}}" class="nav-link px-0 align-middle">
                        <i class="material-icons">view_list</i> <span class="ms-1 d-none d-sm-inline">Manage Category</span></a>
                
                    <li>
                        <a href="{{route('message.index')}}" class="nav-link px-0 align-middle ">
                        <i class="material-icons">view_list</i> <span class="ms-1 d-none d-sm-inline">Manage Messages</span></a>
                    </li>
                    <li>
                        <a href="#"  class="nav-link px-0 align-middle">
                        <i class="material-icons">library_books</i><span class="ms-1 d-none d-sm-inline">Manage Radio</span> </a>
                    </li>                  
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                        <i class="material-icons">people</i> <span class="ms-1 d-none d-sm-inline">Manage Social</span> </a>
                    </li>

                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="material-icons">monetization_on</i>
                            <span class="ms-1 d-none d-sm-inline">Manage Ads</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="material-icons">notifications</i>
                            <span class="ms-1 d-none d-sm-inline">Notification</span>
                        </a>
                    </li>

                    <li>
                        <a href="#p" class="nav-link px-0 align-middle">
                            <i class="material-icons">people</i>
                            <span class="ms-1 d-none d-sm-inline">Administrators</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="material-icons">settings</i>
                            <span class="ms-1 d-none d-sm-inline">Settings</span>
                        </a>
                    </li>

                    <li class="nav-item" class="nav-link px-0 align-middle">
                        <a href="#">
                            <i class="material-icons">vpn_key</i>
                            <span class="ms-1 d-none d-sm-inline">License</span>
                        </a>
                    </li>

                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">loser</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>