
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
                        	<h2 class="bradcaump-title">Blog</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.php">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Blog</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Blog Area -->
        <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-9 col-12">
        				<div class="blog-page">
        					<div class="page__header">
        						<h2>Blog</h2>
        					</div>
        					<!-- Start Single Post -->
                    @if (count($blog) != 0)
                        @foreach ($blog as $b)
        					<article class="blog__post d-flex flex-wrap">
        						<div class="thumb">
        							<a href="{{url('/blog-detail', $b->id)}}">
        								<img src="{{url('blog/'.$b->images)}}" alt="blog images">
        							</a>
        						</div>
        						<div class="content">
        							<h4><a href="blog-details.php">{{$b->judul}}</a></h4>
        							<ul class="post__meta">
        								<!-- <li>Posts by : <a href="#">road theme</a></li>
        								<li class="post_separator">/</li> -->
        								<li>{{$b->tgl_input}}</li>
        							</ul>
        							<p>{!!substr($b->text,0,200)!!} ...</p>
        							<div class="blog__btn">
        								<a href="{{url('/blog-detail', $b->id)}}">read more</a>
        							</div>
        						</div>
        					</article>
        					<!-- End Single Post -->
                        @endforeach
                    @else
                        <center><h5>~KOSONG~</h5></center>
                    @endif
        					
        				</div>
        				<ul class="wn__pagination">
        					{{$blog->render()}}
        				</ul>
        			</div>
        			<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__sidebar">
        					<!-- Start Single Widget -->
        					<aside class="widget search_widget">
        						<h3 class="widget-title">Cari Artikel</h3>
        						<form action="{{url('/blog-view')}}" method="GET">
        							<div class="form-input">
        								<input type="text" placeholder="Cari..." name="judul">
        								<button><i class="fa fa-search"></i></button>
        							</div>
        						</form>
        					</aside>
        					<!-- End Single Widget -->
                        @if (count($blog) != 0)
        					<!-- Start Single Widget -->
        					<aside class="widget recent_widget">
        						<h3 class="widget-title">Baru</h3>
        						<div class="recent-posts">
        							<ul>
                                    @foreach ($blog as $b)
        								<li>
        									<div class="post-wrapper d-flex">
        										<div class="thumb">
        											<a href="{{url('/blog-detail', $b->id)}}"><img src="{{url('blog/'.$b->images)}}" alt="blog images"></a>
        										</div>
        										<div class="content">
        											<h4><a href="{{url('/blog-detail', $b->id)}}">{{$b->judul}}</a></h4>
        											<p>{{$b->tgl_input}}</p>
        										</div>
        									</div>
        								</li>
                                    @endforeach
        							</ul>
        						</div>
        					</aside>
                        @else
                            <aside class="widget recent_widget">
                                <h3 class="widget-title">Baru</h3>
                                <div class="recent-posts">
                                    <ul>
                                        <li><center><h6>~kosong~</h6></center></li>
                                    </ul>
                                </div>
                            </aside>
                        @endif
        					<!-- End Single Widget -->
        					<!-- Start Single Widget
        					<aside class="widget comment_widget">
        						<h3 class="widget-title">Comments</h3>
        						<ul>
        							<li>
        								<div class="post-wrapper">
        									<div class="thumb">
        										<img src="images/blog/comment/1.jpeg" alt="Comment images">
        									</div>
        									<div class="content">
        										<p>demo says:</p>
        										<a href="#">Quisque semper nunc vitae...</a>
        									</div>
        								</div>
        							</li>
        							<li>
        								<div class="post-wrapper">
        									<div class="thumb">
        										<img src="images/blog/comment/1.jpeg" alt="Comment images">
        									</div>
        									<div class="content">
        										<p>Admin says:</p>
        										<a href="#">Curabitur aliquet pulvinar...</a>
        									</div>
        								</div>
        							</li>
        							<li>
        								<div class="post-wrapper">
        									<div class="thumb">
        										<img src="images/blog/comment/1.jpeg" alt="Comment images">
        									</div>
        									<div class="content">
        										<p>Irin says:</p>
        										<a href="#">Quisque semper nunc vitae...</a>
        									</div>
        								</div>
        							</li>
        							<li>
        								<div class="post-wrapper">
        									<div class="thumb">
        										<img src="images/blog/comment/1.jpeg" alt="Comment images">
        									</div>
        									<div class="content">
        										<p>Boighor says:</p>
        										<a href="#">Quisque semper nunc vitae...</a>
        									</div>
        								</div>
        							</li>
        							<li>
        								<div class="post-wrapper">
        									<div class="thumb">
        										<img src="images/blog/comment/1.jpeg" alt="Comment images">
        									</div>
        									<div class="content">
        										<p>demo says:</p>
        										<a href="#">Quisque semper nunc vitae...</a>
        									</div>
        								</div>
        							</li>
        						</ul>
        					</aside>
        					End Single Widget -->
        					<!-- Start Single Widget
        					<aside class="widget category_widget">
        						<h3 class="widget-title">Categories</h3>
        						<ul>
        							<li><a href="#">Fashion</a></li>
        							<li><a href="#">Creative</a></li>
        							<li><a href="#">Electronics</a></li>
        							<li><a href="#">Kids</a></li>
        							<li><a href="#">Flower</a></li>
        							<li><a href="#">Books</a></li>
        							<li><a href="#">Jewelle</a></li>
        						</ul>
        					</aside>
        					End Single Widget -->
        					<!-- Start Single Widget -->
        					<!-- <aside class="widget archives_widget">
        						<h3 class="widget-title">Arsip</h3>
        						<ul>
                                    <li><a href="#">Februari 202</a></li>
									<li><a href="#">Januari 2020</a></li>
									<li><a href="#">Desember 2019</a></li>
									<li><a href="#">November 2019</a></li>
        						</ul>
        					</aside> -->
        					<!-- End Single Widget -->
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End Blog Area -->

		<!-- Footer Area -->
        @include('frontend.layout.footer')