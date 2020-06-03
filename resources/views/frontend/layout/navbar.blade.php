<header id="wn__header" class="header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="{{ route('index') }}">
								<img src="{{asset('frontend/images/logo/logos.png')}}">
							</a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
							@role('Admin')
								<li class="drop with--one--item"><a href="{{ route('index') }}">Home </a></li>
								<li class="drop"><a href="#">Produk</a>
									<div class="megamenu dropdown">
										<ul class="item item01">
											<li><a href="{{ route('shop') }}">EAORON</a></li>
											<li><a href="{{ route('shop', ['category' => 5])}}">PPY</a></li>
										</ul>
									</div>
								</li>
							@endrole
							@role('Member')
								<li class="drop with--one--item"><a href="{{ route('index') }}">Home</a></li>
								<li class="drop"><a href="#">Produk</a>
									<div class="megamenu dropdown">
										<ul class="item item01">
											<li><a href="{{ route('shop') }}">EAORON</a></li>
											<li><a href="{{ route('shop', ['category' => 5])}}">PPY</a></li>
										</ul>
									</div>
								</li>
							@endrole
							@if (! Auth::check())
								<li class="drop with--one--item"><a href="{{ route('index') }}">Home</a></li>
								<li class="drop"><a href="#">Produk</a>
									<div class="megamenu dropdown">
										<ul class="item item01">
											<li><a href="{{ route('shop') }}">EAORON</a></li>
											<li><a href="{{ route('shop', ['category' => 5])}}">PPY</a></li>
										</ul>
									</div>
								</li>
							@endif
								
							@role('Dropshiper')
								<li class="drop"><a href="#">Produk</a>
									<div class="megamenu dropdown">
										<ul class="item item01">
											<li><a href="{{ url('/shop/dropship') }}">EAORON</a></li>
											<li><a href="{{action('frontend\FrontendController@shop_view_dropship', ['category' => 5])}}">PPY</a></li>
										</ul>
									</div>
								</li>
							@endrole
								<li><a href="{{ route('distributor') }}">Distributor</a></li>
								<li><a href="{{ route('about') }}">Tentang Kami</a></li>
								<li><a href="contact.php">Kontak</a></li>
								<!--<li class="drop"><a href="blog.php">Blog</a>
									<div class="megamenu dropdown">
										<ul class="item item01">
											<li><a href="blog.php">Blog Page</a></li>
											<li><a href="blog-details.php">Blog Details</a></li>
										</ul>
									</div>
								</li>-->
								<li class="drop"><a href="#">Lainnya</a>
									<div class="megamenu dropdown">
										<ul class="item item01">
											<li><a href="{{ url('/blog-view') }}">Blog</a></li>
											<!-- <li><a href="promo.php">Promo</a></li> -->
											<!--<li class="label2"><a href="portfolio.php">Portfolio</a>
												<ul>
													<li><a href="portfolio.php">Portfolio</a></li>
													<li><a href="portfolio-details.php">Portfolio Details</a></li>
												</ul>
											</li>
											<li><a href="my-account.php">My Account</a></li>
											<li><a href="cart.php">Cart Page</a></li>
											<li><a href="checkout.php">Checkout Page</a></li>
											<li><a href="error404.php">404 Page</a></li>-->
											<!-- <li><a href="faq.php">FAQ</a></li> -->
											<li><a href="kebijakan.php">Kebijakan & Privasi</a></li>
											<li><a href="{{url('/ratingcoba')}}">Rating</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li class="shop_search"><a class="search__active" href="#"></a></li>
						@if (Auth::check())
							<li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun">{{App\Wishlist::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->where('status', 0)->count('id')}}</span></a>
								<!-- Start Shopping Cart -->
								<div class="block-minicart minicart__active">
									<div class="minicart-content-wrapper">
										<div class="micart__close">
											<span>tutup</span>
										</div>
										<div class="items-total d-flex justify-content-between">
											<span>{{App\Wishlist::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->where('status', 0)->count('id')}} barang</span>
											<span>Subtotal</span>
										</div>
										<div class="total_amount text-right">
											Rp. {{App\Wishlist::where('user_id', Auth::user()->id)->where('status', 0)->sum('total_amount')}}
										</div>
									@if (count(App\Wishlist::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->where('status', 0)->get())!= 0)
										<div class="mini_action checkout">
											<a class="checkout__btn" href="{{action('frontend\CheckoutController@checkout', Auth::user()->id)}}">Pembayaran</a>
										</div>
										<div class="single__items">
											<div class="miniproduct">
											@foreach (App\Wishlist::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->where('status', 0)->get() as $wish)
												<div class="item01 d-flex">
													<div class="thumb">
														<a href="product-details.php"><img src="{{url('product/'.$wish->product->image)}}" alt="product images"></a>
													</div>
													<div class="content">
														<h6><a href="{{ route('single_product', $wish->product->slug) }}">{{$wish->product->name}}</a></h6>
														<span class="prize">Rp {{(int)$wish->product->price * (int)$wish->jumlah}}</span>
														<div class="product_prize d-flex justify-content-between">
															<span class="qun">Jumlah: {{$wish->jumlah}}</span>
															<!-- <ul class="d-flex justify-content-end">
																<li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
																<li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
															</ul> -->
														</div>
													</div>
												</div>
											@endforeach
											</div>
										</div>
										<div class="mini_action cart">
											<a class="cart__btn" href="{{action('frontend\WishlistController@chart_view', Auth::user()->name)}}">Keranjang Belanja</a>
										</div>
									@endif
									</div>
								</div>
								<!-- End Shopping Cart -->
							</li>
						@endif
							<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
										<div class="switcher-currency">
											<strong class="label switcher-label">
											@if (Auth::check())
												<span>Hallo, {{Auth::user()->name}}</span>
											@else
												<span>Akun</span>
											@endif
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
													@if (Auth::check())
														<span><a href="{{action('backend\admin\BackendController@dasboard')}}">Dasboard</a></span>
													@role('Member')
														<span><a href="{{ route('gabung_reseller') }}">Mau gabung jadi reseller?</a></span>
														<span><a href="{{ route('gabung_dropshiper') }}">Mau gabung jadi dropshiper?</a></span>
													@endrole
													@role('Dropshiper')
														<span><a href="{{ route('gabung_reseller') }}">Mau gabung jadi reseller?</a></span>
													@endrole
														<span>
															<a class="dropdown-item" href="{{ route('logout') }}"
											                   onclick="event.preventDefault();
											                                 document.getElementById('logout-form').submit();">Logout
											                </a>
											                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											                    @csrf
											                </form>
														</span>
													@else
														<span><a href="{{ route('login') }}">Masuk</a></span>
														<span><a href="{{ route('register') }}">Daftar</a></span>
													@endif
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
							@role('Admin')
								<li><a href="{{ route('index') }}">Home</a></li>
							@endrole
							@role('Member')
								<li><a href="{{ route('index') }}">Home</a></li>
							@endrole
							@if (! Auth::check())
								<li><a href="{{ route('index') }}">Home</a></li>
							@endif
								<li><a href="">Produk</a>
									<ul>
										<li><a href="{{ route('shop') }}">Eaoron</a></li>
										<li><a href="{{route('shop', ['category' => 5])}}">Ppy</a></li>
									</ul>
								</li>
								<li><a href="{{ route('distributor') }}">Distributor</a></li>
								<li><a href="{{ route('about') }}">Tentang Kami</a></li>
								<li><a href="contact.php">Kontak</a></li>
								<!-- <li><a href="blog.php">Blog</a>
									<ul>
										<li><a href="blog.php">Blog Page</a></li>
										<li><a href="blog-details.php">Blog Details</a></li>
									</ul>
								</li> -->
								<li><a href="#">Lainnya</a>
									<ul>
										<li><a href="{{ url('/blog-view') }}">Blog</a></li>
										<li><a href="">Kebijakan & Privasi</a>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->	
			</div>		
		</header>