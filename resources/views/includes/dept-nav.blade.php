<div class="header-bg" style="background-color: teal !important;"> 
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid"> 
                <div class="logo">
                    <span class="text-white">IQAC - Department Dashbaord</span>
                </div>  
                <div class="menu-extras topbar-custom"> 
                    <ul class="navbar-right list-inline float-right mb-0">  
                            
                        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/flags/us_flag.jpg" class="mr-2" height="12" alt=""> English <span class="mdi mdi-chevron-down"></span>
                            </a> 
                        </li>

                        <!-- full screen -->
                        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <a class="nav-link" href="#" id="btn-fullscreen">
                                <i class="ion ion-md-qr-scanner noti-icon"></i>
                            </a>
                        </li>


                        <li class="dropdown notification-list list-inline-item">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">  
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <i class="ft-power"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                </div>
                            </div>
                        </li> 
                        <li class="menu-item list-inline-item"> 
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a> 
                        </li>

                    </ul>
                </div> 
                <div class="clearfix"></div> 
            </div>  
        </div> 
        <!-- MENU Start -->
        <div class="navbar-custom">
            <div class="content-fluid">
                <div id="navigation"> 
                    <ul class="navigation-menu">

                        <li class="has-submenu">
                            <a href="/dept/dashboard"><i class="ion ion-md-speedometer"></i>Dashboard</a>
                        </li>  
                        <li class="has-submenu">
                            <a href="#"><i class="ion ion-md-grid"></i>Manage Staff Activity <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                            <ul class="submenu"> 
                                <li class="has-submenu">
                                    <a href="#">Seminar Organised</a>
                                    <ul class="submenu">
                                        <li><a href="/dept/deptSeminarOrganised">View Seminar Organised</a></li>
                                        <li><a href="/dept/deptSeminarOrganised/create">Add Seminar Organised</a></li> 
                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href="#">FDP Meeting</a>
                                    <ul class="submenu">
                                        <li><a href="/dept/deptFdpMeeting">View Meetings</a></li>
                                        <li><a href="/dept/deptFdpMeeting/create">Add Meeting</a></li> 
                                    </ul>
                                </li>       
                                <li class="has-submenu">
                                    <a href="#">Major Programmes</a>
                                    <ul class="submenu">
                                        <li><a href="/dept/deptMajorProgram">View Major Programmes</a></li>
                                        <li><a href="/dept/deptMajorProgram/create">Add Major Programmes</a></li> 
                                    </ul>
                                </li> 
                            </ul>   
                        </li>   
                        <li class="has-submenu">
                            <a href="/dept/generate-report"><i class="ti-rss-alt"></i>Generate Report</a>
                        </li>  
                    </ul> 
                </div> 
            </div>  
        </div>  
    </header>  
</div>