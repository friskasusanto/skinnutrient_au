
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
                        	<h2 class="bradcaump-title">Blog Details</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.php">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Blog-Details</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
		<div class="page-blog-details section-padding--lg bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-12">
						<div class="blog-details content">
							<article class="blog-post-details">
								<div class="post-thumbnail">
									<img src="{{url('blog/'.$blog->images)}}" alt="blog images">
								</div>
								<div class="post_wrapper">
									<div class="post_header">
										<h2>{{$blog->judul}}</h2>
										<div class="blog-date-categori">
											<ul>
												<li>{{$blog->tgl_input}}</li>
												<li><a href="#" title="Posts by Admin Eaoron Indonesia" rel="author">Admin</a></li>
											</ul>
										</div>
									</div>
									<div class="post_content text-justify">
										<p>{!!$blog->text!!}</p>
									</div>
									<ul class="blog_meta">
									@if (count($comment) != 0)
										<li><a href="#">{{count($comment)}} komentar</a></li>
									@else
										<li><a href="#">0 komentar</a></li>
									@endif
										<li> / </li>
										<li>Tags:<span> Blog EAORON</span></li>
									</ul>
								</div>
							</article>
							<div class="comments_area">
							@if (count($comment) != 0)
								<h3 class="comment__title">{{count($comment)}} komentar</h3>
							@else
								<h3 class="comment__title">0 komentar</h3>
							@endif

							@if (count($comment) != 0)
							@foreach ($comment_parent as $parent)
								<ul class="comment__list">
									
									<li>
										<div class="wn__comment">
											<!-- <div class="thumb">
												<img src="images/blog/comment/1.jpeg" alt="comment images">
											</div> -->
											<div class="content">
												<div class="comnt__author d-block d-sm-flex">
													<span><a href="#">{{$parent->name}}</a>  Post author</span>
													<span>{{$parent->created_at}}</span>
												</div>
												<p>{{$parent->comment}}</p>
											</div>
										</div>
									</li>
									
									
									<li class="comment_reply">
										<div class="wn__comment">
											<!-- <div class="thumb">
												<img src="images/blog/comment/1.jpeg" alt="comment images">
											</div> -->
											<div class="content">
												<div class="comnt__author d-block d-sm-flex">
													<span><a href="#">{{$comment_child->name}}</a> Post author</span>
													<span>{{$comment_child->created_at}}</span>
												</div>
												<p>{{$comment_child->comment}}</p>
											</div>
										</div>
									</li>
									
								</ul>
							@endforeach
							@endif
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
							<div class="comment_respond">
								<h3 class="reply_title">Tinggalkan komentar</h3>
								<form class="comment__form" action="{{url('/comment_blog', $blog->id)}}"method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
									<p>Alamat email Anda tidak akan dipublikasikan. </p>
									<div class="input__box">
										<textarea name="comment" placeholder="Kolom komentar" name="comment"></textarea>
									</div>
									<div class="input__wrapper clearfix">
										<div class="input__box name one--third">
											<input type="text" placeholder="Nama" name="name">
										</div>
										<div class="input__box email one--third">
											<input type="email" placeholder="Email" name="email">
										</div>
										<!--<div class="input__box website one--third">
											<input type="text" placeholder="website">
										</div>-->
									</div>
									<div class="submite__btn">
										<button href="#" type="submit" class="btn">Post Comment</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
						<div class="wn__sidebar">
							<!-- Start Single Widget -->
							<aside class="widget search_widget">
								<h3 class="widget-title">Cari Artikel</h3>
								<form action="{{url('/blog-view')}}" method="GET">
									<div class="form-input">
										<input type="text" placeholder="Cari...">
										<button><i class="fa fa-search"></i></button>
									</div>
								</form>
							</aside>
							<!-- End Single Widget -->
							<!-- Start Single Widget -->
							@if (count($search) != 0)
        					<!-- Start Single Widget -->
        					<aside class="widget recent_widget">
        						<h3 class="widget-title">Baru</h3>
        						<div class="recent-posts">
        							<ul>
                                    @foreach ($search as $b)
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
								<h3 class="widget-title">Blog Kategori</h3>
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

		<!-- Footer Area -->
		@include('frontend.layout.footer')