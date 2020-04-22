<div class="header-bg"> 
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid"> 
                <div class="logo">
                    <span class="text-white">IQAC - Staff Dashboard</span>
                </div>  
                <div class="menu-extras topbar-custom"> 
                    <ul class="navbar-right list-inline float-right mb-0"> 
                        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <form role="search" class="app-search">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" placeholder="Search..">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </li>
 
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

                        <!-- notification -->

                        <li class="dropdown notification-list list-inline-item">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown "> 
                                    <a class="dropdown-item" href="/staff/profile"><i class="ti-user"></i> Profile</a>
                                    <a class="dropdown-item" href="/staff/edit-profile"><i class="ti-pencil"></i> Edit Profile</a>
                                    <a class="dropdown-item" href="/staff/view-qualification"><i class="ti-medall"></i> View Qualification</a>
                                    <a class="dropdown-item" href="/staff/change-password"><i class="ti-lock"></i> Change Password</a> 
                                    <div class="dropdown-divider"></div>
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
                            <a href="/dashboard"><i class="ion ion-md-speedometer"></i>Dashboard</a>
                        </li>  
                        <li class="has-submenu last-elements active">
                            <a href="#"><i class="ion ion-md-copy"></i>Your Profile <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                            <ul class="submenu megamenu">
                                <li class="active">
                                    <ul> 
                                        <li><a href="/staff/profile">View Profile</a></li>
                                        <li><a href="/staff/edit-profile">Edit Profile</a></li>
                                        <li><a href="/staff/view-qualification">View Qualification</a></li>
                                        <li><a href="/staff/change-password">Change Password</a></li>
                                    </ul>
                                </li> 
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#"><i class="ion ion-md-grid"></i>Manage Staff Activity <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                            <ul class="submenu">
                                <li class="has-submenu">
                                    <a href="#">Association Program</a>
                                    <ul class="submenu">
                                        <li><a href="/staff/association">View Programs</a></li>
                                        <li><a href="/staff/association/create">Add Program</a></li> 
                                    </ul>
                                </li>  
                                <li class="has-submenu">
                                    <a href="#">Seminar Organised</a>
                                    <ul class="submenu">
                                        <li><a href="/staff/seminarOrganised">View Seminar Organised</a></li>
                                        <li><a href="/staff/seminarOrganised/create">Add Seminar Organised</a></li> 
                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href="#">FDP Meeting</a>
                                    <ul class="submenu">
                                        <li><a href="/staff/fdpMeeting">View Meetings</a></li>
                                        <li><a href="/staff/fdpMeeting/create">Add Meeting</a></li> 
                                    </ul>
                                </li> 
                                <li class="has-submenu">
                                    <a href="#">Papers Presented</a>
                                    <ul class="submenu">
                                        <li><a href="/staff/papers">View Papers</a></li>
                                        <li><a href="/staff/papers/create">Add Paper</a></li> 
                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href="#">Publications</a>
                                    <ul class="submenu">
                                        <li><a href="/staff/publication">View Publications</a></li>
                                        <li><a href="/staff/publication/create">Add Publications</a></li> 
                                    </ul>
                                </li>  
                                <li class="has-submenu">
                                    <a href="#">Achivements</a>
                                    <ul class="submenu">
                                        <li><a href="/staff/achivements">View Achivements</a></li>
                                        <li><a href="/staff/achivements/create">Add Achivement</a></li> 
                                    </ul>
                                </li> 
                                <li class="has-submenu">
                                    <a href="#">Seminar Attended</a>
                                    <ul class="submenu">
                                        <li><a href="/staff/seminarAttended">View Seminar Attended</a></li>
                                        <li><a href="/staff/seminarAttended/create">Add Seminar Attended</a></li> 
                                    </ul>
                                </li>   
                                <li class="has-submenu">
                                    <a href="#">Guest Visted</a>
                                    <ul class="submenu">
                                        <li><a href="/staff/guestVisited">View Guest Visited</a></li>
                                        <li><a href="/staff/guestVisited/create">Add Guest Visited</a></li> 
                                    </ul>
                                </li>  
                                <li class="has-submenu">
                                    <a href="#">Guest Lecture MDP</a>
                                    <ul class="submenu">
                                        <li><a href="/staff/guestLecture">View Guest Lecture</a></li>
                                        <li><a href="/staff/guestLecture/create">Add Guest Lecture</a></li> 
                                    </ul>
                                </li> 
                                <li class="has-submenu">
                                    <a href="#">Major Programmes</a>
                                    <ul class="submenu">
                                        <li><a href="/staff/majorProgram">View Major Programmes</a></li>
                                        <li><a href="/staff/majorProgram/create">Add Major Programmes</a></li> 
                                    </ul>
                                </li> 
                            </ul>   
                        </li>   
                        <li class="has-submenu">
                            <a href="/staff/generate-report"><i class="ti-rss-alt"></i>Generate Report</a>
                        </li>  
                    </ul> 
                </div> 
            </div>  
        </div>  
    </header>  
</div>