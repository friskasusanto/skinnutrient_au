
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
        <div class="ht__bradcaump__area bg-image--6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Detail Produk</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.php">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Detail Produk</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start main Content -->
        <div class="maincontent bg--white pt--80 pb--55">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-9 col-12">
        				<div class="wn__single__product">
        					<div class="row">
        						<div class="col-lg-6 col-12">
        							<div class="wn__fotorama__wrapper">
	        							<div class="fotorama wn__fotorama__action" data-nav="thumbs">
	        								@if ($product->image == null || $product->image == 'default.jpg')
		        							  	<a href="{{url('product/default.jpg')}}"><img src="{{url('product/default.jpg')}}" alt=""></a>
		        							@else
		        								<a href="{{url('product/'.$product->image)}}"><img src="{{url('product/'.$product->image)}}" alt=""></a>
		        								@if (count($product_image) != 0) 
		        									@foreach ($product_image as $i)
		        										<a href="{{url('product/'.$i->image)}}"><img src="{{url('product/'.$i->image)}}" alt=""></a>
		        									@endforeach
		        								@endif
		        							@endif
	        							</div>
        							</div>
        						</div>
        						<div class="col-lg-6 col-12">
        							<div class="product__info__main">
        								<h1>{{$product->name}}</h1>
        								<div class="product-reviews-summary d-flex">
        									<!-- <ul class="rating-summary d-flex">
    											<li class="on"><i class="zmdi zmdi-star-outline"></i></li>
    											<li><i class="zmdi zmdi-star-outline"></i></li>
    											<li><i class="zmdi zmdi-star-outline"></i></li>
    											<li class="off"><i class="zmdi zmdi-star-outline"></i></li>
    											<li class="off"><i class="zmdi zmdi-star-outline"></i></li>
        									</ul> -->
        							@if ($countRating != 0)
        								@if ($rating >= 0 && $rating <= 2)
        									<ul class="rating d-flex">
                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        @elseif ($rating >= 2 && $rating <= 4)
                                        	<ul class="rating d-flex">
                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        @elseif ($rating >= 4 && $rating <= 6)
                                        	<ul class="rating d-flex">
                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        @elseif ($rating >= 6 && $rating <= 8)
                                        	<ul class="rating d-flex">
                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        @elseif ($rating >= 8 && $rating <= 10)
                                        	<ul class="rating d-flex">
                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                       	@endif
                                    @else
                                    	<ul class="rating d-flex">
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                        </ul>
                                    @endif
        								</div>
        								<div class="price-box">
        									<span>Rp {{number_format($product->price)}}</span>
        								</div>
        								<div class="box-tocart d-flex">
        									<span>Qty</span>
        									<form class="form form-validate floating-label" novalidate="novalidate" method="POST" action= "{{action('frontend\WishlistController@add_chart', $product->id)}}" enctype="multipart/form-data">
        										{{ csrf_field() }}
        										<input id="qty" class="input-text qty" name="jumlah" min="1" value="1" title="Qty" type="number" style="width: 100%">
	        									<div class="addtocart__actions">
	        										<center><button class="tocart" type="submit" title="Add to Cart">Add to Cart</button></center>
	        									</div>
	        								</form>
        								</div>
										<div class="product_meta">
											<span class="posted_in">Categories: 
												<a href="#">{{$product->category->category_name}}</a>
											</span>
										</div>
										<div class="product-share">
											<ul>
												<li class="categories-title">Share :</li>
												<li>
													<a href="#">
														<i class="icon-social-twitter icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-tumblr icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-facebook icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-linkedin icons"></i>
													</a>
												</li>
											</ul>
										</div>
        							</div>
        						</div>
        					</div>
        				</div>
        				<div class="product__info__detailed">
							<div class="pro_details_nav nav justify-content-start" role="tablist">
	                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Details</a>
	                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab">Reviews</a>
	                        </div>
	                        <div class="tab__container">
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
									<div class="description__attribute">
										<p>{{$product->description}}</p>
									</div>
	                        	</div>
	                        	<!-- End Single Tab Content -->
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
									<div class="review-fieldset">
										<h2>Review:</h2>
										<h3>{{$product->name}}</h3>
										<div class="review-field-ratings">
											<div class="product-review-table">
												<div class="container">
													<span>Quality</span>
													<form novalidate="novalidate" method="POST" action= "{{url('/rating_product', $product->id)}}" enctype="multipart/form-data">
														{{ csrf_field() }}
														<div class="container">
															<div class="row">
																<div class="rating">
																<input type="radio" id="star10" name="star" value="10" /><label for="star10" title="Rocks!">5 stars</label>
																<input type="radio" id="star9" name="star" value="9" /><label for="star9" title="Rocks!">4 stars</label>
																<input type="radio" id="star8" name="star" value="8" /><label for="star8" title="Pretty good">3 stars</label>
																<input type="radio" id="star7" name="star" value="7" /><label for="star7" title="Pretty good">2 stars</label>
																<input type="radio" id="star6" name="star" value="6" /><label for="star6" title="Meh">1 star</label>
																<input type="radio" id="star5" name="star" value="5" /><label for="star5" title="Meh">5 stars</label>
																<input type="radio" id="star4" name="star" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
																<input type="radio" id="star3" name="star" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
																<input type="radio" id="star2" name="star" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
																<input type="radio" id="star1" name="star" value="1" /><label for="star1" title="Sucks big time">1 star</label>
																</div>
															</div>
														</div>
														<button type="submit" class="btn btn-success">Submit Rating</button>
													</form>
												</div>
											</div>
										</div>
										@if (count($errors) > 0)
								        <div class="alert alert-danger">
								            <strong>Whoops!</strong> There were some problems with your input.<br><br>
								            <ul>
								                @foreach ($errors->all() as $error)
								                    <li>{{ $error }}</li>
								                @endforeach
								            </ul>
								        </div>
								        @endif
										<!-- <form class="review_form_field" novalidate="novalidate" method="POST" action= "{{action('frontend\CommentController@comment', $product->id)}}" enctype="multipart/form-data">
											{{ csrf_field() }}
											<div class="input__box">
												<span>Nickname</span>
												<input id="" type="text" name="name">
											</div>
											<div class="input__box">
												<span>Email</span>
												<input id="" type="email" name="email">
											</div>
											<div class="input__box">
												<span>Review</span>
												<textarea type="text" name="comment"></textarea>
											</div>
											<div class="review-form-actions">
												<button type="submit">Submit Review</button>
											</div>
										</form> -->
									</div>
	                        	</div>
	                        	<!-- End Single Tab Content -->
	                        </div>
        				</div>
        			@role('Member')
						<div class="wn__related__product pt--80 pb--50">
							<div class="section__title text-center">
								<h2 class="title__be--2">Produk yang sama</h2>
							</div>
							<div class="row mt--60">
								<div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
								@foreach($related_product as $r)
									<!-- Start Single Product -->
									<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
										<div class="product__thumb">
										@if ($r->image == null || $r->image == 'default.jpg')
											<a class="first__img" href="{{ route('single_product', $r->slug) }}">
												<img src="{{url('product/default.jpg')}}" alt="product image">
											</a>
										@else
											<a class="first__img" href="{{ route('single_product', $r->slug) }}">
												<img src="{{url('product/'.$r->image)}}" alt="product image">
											</a>
										@endif
											<div class="hot__box">
												@if ($r->title == null)
												<span class="hot-label">BEST SALLER</span>
												@else
													<span class="hot-label">{{$r->title}}</span>
												@endif
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="nav-item nav-link active">{{$r->name}}</a></h4>
											<ul class="prize d-flex">
												<li>Rp. {{number_format($r->price)}}</li>
												<!-- <li class="old_prize">$35.00</li> -->
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<!-- <li><a class="cart" href="cart.php"><i class="bi bi-shopping-bag4"></i></a></li> -->
														<li><a class="wishlist" href="{{action('frontend\WishlistController@add_chart', $product->id)}}"><i class="bi bi-shopping-cart-full"></i></a></li>
														<!-- <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li> -->
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<?php
													$countRating = App\Rating::where('product_id', $r->id)->select('user_id')->count();
											        $ratingSum = App\Rating::where('product_id', $r->id)->sum('jumlah');
											        if ($countRating != 0){
											            $rating = $ratingSum / $countRating;
											        }else{
											            $rating = 0;
											        }
												?>
												
			                                        <ul class="rating d-flex">
			                                        @if ($countRating != 0)
														@if ($rating >= 0 && $rating <= 2)
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                        	@elseif ($rating >= 2 && $rating <= 4)
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                        	@elseif ($rating >= 4 && $rating <= 6)
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                        	@elseif ($rating >= 6 && $rating <= 8)
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
		                                        		@elseif ($rating >= 8 && $rating <= 10)
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                       		@endif
		                                        	@else
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                    	@endif
			                                    	</ul>
											</div>
										</div>
									</div>
									<!-- Start Single Product -->
									@endforeach
								</div>
							</div>
						</div>
					@if($checkout != 0 )
						<div class="wn__related__product">
							<div class="section__title text-center">
								<h2 class="title__be--2">paling laku</h2>
							</div>
							<div class="row mt--60">
								<div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
								@foreach ($paling_laku as $p)
									<!-- Start Single Product -->
									<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
										<div class="product__thumb">
										@if ($p->product->image == null || $p->product->image == 'default.jpg')
											<a class="first__img" href="{{ route('single_product', $p->product->slug) }}">
												<img src="{{url('product/default.jpg')}}" alt="product image">
											</a>
										@else
											<a class="first__img" href="{{ route('single_product', $p->product->slug) }}">
												<img src="{{url('product/'.$p->product->image)}}" alt="product image">
											</a>
										@endif
											<div class="hot__box">
												@if ($r->title == null)
												<span class="hot-label">BEST SALLER</span>
												@else
													<span class="hot-label">{{$p->title}}</span>
												@endif
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="{{ route('single_product', $p->product->slug) }}">{{$p->product->name}}</a></h4>
											<ul class="prize d-flex">
												<li>Rp. {{number_format($p->product->price)}}</li>
												<!-- <li class="old_prize">$35.00</li> -->
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<!-- <li><a class="cart" href="cart.php"><i class="bi bi-shopping-bag4"></i></a></li> -->
														<li><a class="wishlist" href="{{action('frontend\WishlistController@add_chart', $product->id)}}"><i class="bi bi-shopping-cart-full"></i></a></li>
														<!-- <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li> -->
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<?php
													$countRating = App\Rating::where('product_id', $p->id)->select('user_id')->count();
											        $ratingSum = App\Rating::where('product_id', $p->id)->sum('jumlah');
											        if ($countRating != 0){
											            $rating = $ratingSum / $countRating;
											        }else{
											            $rating = 0;
											        }
												?>
												@if ($countRating != 0)
													@if ($rating >= 0 && $rating <= 2)
			                                            <ul class="rating d-flex">
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            </ul>
			                                        @elseif ($rating >= 2 && $rating <= 4)
			                                        	<ul class="rating d-flex">
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            </ul>
			                                        @elseif ($rating >= 4 && $rating <= 6)
		                                        	<ul class="rating d-flex">
		                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
		                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
		                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
		                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
		                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
		                                            </ul>
			                                        @elseif ($rating >= 6 && $rating <= 8)
			                                        	<ul class="rating d-flex">
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            </ul>
			                                        @elseif ($rating >= 8 && $rating <= 10)
			                                        	<ul class="rating d-flex">
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                            </ul>
			                                       	@endif
		                                        @else
			                                    	<ul class="rating d-flex">
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                        </ul>
			                                    @endif
											</div>
										</div>
									</div>
									<!-- Start Single Product -->
								@endforeach
								</div>
							</div>
						</div>
					@endif
					@endrole

					@if (! Auth::check())
						<div class="wn__related__product pt--80 pb--50">
							<div class="section__title text-center">
								<h2 class="title__be--2">Produk yang sama</h2>
							</div>
							<div class="row mt--60">
								<div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
								@foreach($related_product as $r)
									<!-- Start Single Product -->
									<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
										<div class="product__thumb">
										@if ($r->image == null || $r->image == 'default.jpg')
											<a class="first__img" href="{{ route('single_product', $r->slug) }}">
												<img src="{{url('product/default.jpg')}}" alt="product image">
											</a>
										@else
											<a class="first__img" href="{{ route('single_product', $r->slug) }}">
												<img src="{{url('product/'.$r->image)}}" alt="product image">
											</a>
										@endif
											<div class="hot__box">
												@if ($r->title == null)
												<span class="hot-label">BEST SALLER</span>
												@else
													<span class="hot-label">{{$r->title}}</span>
												@endif
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="nav-item nav-link active">{{$r->name}}</a></h4>
											<ul class="prize d-flex">
												<li>Rp. {{number_format($r->price)}}</li>
												<!-- <li class="old_prize">$35.00</li> -->
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<!-- <li><a class="cart" href="cart.php"><i class="bi bi-shopping-bag4"></i></a></li> -->
														<li><a class="wishlist" href="{{action('frontend\WishlistController@add_chart', $product->id)}}"><i class="bi bi-shopping-cart-full"></i></a></li>
														<!-- <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li> -->
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<?php
													$countRating = App\Rating::where('product_id', $r->id)->select('user_id')->count();
											        $ratingSum = App\Rating::where('product_id', $r->id)->sum('jumlah');
											        if ($countRating != 0){
											            $rating = $ratingSum / $countRating;
											        }else{
											            $rating = 0;
											        }
												?>
												
			                                        <ul class="rating d-flex">
			                                        @if ($countRating != 0)
														@if ($rating >= 0 && $rating <= 2)
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                        	@elseif ($rating >= 2 && $rating <= 4)
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                        	@elseif ($rating >= 4 && $rating <= 6)
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                        	@elseif ($rating >= 6 && $rating <= 8)
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
		                                        		@elseif ($rating >= 8 && $rating <= 10)
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                       		@endif
		                                        	@else
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                    	@endif
			                                    	</ul>
											</div>
										</div>
									</div>
									<!-- Start Single Product -->
									@endforeach
								</div>
							</div>
						</div>
					@if($checkout != 0 )
						<div class="wn__related__product">
							<div class="section__title text-center">
								<h2 class="title__be--2">paling laku</h2>
							</div>
							<div class="row mt--60">
								<div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
								@foreach ($paling_laku as $p)
									<!-- Start Single Product -->
									<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
										<div class="product__thumb">
										@if ($p->product->image == null || $p->product->image == 'default.jpg')
											<a class="first__img" href="{{ route('single_product', $p->product->slug) }}">
												<img src="{{url('product/default.jpg')}}" alt="product image">
											</a>
										@else
											<a class="first__img" href="{{ route('single_product', $p->product->slug) }}">
												<img src="{{url('product/'.$p->product->image)}}" alt="product image">
											</a>
										@endif
											<div class="hot__box">
												@if ($r->title == null)
												<span class="hot-label">BEST SALLER</span>
												@else
													<span class="hot-label">{{$p->title}}</span>
												@endif
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="{{ route('single_product', $p->product->slug) }}">{{$p->product->name}}</a></h4>
											<ul class="prize d-flex">
												<li>Rp. {{number_format($p->product->price)}}</li>
												<!-- <li class="old_prize">$35.00</li> -->
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<!-- <li><a class="cart" href="cart.php"><i class="bi bi-shopping-bag4"></i></a></li> -->
														<li><a class="wishlist" href="{{action('frontend\WishlistController@add_chart', $product->id)}}"><i class="bi bi-shopping-cart-full"></i></a></li>
														<!-- <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li> -->
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<?php
													$countRating = App\Rating::where('product_id', $p->id)->select('user_id')->count();
											        $ratingSum = App\Rating::where('product_id', $p->id)->sum('jumlah');
											        if ($countRating != 0){
											            $rating = $ratingSum / $countRating;
											        }else{
											            $rating = 0;
											        }
												?>
												@if ($countRating != 0)
													@if ($rating >= 0 && $rating <= 2)
			                                            <ul class="rating d-flex">
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            </ul>
			                                        @elseif ($rating >= 2 && $rating <= 4)
			                                        	<ul class="rating d-flex">
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            </ul>
			                                        @elseif ($rating >= 4 && $rating <= 6)
		                                        	<ul class="rating d-flex">
		                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
		                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
		                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
		                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
		                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
		                                            </ul>
			                                        @elseif ($rating >= 6 && $rating <= 8)
			                                        	<ul class="rating d-flex">
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            </ul>
			                                        @elseif ($rating >= 8 && $rating <= 10)
			                                        	<ul class="rating d-flex">
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                                <li class="on"><i class="zmdi zmdi-star"></i></li>
			                                            </ul>
			                                       	@endif
		                                        @else
			                                    	<ul class="rating d-flex">
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
			                                        </ul>
			                                    @endif
											</div>
										</div>
									</div>
									<!-- Start Single Product -->
								@endforeach
								</div>
							</div>
						</div>
					@endif
					@endif
					
        			</div>
        		
        			<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
        				@role('Member')
        					<aside class="wedget__categories poroduct--cat">
        						<h3 class="wedget__title">Kategori Produk</h3>
        						<ul>
        						@foreach ($category as $c)
                                    <li><a href="{{route('shop', ['category' => $c->id])}}">{{$c->category_name}} <span>({{count($c->product)}})</span></a></li>
                                @endforeach
        						</ul>
        					</aside>
        				@endrole
        			@if (Auth::check())
        				@role('Dropshiper')
        					<aside class="wedget__categories poroduct--cat">
        						<h3 class="wedget__title">Kategori Produk</h3>
        						<ul>
        						@foreach ($category as $c)
        							<li>
        							@if (count($c->productUser)!= 0)
                                    	<a href="{{route('shop', ['category' => $c->id])}}">{{$c->category_name}} <span>({{count($c->product)}})</span></a>
                                    @else
        								<a href="">{{$c->category_name}}<span>({{count($c->productUser)}})</span>
        								</a>
        							@endif
        							</li>
                                @endforeach
        						</ul>
        					</aside>
        				@endrole
        			@endif
        					<!--<aside class="wedget__categories pro--range">
        						<h3 class="wedget__title">Filter by price</h3>
        						<div class="content-shopby">
        						    <div class="price_filter s-filter clear">
        						        <form action="#" method="GET">
        						            <div id="slider-range"></div>
        						            <div class="slider__range--output">
        						                <div class="price__output--wrap">
        						                    <div class="price--output">
        						                        <span>Price :</span><input type="text" id="amount" readonly="">
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
        					<aside class="wedget__categories poroduct--compare">
        						<h3 class="wedget__title">Compare</h3>
        						<ul>
        							<li><a href="#">x</a><a href="#">Condimentum posuere</a></li>
        							<li><a href="#">x</a><a href="#">Condimentum posuere</a></li>
        							<li><a href="#">x</a><a href="#">Dignissim venenatis</a></li>
        						</ul>
        					</aside>
        					<aside class="wedget__categories poroduct--tag">
        						<h3 class="wedget__title">Product Tags</h3>
        						<ul>
        							<li><a href="#">Biography</a></li>
        							<li><a href="#">Business</a></li>
        							<li><a href="#">Cookbooks</a></li>
        							<li><a href="#">Health & Fitness</a></li>
        							<li><a href="#">History</a></li>
        							<li><a href="#">Mystery</a></li>
        							<li><a href="#">Inspiration</a></li>
        							<li><a href="#">Religion</a></li>
        							<li><a href="#">Fiction</a></li>
        							<li><a href="#">Fantasy</a></li>
        							<li><a href="#">Music</a></li>
        							<li><a href="#">Toys</a></li>
        							<li><a href="#">Hoodies</a></li>
        						</ul>
        					</aside>-->
        					<aside class="wedget__categories sidebar--banner">
								<img src="{{asset('frontend/images/others/banner_left.jpg')}}" alt="banner images">
								<div class="text">
									<h2>new products</h2>
									<h6>save up to <br> <strong>40%</strong>off</h6>
								</div>
        					</aside>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End main Content -->
		<!-- Start Search Popup -->
		@include('frontend.layout.search')
        <!-- End Search Popup -->
        <!-- QUICKVIEW PRODUCT -->
		<div id="quickview-wrapper">
		    <!-- Modal -->
		    <div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
		        <div class="modal-dialog modal__container" role="document">
		            <div class="modal-content">
		                <div class="modal-header modal__header">
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                </div>
		                <div class="modal-body">
		                    <div class="modal-product">
		                        <!-- Start product images -->
		                        <div class="product-images">
		                            <div class="main-image images">
		                                <img alt="big images" src="{{asset('frontend/images/product/big-img/1.jpg')}}">
		                            </div>
		                        </div>
		                        <!-- end product images -->
		                        <div class="product-info">
		                            <h1>Simple Fabric Bags</h1>
		                            <div class="rating__and__review">
		                                <ul class="rating">
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                </ul>
		                                <div class="review">
		                                    <a href="#">4 customer reviews</a>
		                                </div>
		                            </div>
		                            <div class="price-box-3">
		                                <div class="s-price-box">
		                                    <span class="new-price">$17.20</span>
		                                    <span class="old-price">$45.00</span>
		                                </div>
		                            </div>
		                            <div class="quick-desc">
		                                Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
		                            </div>
		                            <div class="select__color">
		                                <h2>Select color</h2>
		                                <ul class="color__list">
		                                    <li class="red"><a title="Red" href="#">Red</a></li>
		                                    <li class="gold"><a title="Gold" href="#">Gold</a></li>
		                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
		                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
		                                </ul>
		                            </div>
		                            <div class="select__size">
		                                <h2>Select size</h2>
		                                <ul class="color__list">
		                                    <li class="l__size"><a title="L" href="#">L</a></li>
		                                    <li class="m__size"><a title="M" href="#">M</a></li>
		                                    <li class="s__size"><a title="S" href="#">S</a></li>
		                                    <li class="xl__size"><a title="XL" href="#">XL</a></li>
		                                    <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
		                                </ul>
		                            </div>
		                            <div class="social-sharing">
		                                <div class="widget widget_socialsharing_widget">
		                                    <h3 class="widget-title-modal">Share this product</h3>
		                                    <ul class="social__net social__net--2 d-flex justify-content-start">
		                                        <li class="facebook"><a href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
		                                        <li class="linkedin"><a href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
		                                        <li class="pinterest"><a href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
		                                        <li class="tumblr"><a href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
		                                    </ul>
		                                </div>
		                            </div>
		                            <div class="addtocart-btn">
		                                <a href="#">Add to cart</a>
		                            </div>
		                        </div><!-- .product-info -->
		                    </div><!-- .modal-product -->
		                </div><!-- .modal-body -->
		            </div><!-- .modal-content -->
		        </div><!-- .modal-dialog -->
		    </div>
		    <!-- END Modal -->
		</div>
		<!-- END QUICKVIEW PRODUCT -->
		@include('frontend.layout.footer')
		