
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
        <!-- cart-main-area start -->
        <div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <div class="table-content wnro__table table-responsive">
                            <table>
                                <thead>
                                    <tr class="title-top">
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                            @if(count($cart) != 0)
                                @foreach ($cart as $c)
                                    <tr>
                                    @if ($c->product->image == null || $c->product->image == 'dafault.jpg')
                                        <td class="product-thumbnail"><a href="#"><img src="{{url('product/default.jpg')}}" alt="product img"></a></td>
                                    @else
                                        <td class="product-thumbnail"><a href="#"><img src="{{url('product/'.$c->product->image)}}" alt="product img"></a></td>
                                    @endif
                                        <td class="product-name"><a href="{{ route('single_product', $c->product->slug) }}">{{$c->product->name}}</a></td>
                                        <td class="product-price"><span class="amount">Rp {{$c->product->price}}</span></td>
                                        <td>
                                            <form class="form" method="POST" action= "{{url('/cart_ubah', $c->id)}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input id="jumlah" class="input-text" type="number" value="{{$c->jumlah}}" name="jumlah">
                                                <button type="submit" class="btn-danger btn-sm">ubah</button>
                                            </form>
                                        </td>
                                        <td class="product-subtotal">Rp. {{$c->total_amount}}</td>
                                        <td class="product-remove"><a href="{{action('frontend\WishlistController@delete', $c->id)}}">X</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6"><center>KOSONG</center></td>
                                </tr>
                            @endif 
                                </tbody>
                            </table>
                        </div>
                        <div class="cartbox__btn">
                            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                <!-- <li><a href="#">Coupon Code</a></li>
                                <li><a href="#">Apply Code</a></li>
                                <li><a href="#">Update Cart</a></li> -->
                                <li><a href="{{action('frontend\CheckoutController@checkout', Auth::user()->id)}}">Check Out</a></center></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            <!-- <div class="cartbox-total d-flex justify-content-between">
                                <ul class="cart__total__list">
                                    <li>Cart total</li>
                                    <li>Sub Total</li>
                                </ul>
                                <ul class="cart__total__tk">
                                    <li>$70</li>
                                    <li>$70</li>
                                </ul>
                            </div> -->
                            <div class="cart__total__amount">
                                <span>Grand Total</span>
                                <span>Rp. {{App\Wishlist::where('user_id', Auth::user()->id)->where('status', 0)->get()->sum('total_amount')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <!-- cart-main-area end -->
		<!-- Footer Area -->
		@include('frontend.layout.footer')