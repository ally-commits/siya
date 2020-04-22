<div id="wrapper"> 
    <div class="topbar"> 
        <div class="topbar-left">
            <a href="#" class="logo">
                <span>
                    <span class="text-white" style="font-weight:100;text-transform: capitalize;font-size:14px;">
                    Admin Dashboard</span>
                </span>
                <i class="mdi mdi-emoticon-cool"> 
                </i>
            </a>
        </div>

        <nav class="navbar-custom">
            <ul class="navbar-right list-inline float-right mb-0">
                 
                <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                    <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                        <i class="mdi mdi-fullscreen noti-icon"></i>
                    </a>
                </li>
                <li class="dropdown notification-list list-inline-item d-none d-md-inline-block" data-toggle="tooltip" data-original-title="Logout">
                    <a class="nav-link waves-effect" href="#" id="btn-fullscreen" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-power noti-icon"></i>
                    </a>

                    <form id="logout-form" action="{{ route('dept.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li> 
            </ul> 
        </nav> 
    </div>
    <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll"> 
            <div id="sidebar-menu"> 
                <ul class="metismenu" id="side-menu"> 
                    <li>
                        <a href="/admin/dashboard" class="waves-effect">
                            <i class="ti-home"></i><span> Dashboard </span>
                        </a>
                    </li>  
                    <li>
                        <a href="/admin/activity" class="waves-effect">
                            <i class="ti-flickr-alt"></i><span> Add Activity </span>
                        </a>
                    </li>  

                    <li class="menu-title">Staff</li>
                    <li>
                        <a href="/admin/staffActivity/staff/1" class="waves-effect">
                            <i class="ti-ruler-alt-2"></i><span>Manage Staff Activity</span>
                        </a>
                    </li> 
                    <li>
                        <a href="/admin/generate-report" class="waves-effect">
                            <i class="ti-layers-alt"></i><span>Generate Report</span>
                        </a>
                    </li> 
                    <li class="">
                        <a href="javascript:void(0);" class="waves-effect" aria-expanded="false"><i class="ti-package"></i><span> Manage Staff <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu mm-collapse" style="height: 0px;">
                            <li>
                                <a href="/admin/add-staff" class="waves-effect">
                                    <span> Add Staff </span>
                                </a>
                            </li> 
                            <li>
                                <a href="/admin/view-staff" class="waves-effect">
                                    <span> View Staffs </span>
                                </a>
                            </li>  
                        </ul>
                    </li>   
                    <li class="menu-title">Department</li>
                    <li class="">
                        <a href="javascript:void(0);" class="waves-effect" aria-expanded="false"><i class="ti-package"></i><span> Manage Department <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu mm-collapse" style="height: 0px;">
                            <li>
                                <a href="/admin/add-dept" class="waves-effect">
                                    <span> Add Department</span>
                                </a>
                            </li> 
                            <li>
                                <a href="/admin/view-dept" class="waves-effect">
                                    <span> View Department</span>
                                </a>
                            </li>  
                        </ul>
                    </li>   
                </ul>
            </div> 
        <div class="clearfix"></div>
    </div> 
</div>