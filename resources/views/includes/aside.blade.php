<section>
     <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
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
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
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
                        <a href="#">
                            <i class="material-icons">view_list</i>
                            <span>Manage Category</span>
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
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    Copyright &copy; 2023 <a href="#" target="_blank">Isaac Dev</a>
                </div>
                <div class="version">
                    <b>Version: </b> 5.2.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
    
    
    
    
    </section>