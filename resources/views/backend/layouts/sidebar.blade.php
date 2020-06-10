<aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{action('backend\admin\BackendController@dasboard')}}"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>

                        <li class="list-divider"></li>
                    @role('Admin')
                        <li class="nav-small-cap"><span class="hide-menu">Admin</span></li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="far fa-user"></i>
                                <span class="hide-menu">User</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\UserController@index')}}" class="sidebar-link">
                                        <span class="hide-menu">Daftar User</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="far fa-user"></i>
                                <span class="hide-menu">Acount Confirmation</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\UserController@acountAcc')}}" class="sidebar-link">
                                        <span class="hide-menu">Daftar Acount</span>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="fab fa-product-hunt"></i>
                                <span class="hide-menu">Product</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\ProductController@index_product')}}" class="sidebar-link">
                                        <span class="hide-menu">Daftar Product</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\ProductController@add_view_product')}}" class="sidebar-link">
                                        <span class="hide-menu">Tambah Product</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\ProductController@gambar_product_view')}}" class="sidebar-link">
                                        <span class="hide-menu">Gambar Product</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="fas fa-clipboard-check"></i>
                                <span class="hide-menu">Checkout</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\CheckoutController@index_checkout')}}" class="sidebar-link">
                                        <span class="hide-menu">Daftar Order</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="fas fa-book"></i>
                                <span class="hide-menu">Catalog</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\CatalogController@index')}}" class="sidebar-link">
                                        <span class="hide-menu">Daftar Catalog</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\CatalogController@add_view')}}" class="sidebar-link">
                                        <span class="hide-menu">Tambah Catalog</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="far fa-bookmark"></i>
                                <span class="hide-menu">Category</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\CategoriController@index')}}" class="sidebar-link">
                                        <span class="hide-menu">Daftar Category</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\CategoriController@add_view')}}" class="sidebar-link">
                                        <span class="hide-menu">Tambah Category</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="fas fa-truck-loading"></i>
                                <span class="hide-menu">Gudang</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\GudangController@index')}}" class="sidebar-link">
                                        <span class="hide-menu">Daftar Gudang</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\GudangController@add_view')}}" class="sidebar-link">
                                        <span class="hide-menu">Tambah Gudang</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="far fa-list-alt"></i>
                                <span class="hide-menu">Log Admin</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\LogController@index')}}" class="sidebar-link">
                                        <span class="hide-menu">Daftar Log Admin</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <!-- PAYMENT -->
                        <!-- <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="far fa-money-bill-alt"></i>
                                <span class="hide-menu">Payment</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\PaymentController@index')}}" class="sidebar-link">
                                        <span class="hide-menu">Daftar Payment</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\PaymentController@add_view')}}" class="sidebar-link">
                                        <span class="hide-menu">Tambah Payment</span>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                    <!-- END PAYMENT -->
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="fab fa-blogger"></i>
                                <span class="hide-menu">Blog</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\BlogController@index')}}" class="sidebar-link">
                                        <span class="hide-menu">Daftar Blog</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{action('backend\admin\BlogController@add_view')}}" class="sidebar-link">
                                        <span class="hide-menu">Tambah Blog</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endrole

                    @role('Member')
                        <li class="nav-small-cap"><span class="hide-menu">Member</span></li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="far fa-list-alt"></i>
                                <span class="hide-menu">Log</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{url('/member/log')}}" class="sidebar-link">
                                        <span class="hide-menu">Daftar Order</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endrole

                    @role('Reseller')
                        <li class="nav-small-cap"><span class="hide-menu">Reseller</span></li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="far fa-list-alt"></i>
                                <span class="hide-menu">Log</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{url('/reseller/reportPenjualan')}}" class="sidebar-link">
                                        <span class="hide-menu">Report Penjualan</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{url('/reseller/listPenjualan')}}" class="sidebar-link">
                                        <span class="hide-menu">List Penjualan</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endrole

                    @role('Dropshiper')
                        <li class="nav-small-cap"><span class="hide-menu">Dropshiper</span></li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="fas fa-book"></i>
                                <span class="hide-menu">Katalog EAORON</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{url('/dropship/katalog')}}" class="sidebar-link">
                                        <span class="hide-menu">Katalog EAORON</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{url('/dropship/katalogAnda')}}" class="sidebar-link">
                                        <span class="hide-menu">Katalog Anda</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="fas fa-book"></i>
                                <span class="hide-menu">Log Order</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{url('dropship/logOrders')}}" class="sidebar-link">
                                        <span class="hide-menu">Log Order</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endrole
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->