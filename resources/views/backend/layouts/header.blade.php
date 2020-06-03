<header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.html">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="{{asset('backend/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="{{asset('backend/assets/images/logo-icon.png')}}" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="{{asset('backend/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="{{asset('backend/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        @if (Auth::user()->deposit == null)
                            <span class="ml-2 d-none d-lg-inline-block">
                                <span class="text-dark">Deposit : Rp. 0</span> 
                            </span>
                        @else
                            <span class="ml-2 d-none d-lg-inline-block">
                                <span class="text-dark">Deposit : Rp. {{Auth::user()->deposit}}</span> 
                            </span>
                        @endif
                    </ul>
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                            type="search" placeholder="Search" aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('backend/assets/images/users/profile-pic.jpg')}}" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">{{Auth::user()->name}}</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                            @role('Admin')
                                <a class="dropdown-item" href="{{ url('/') }}">
                                    <i class="fas fa-home"></i>
                                    HOME EAORON</a>
                            @endrole
                            @role('Member')
                                <a class="dropdown-item" href="{{ url('/') }}">
                                    <i class="fas fa-home"></i>
                                    HOME EAORON</a>
                            @endrole
                            @role('Reseller')
                                <a class="dropdown-item" href="{{ url('/') }}">
                                    <i class="fas fa-home"></i>
                                    HOME EAORON</a>
                                <a class="dropdown-item" href="{{url('/reseller/ketentuan')}}">
                                    <i class="fas fa-book"></i>
                                    Ketentuan Reseller</a>
                            @endrole
                            @role('Dropshiper')
                                <a class="dropdown-item" href="{{ url('/shop/dropship') }}">
                                    <i class="fas fa-home"></i>
                                    HOME EAORON</a>
                                <a class="dropdown-item" href="{{url('/dropship/ketentuan')}}">
                                    <i class="fas fa-book"></i>
                                    Ketentuan Dropshiper</a>
                            @endrole
                                <a class="dropdown-item" href="{{action('backend\member\MemberController@changePass_view', Auth::user()->id)}}"><i class="fas fa-key"></i>
                                    Ganti Password</a>
                                <a class="dropdown-item" href="{{action('backend\member\MemberController@biodata')}}">
                                    <i class="fas fa-user"></i>
                                    Data Diri</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                  Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->