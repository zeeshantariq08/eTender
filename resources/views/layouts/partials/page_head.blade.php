<div id="page-wrapper">
    <div class="preloader themed-background">
        <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
        <div class="inner">
            <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
            <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
        </div>
    </div>
    <div id="page-container" class="header-fixed-top sidebar-partial sidebar-visible-lg">
        <!-- Alternative Sidebar -->
        <div id="sidebar-alt">
        <!-- Wrapper for scrolling functionality -->
        <div id="sidebar-alt-scroll">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Sidebar Section -->
                <a href="index.html" class="sidebar-title">
                    <i class="gi gi-cogwheel pull-right"></i> <strong>Header</strong>
                </a>
                <div class="sidebar-section">Section content..</div>
                <!-- END Sidebar Section -->
            </div>
            <!-- END Sidebar Content -->
        </div>
        <!-- END Wrapper for scrolling functionality -->
        </div>
        <!-- END Alternative Sidebar -->

        <!-- Main Sidebar -->
        <div id="sidebar">
        <!-- Wrapper for scrolling functionality -->
        <div id="sidebar-scroll">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Brand -->
                {{-- <a href="" class="sidebar-brand">
                    <i class="fa fa-gavel"></i><span class="sidebar-nav-mini-hide"><strong>eTender</strong></span>
                </a> --}}
                 <a href="">
                    <img src="{{ asset("images/white-logo.png") }}" width="70%" alt="avatar" align="text-center">
                </a>
                <!-- END Brand -->

                <!-- User Info -->
                <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                    <div class="sidebar-user-avatar">
                        <a href="">
                            <img src="{{ asset("images/avatar.png") }}" alt="avatar">
                        </a>
                    </div>
                    <div class="sidebar-user-name">{{ auth()->user()->name }}</div>

                </div>
                <!-- END User Info -->


                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        <span class="sidebar-header-title">Dashboard</span>
                    </li>
                    @if (request()->segment(1) == 'UserManagement')
                        <li class="sidebar-header">
                            <span class="sidebar-header-title">User Management</span>
                        </li>
                        <li>
                            <a href="{{route('users.index')}}"><i class="fa fa-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Users</span></a>
                        </li>
                        <li>
                            <a href="{{route('usergroups.index')}}"><i class="fa fa-users sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Usergroups</span></a>
                        </li>
                        <li>
                            <a href="{{route('permissions.index')}}"><i class="fa fa-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Permissions</span></a>
                        </li>
                        @else
                        <li>
                            <a href="{{route('clients.index')}}"><i class="fa fa-product-hunt sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Client Info</span></a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('tenders.index') }}"><i class="fa fa-gavel sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Tenders</span></a>
                    </li>
                </ul>
                <!-- END Sidebar Navigation -->
            </div>
            <!-- END Sidebar Content -->
        </div>
        <!-- END Wrapper for scrolling functionality -->
        </div>
        <!-- END Main Sidebar -->

        <!-- Main Container -->
        <div id="main-container">
        <header class="navbar navbar-default navbar-fixed-top">
            <!-- Left Header Navigation -->
            <ul class="nav navbar-nav-custom">
                <!-- Main Sidebar Toggle Button -->
                <li>
                    <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                        <i class="fa fa-bars fa-fw"></i>

                    </a>
                </li>
                <!-- END Main Sidebar Toggle Button -->
                {{-- Top Menu --}}
                <li>
                    <a href="{{ route('usermanagement.index') }}">
                        User Management
                    </a>
                </li>

                {{-- End Top Menu --}}
            </ul>
            <!-- END Left Header Navigation -->

            <!-- Right Header Navigation -->
            <ul class="nav navbar-nav-custom pull-right mt-4">
                <!-- Alternative Sidebar Toggle Button -->
                {{-- <li>
                    <a href="" >
                        <i class="fa fa-shopping-cart"></i>
                        <span class="label label-primary label-indicator animation-floating">4</span>
                    </a>
                </li> --}}
<style>
    .nav.navbar-nav-custom > li > a .label-indicator {
    top: 4px;
    bottom: 28px;
    right: 2px;
}
</style>
                {{-- <li >
                    <a href="javascript:void(0)" class=" dropdown-toggle enable-tooltip pt-4" data-toggle="dropdown" title="" data-original-title="Options" aria-expanded="false">
                        <i class="fa fa-bell-o" style="font-size: 18px;"></i>
                        <span class="label label-danger label-indicator mb-0">42</span>
                    </a>

                    <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                        <li>
                        <a href="javascript:void(0)"><i class="gi gi-cloud pull-right"></i>Simple Action</a>
                        <a href="javascript:void(0)"><i class="gi gi-airplane pull-right"></i>Another Action</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                        <a href="javascript:void(0)"><i class="fa fa-wrench fa-fw pull-right"></i>Separated Action</a>
                        </li>
                    </ul>
               </li> --}}

                <!-- END Alternative Sidebar Toggle Button -->

                {{-- <li> 
                    <img src="{{ asset("images/3.png") }}" width="90%" alt="avatar">
                </li> --}}

                <!-- User Dropdown -->
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset("images/avatar-orange.png") }}" alt="avatar"> <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                        <li class="dropdown-header text-center">{{ auth()->user()->name }}</li>
                        <li>
                            <a href="{{ route('users.show', auth()->user()->slug) }}">
                                <i class="fa fa-user fa-fw pull-right"></i>
                                Profile
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('password.change') }}">
                                <i class="fa fa-asterisk fa-fw pull-right"></i>
                                Change Password
                            </a>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off fa-fw pull-right"></i>
                                Logout
                            </>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form></a>
                        </li>
                    </ul>
                </li>

                <li style="margin-left: 10px;"> </li>
               
                <!-- END User Dropdown -->
            </ul>
            <!-- END Right Header Navigation -->
        </header>
        <!-- END Header -->

