<!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1" style="margin-top: 8%">
              @if (Auth::user()->deposit == null)
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">Deposit : 0</span>
            @else
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">Deposit : {{Auth::user()->deposit}}</span>
            @endif
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              @role('Admin')
                <a class="dropdown-item"  href="{{ url('/') }}">
                  <i class="fa fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
                  HOME EAORON
                </a>
              @endrole
              @role('Member')
                <a class="dropdown-item"  href="{{ url('/') }}">
                  <i class="fa fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
                  HOME EAORON
                </a>
              @endrole
              @role ('Dropshiper')
                <a class="dropdown-item"  href="{{ url('/shop/dropship') }}">
                  <i class="fa fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
                  HOME EAORON
                </a>
                <a class="dropdown-item"  href="{{url('/dropship/ketentuan')}}">
                  <i class="fa fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ketentuan Dropshiper
                </a>
              @endrole
              @role ('Reseller')
                <a class="dropdown-item"  href="{{ url('/') }}">
                  <i class="fa fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
                  HOME EAORON
                </a>
                <a class="dropdown-item"  href="{{url('/reseller/ketentuan')}}">
                  <i class="fa fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ketentuan Reseller
                </a>
              @endrole

                <a class="dropdown-item"  href="{{action('backend\member\MemberController@changePass_view', Auth::user()->id)}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ganti Password
                </a>
                <a class="dropdown-item"  href="{{action('backend\member\MemberController@biodata')}}">
                  <i class="fa fa-address-card fa-sm fa-fw mr-2 text-gray-400"></i>
                  Data Diri
                </a>
              
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->