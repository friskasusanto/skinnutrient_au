
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
        <!-- Start Slider area -->
        <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				<h2>Ingin <span>jadi </span></h2>
		            				<h2>Dropshipper <span>? </span></h2>
				                   	<a class="shopbtn" href="#">daftar sekarang</a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide -->
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--7 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				<h2>Ratusan <span>produk </span></h2>
		            				<h2>siap <span>Jual </span></h2>
				                   	<a class="shopbtn" href="#">daftar sekarang</a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide -->
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--10 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				<h2>Situs <span>dropshipper </span></h2>
		            				<h2>skin <span>Care </span></h2>
		            				<h2>di <span>Indonesia </span></h2>
				                   	<a class="shopbtn" href="#">daftar sekarang</a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide -->
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--11 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				<h2>Produk <span>kecantikan </span></h2>
		            				<h2>terbaik</h2>
		            				<h2>di <span>Australia </span></h2>
				                   	<a class="shopbtn" href="#">daftar sekarang</a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide -->
        </div>
        <!-- End Slider area -->
		<!-- Start BEst Seller Area -->
		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">Produk <span class="color--theme">Kami</span></h2>
							<!--<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>-->
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
					<!-- Start Single Product -->
					<div class="product product__style--3">
						
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" href="{{route('shop', ['category' => 3])}}"><img src="{{asset('frontend/images/books/1s.jpg')}}" alt="product image"></a>
								<a class="second__img animation1" href="{{route('shop', ['category' => 3])}}"><img src="{{asset('frontend/images/books/1s.jpg')}}" alt="product image"></a>
								<div class="hot__box">
									<span class="hot-label">EAORON</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="#">Hyaluronic Series</a></h4>
								<ul class="prize d-flex">
									<!--<li>$35.00</li>
									<li class="old_prize">$35.00</li>-->
									<li class="small_title">Eaoron Hyaluronic Series</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- Start Single Product -->
					<!-- Start Single Product -->
					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" href="{{route('shop', ['category' => 1])}}"><img src="{{asset('frontend/images/books/2s.jpg')}}" alt="product image"></a>
								<a class="second__img animation1" href="{{route('shop', ['category' => 1])}}"><img src="{{asset('frontend/images/books/2s.jpg')}}" alt="product image"></a>
								<div class="hot__box color--2">
									<span class="hot-label">EAORON</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="#">Crystal White Series</a></h4>
								<ul class="prize d-flex">
									<!--<li>$35.00</li>
									<li class="old_prize">$35.00</li>-->
									<li class="small_title">Eaoron Crystal White</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- Start Single Product -->
					<!-- Start Single Product -->
					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" href="{{route('shop', ['category' => 4])}}"><img src="{{asset('frontend/images/books/3s.jpg')}}" alt="product image"></a>
								<a class="second__img animation1" href="{{route('shop', ['category' => 4])}}"><img src="{{asset('frontend/images/books/3s.jpg')}}" alt="product image"></a>
								<div class="hot__box color--2">
									<span class="hot-label">EAORON</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="#">Specific Care Series</a></h4>
								<ul class="prize d-flex">
									<!--<li>$35.00</li>
									<li class="old_prize">$35.00</li>-->
									<li class="small_title">Eaoron Specific Care Series</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- Start Single Product -->
					<!-- Start Single Product -->
					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" href="{{route('shop', ['category' => 2])}}"><img src="{{asset('frontend/images/books/4s.jpg')}}" alt="product image"></a>
								<a class="second__img animation1" href="{{route('shop', ['category' => 2])}}"><img src="{{asset('frontend/images/books/4s.jpg')}}" alt="product image"></a>
								<div class="hot__box color--2">
									<span class="hot-label">EAORON</span>
								</div>
							</div>
							<div class="product__content content--center content--center">
								<h4><a href="#">Face Mask Series</a></h4>
								<ul class="prize d-flex">
									<!--<li>$50.00</li>
									<li class="old_prize">$35.00</li>-->
									<li class="small_title">Eaoron Hyaluronic Face Mask</li>
								</ul>
							</div>
						</div>
						<!-- Start Single Product -->
					</div>
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>
		<!-- Start BEst Seller Area -->
		<!-- Start NEwsletter Area -->
		<section class="wn__newsletter__area bg-image--2">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
						<div class="section__title text-center">
							<h2>Tetaplah Bersama Kami</h2>
						</div>
						<div class="newsletter__block text-center">
							<p>Berlangganan newsletter kami sekarang dan dapatkan informasi terbaru dengan koleksi baru, promo terbaru dan penawaran eksklusif.</p>
							<form novalidate="novalidate" method="POST" action= "{{action('frontend\FrontendController@letter')}}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="newsletter__box">
									<input type="email" placeholder="Email Anda" name="letter">
									<button type="submit">Berlangganan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End NEwsletter Area -->
		
	@if(count($blog) != 0)
		<!-- Start Recent Post Area -->
		<section class="wn__recent__post bg--gray ptb--80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">Blog <span class="color--theme">Kami</span></h2>
							<p>Update berita terbaru dari kami</p>
						</div>
					</div>
				</div>
				<div class="row mt--50">
				@foreach ($blog as $b)
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content text-justify">
								<h3><a href="{{url('/blog-detail', $b->id)}}">{{$b->judul}}</a></h3>
								<p>{!!substr($b->text,0,100)!!} ...</p>

								<div class="post__time">
									<span class="day">{{date('d F Y', strtotime($b->tgl_input))}}</span>
									<div class="post-meta">
										<ul>
											<!-- <li><a href="#"><i class="bi bi-love"></i>72</a></li> -->
											<li><a href="#"><i class="bi bi-chat-bubble"></i>{{count($b->comment)}}</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				</div>
			</div>
		</section>
		<!-- End Recent Post Area -->
	@endif

		<!-- Start NEwsletter Area -->
		<section class="wn__newsletter__area bg-image--12">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-12 ptb--150">
						<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/wW_6ggYWvso" data-target="#myModal">
							Putar
  							</button>
						<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
  
		
		<div class="modal-body">
  
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>        
		  <!-- 16:9 aspect ratio -->
  <div class="embed-responsive embed-responsive-16by9">
	<iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
  </div>
		  
		  
		</div>
  
	  </div>
	</div>
  </div> 
					</div>
				</div>
			</div>
		</section>
		<!-- End NEwsletter Area -->
		@include('frontend.layout.footer')