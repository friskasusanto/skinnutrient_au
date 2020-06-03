
@include('frontend.layout.header')
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		
		<!-- Header -->
		@include('frontend.layout.navbar')
		<!-- //Header -->
		<!-- Start Search Popup -->
		@include('frontend.layout.search')
		<!-- End Search Popup -->
        <!-- Start Bradcaump area -->
        @include('frontend.bradcaump')
        <!-- End Bradcaump area -->
        <!-- Start Shop Page -->
        <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
        					<aside class="wedget__categories poroduct--cat">
        						<h3 class="wedget__title">Kategori Produk</h3>
        						<ul>
        						@foreach ($category as $c)
        							<li>
        							@if (count($c->productUser)!= 0)
        								<a href="{{action('frontend\FrontendController@shop_view_dropship', ['category' => $c->id])}}">{{$c->category_name}}<span>({{count($c->productUser)}})</span>
        								</a>
        							@else
        								<a href="">{{$c->category_name}}<span>({{count($c->productUser)}})</span>
        								</a>
        							@endif
        							</li>
        						@endforeach
        						</ul>
        					</aside><!-- 
        					<aside class="wedget__categories pro--range">
        						<h3 class="wedget__title">Filter berdasarkan harga</h3>
        						<div class="content-shopby">
        						    <div class="price_filter s-filter clear">
        						        <form action="#" method="GET">
        						            <div id="slider-range"></div>
        						            <div class="slider__range--output">
        						                <div class="price__output--wrap">
        						                    <div class="price--output">
        						                        <span>Harga :</span><input type="text" id="amount" readonly="">
        						                    </div>
        						                    <div class="price--filter">
        						                        <a href="#">Filter</a>
        						                    </div>
        						                </div>
        						            </div>
        						        </form>
        						    </div>
        						</div>
        					</aside>
        					<aside class="wedget__categories poroduct--tag">
        						<h3 class="wedget__title">Produk Tags</h3>
        						<ul>
        							<li><a href="#">Eaoron Hyaluronic Series</a></li>
        							<li><a href="#">Eaoron Hyaluronic Face Mask</a></li>
        							<li><a href="#">Eaoron Crystal White</a></li>
        							<li><a href="#">Eaoron Specific Care Series</a></li>
        							<li><a href="#">PPY</a></li>
        							<li><a href="#">Lainnya</a></li>
        						</ul>
        					</aside> -->
        					<aside class="wedget__categories sidebar--banner">
								<img src="{{asset('frontend/images/others/banner_lefts.jpg')}}" alt="banner images">
								<div class="text">
									<h2>promo member</h2>
									<h6>dropshipper<br> <strong>5%</strong>off</h6>
								</div>
        					</aside>
        				</div>
        			</div>
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
        				<div class="row">
        					<div class="col-lg-12">
								<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
									<div class="shop__list nav justify-content-center" role="tablist">
			                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
			                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a>
			                        </div>
			                        <!-- <p>Menampilkan 1–12 dari 35</p> -->
			                        <!-- <div class="orderby__wrapper">
			                        	<span>Sortir menurut</span>
			                        	<select class="shot__byselect" name="q">
			                        		<option value="relevansi">Relevansi</option>
			                        		<option value="terbaru">Terbaru</option>
			                        		<option value="terendah">Harga: Terendah</option>
			                        		<option value="tertinggi">Harga: Tertinggi</option>
			                        	</select>
			                        </div> -->
		                        </div>
        					</div>
        				</div>
        				<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
	        					<div class="row">
	        						<!-- Start Single Product -->
	        				@if(count($product)!=0)
	        					@foreach ($product as $p)
		        					<div class="product product__style--3 col-lg-3 col-md-4 col-sm-6 col-12">
			        					<div class="product__thumb">
			        					@if ($p->image == null || $p->image == 'dafault.jpg')
											<a class="first__img" href="{{ route('single_product', $p->product->slug) }}"><img src="{{url('product/default.jpg')}}" alt="product images"></a>
										@else 
	        								<a class="first__img" href="{{ route('single_product', $p->product->slug) }}"><img src="{{url('product/'.$p->product->image)}}" alt="product images"></a>
	        							@endif
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="{{ route('single_product', $p->product->slug) }}">{{$p->name}}</a></h4>
											<ul class="prize d-flex">
                                                <!--<li>$35.00</li>
                                                <li class="old_prize">$35.00</li>-->
                                                <li class="small_title">{{$p->category->category_name}}</li>
                                            </ul>
											<div class="action">
												<div class="actions_inner">
                                                <ul class="add_to_links">
                                                    <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                                                </ul>
												</div>
											</div>
											<div class="product__hover--content">
                                            <ul class="rating d-flex">
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
											</div>
										</div>
		        					</div>
		        				@endforeach
		        			@endif
		        					<!-- End Single Product -->
		        					<!-- End Single Product -->
	        					</div>
	        					<ul>
	        						{{$product->render()}}
	        					</ul>
	        					<!-- <ul class="wn__pagination">
	        						<li class="active"><a href="#">1</a></li>
	        						<li><a href="#">2</a></li>
	        						<li><a href="#">3</a></li>
	        						<li><a href="#">4</a></li>
	        						<li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
	        					</ul> -->
	        				</div>
	        				<div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
	        					<div class="list__view__wrapper">
	        						<!-- Start Single Product -->
	        					@foreach ($product as $p)
	        						<div class="list__view">
	        							<div class="thumb">
	        							@if ($p->image == null || $p->image == 'dafault.jpg')
	        								<a class="first__img" href="single-product.html"><img src="{{url('product/default.jpg')}}" alt="product images"></a>
	        							@else 
	        								<a class="first__img" href="single-product.html"><img src="{{url('product/'.$p->image)}}" alt="product images"></a>
	        							@endif
	        							</div>
	        							<div class="content">
	        								<h2><a href="{{ route('single_product', $p->product->slug) }}">{{$p->name}}</a></h2>
	        								<ul class="rating d-flex">
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
	        								<ul class="prize d-flex">
                                                <!--<li>$35.00</li>
                                                <li class="old_prize">$35.00</li>-->
                                                <li class="small_title">{{$p->category->category_name}}</li>
                                            </ul>
	        								<p>{{$p->description}}</p>
	        								<ul class="cart__action d-flex">
	        									<li class="cart"><a href="{{action('frontend\WishlistController@add_chart', $p->id)}}">Add to cart</a></li>
	        									<!-- <li class="wishlist"><a href="cart.html"></a></li>
	        									<li class="compare"><a href="cart.html"></a></li> -->
	        								</ul>

	        							</div>
	        						</div>
	        					@endforeach
	        						<!-- End Single Product -->
	        					</div>
	        				</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End Shop Page -->
		@include('frontend.layout.footer')