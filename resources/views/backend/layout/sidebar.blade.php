<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">EAORON</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{action('backend\admin\BackendController@dasboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

@role('Dropshiper')
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Dropshiper
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#katalog" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Katalog EAORON</span>
        </a>
        <div id="katalog" class="collapse" aria-labelledby="order" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Katalog:</h6>
            <a class="collapse-item" href="{{url('/dropship/katalog')}}">Katalog EAORON</a>
            <a class="collapse-item" href="{{url('/dropship/katalogAnda')}}">Katalog Anda</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#log" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Log Order</span>
        </a>
        <div id="log" class="collapse" aria-labelledby="order" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Log:</h6>
            <a class="collapse-item" href="{{url('/dropship/logOrder', Auth::user()->id)}}">Log Order</a>
          </div>
        </div>
      </li>
@endrole

@role('Admin')
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Admin
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>User</span>
        </a>
        <div id="user" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User:</h6>
            <a class="collapse-item {{ isset($active) && $active == 'list_user' ? 'active' : '' }}" href="{{action('backend\admin\UserController@index')}}">Daftar User</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Product</span>
        </a>
        <div id="product" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product:</h6>
            <a class="collapse-item {{ isset($active) && $active == 'list_product' ? 'active' : '' }}" href="{{action('backend\admin\ProductController@index_product')}}">Daftar Product</a>
            <a class="collapse-item {{ isset($active) && $active == 'tambah_product' ? 'active' : '' }}" href="{{action('backend\admin\ProductController@add_view_product')}}">Tambah Product</a>
            <a class="collapse-item {{ isset($active) && $active == 'gambar_product' ? 'active' : '' }}" href="{{action('backend\admin\ProductController@gambar_product_view')}}">Gambar Product</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#checkout" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Checkout</span>
        </a>
        <div id="checkout" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Checkout:</h6>
            <a class="collapse-item {{ isset($active) && $active == 'list_product' ? 'active' : '' }}" href="{{action('backend\admin\CheckoutController@index_checkout')}}">Daftar Order</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#catalog" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Catalog</span>
        </a>
        <div id="catalog" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Catalog:</h6>
            <a class="collapse-item {{ isset($active) && $active == 'list_product' ? 'active' : '' }}" href="{{action('backend\admin\CatalogController@index')}}">Daftar Catalog</a>
            <a class="collapse-item {{ isset($active) && $active == 'list_product' ? 'active' : '' }}" href="{{action('backend\admin\CatalogController@add_view')}}">Tambah Catalog</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Category</span>
        </a>
        <div id="category" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category:</h6>
            <a class="collapse-item {{ isset($active) && $active == 'list_product' ? 'active' : '' }}" href="{{action('backend\admin\CategoriController@index')}}">Daftar Category</a>
            <a class="collapse-item {{ isset($active) && $active == 'list_product' ? 'active' : '' }}" href="{{action('backend\admin\CategoriController@add_view')}}">Tambah Category</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#gudang" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Gudang</span>
        </a>
        <div id="gudang" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gudang:</h6>
            <a class="collapse-item {{ isset($active) && $active == 'list_product' ? 'active' : '' }}" href="{{action('backend\admin\GudangController@index')}}">Daftar Gudang</a>
            <a class="collapse-item {{ isset($active) && $active == 'list_product' ? 'active' : '' }}" href="{{action('backend\admin\GudangController@add_view')}}">Tambah Gudang</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#log" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Log</span>
        </a>
        <div id="log" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Log:</h6>
            <a class="collapse-item {{ isset($active) && $active == 'list_product' ? 'active' : '' }}" href="{{action('backend\admin\LogController@index')}}">Daftar Log</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#payment" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Payment</span>
        </a>
        <div id="payment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Payment:</h6>
            <a class="collapse-item {{ isset($active) && $active == 'list_product' ? 'active' : '' }}" href="{{action('backend\admin\PaymentController@index')}}">Daftar Payment</a>
            <a class="collapse-item {{ isset($active) && $active == 'list_product' ? 'active' : '' }}" href="{{action('backend\admin\PaymentController@add_view')}}">Tambah Payment</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blog" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Blog</span>
        </a>
        <div id="blog" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Blog:</h6>
            <a class="collapse-item {{ isset($active) && $active == 'list_product' ? 'active' : '' }}" href="{{action('backend\admin\BlogController@index')}}">Daftar Blog</a>
            <a class="collapse-item {{ isset($active) && $active == 'list_product' ? 'active' : '' }}" href="{{action('backend\admin\BlogController@add_view')}}">Tambah Blog</a>
          </div>
        </div>
      </li>
@endrole

@role('Member')
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Member
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#logmember" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Log</span>
        </a>
        <div id="logmember" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">List Barang Dibeli:</h6>
            <a class="collapse-item" href="{{url('/member/log')}}">List Barang Dibeli</a>
          </div>
        </div>
      </li>
@endrole

@role('Reseller')
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Reseller
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#logreseller" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Log</span>
        </a>
        <div id="logreseller" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Log:</h6>
            <a class="collapse-item" href="{{url('/reseller/reportPenjualan')}}">Report Penjualan</a>
            <a class="collapse-item" href="{{url('/reseller/listPenjualan')}}">List Penjualan</a>
          </div>
        </div>
      </li>
@endrole

    </ul>
    <!-- End of Sidebar -->