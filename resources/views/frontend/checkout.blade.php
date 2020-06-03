
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
                        	<h2 class="bradcaump-title">Pembayaran</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.php">Eaoron</a>
                              <!--<span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Shop Grid</span>-->
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Checkout Area -->
        <section class="wn__checkout__area section-padding--lg bg__white">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-6 col-12">
                    <form class="form" novalidate="novalidate" method="POST" action= "{{action('frontend\CheckoutController@checkout_add')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
        				<div class="customer_details">
        					<h3>Detail pembayaran</h3>
        					<div class="customar__field">
                                <div class="input_box">
                                    <label>Nama Penerima <span>*</span></label>
                                    <input type="text" placeholder="" name="receiver_name">
                                </div>
                                <div class="input_box">
                                    <label>Alamat <span>*</span></label>
                                    <!-- <input type="text" placeholder="Street address"> -->
                                    <textarea class="form-control" id="" name="address" required style="width: 100%" rows="6"></textarea>
                                </div>
                                <div class="differt__address">
                                    <input name="alamat_saya" value="address" type="checkbox">
                                    <span>Gunakan Alamat Saya</span>
                                </div>
                                <div class="input_box">
                                    <label>Phone <span>*</span></label>
                                    <input type="number" placeholder="" name="phone_number">
                                </div>
        					</div>
        				</div>
        				<div class="customer_details mt--20">
        					
        					<div class="customar__field differt__form mt--40">
        						<div class="input_box">
        							<p>- {{Auth::user()->address}}</p>
        						</div>
        					</div>
        				</div>
                        <div id="accordion" class="checkout_accordion mt--30" role="tablist">
                            <div class="payment">
                                <div class="che__header" role="tab" id="">
                                    <div class="checkout__title" data-toggle="collapse" href="" aria-expanded="true" aria-controls="collapseOne">
                                        <input id="" name="payment_id" value="1" type="checkbox">
                                        <span>Direct Bank Transfer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="payment">
                                <div class="che__header" role="tab" id="">
                                    <div class="collapsed checkout__title" data-toggle="collapse" href="" aria-expanded="false" aria-controls="collapseTwo">
                                        <input id="" name="payment_id" value="2" type="checkbox">
                                        <span>Cheque Payment</span>
                                    </div>
                                </div>
                            </div>
                            <div class="payment">
                                <div class="che__header" role="tab" id="">
                                    <div class="collapsed checkout__title" data-toggle="collapse" href="" aria-expanded="false" aria-controls="collapseThree">
                                        <input id="" name="payment_id" value="3" type="checkbox">
                                        <span>Cash on Delivery</span>
                                    </div>
                                </div>
                            </div>
                            <div class="payment">
                                <div class="che__header" role="tab" id="">
                                    <div class="collapsed checkout__title" data-toggle="collapse" href="" aria-expanded="false" aria-controls="collapseFour">
                                        <input id="" name="payment_id" value="4" type="checkbox">
                                        <span>PayPal <img src="{{asset('frontend/images/icons/payment.png')}}" alt="payment images"> </span>
                                    </div>
                                </div>
                            </div>

                            <center><button type="submit" class="btn-success btn-icon-split btn-sm">submit</button></center>
                        </div>
        			</div>
                    </form>
        			<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__order__box">
        					<h3 class="onder__title">Your order</h3>
        					<ul class="order__total">
        						<li>Product</li>
        						<li>Total</li>
        					</ul>
        					<ul class="order_product">
                            @foreach ($cart as $c )
        						<li>{{$c->product->name}} × {{$c->jumlah}}<span>Rp. {{$c->total_amount}}</span></li>
                            @endforeach
        					</ul>
        					<ul class="total__amount">
        						<li>Order Total <span>Rp. {{App\Wishlist::where('user_id', Auth::user()->id)->sum('total_amount')}}</span></li>
        					</ul>
        				</div>
        			</div>
                </form>
        		</div>
        	</div>
        </section>
        <!-- End Checkout Area -->
		<!-- Footer Area -->
        @include('frontend.layout.footer')