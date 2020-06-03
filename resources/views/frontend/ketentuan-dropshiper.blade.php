
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
        <!-- Start About Area -->
        <div class="page-about about_area bg--white section-padding--lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title--3 text-center pb--30">
                            <h2>Ketentuan Sebagai Dropshiper</h2>
                            <!-- <p>eaoron.com.au</p> -->
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="content">
                            <!-- <h6>AUS Made Express International Group Pty Ltd</h6>
                            <p class="mt--20 mb--20">F17/2A Westall Road</p>
                            <p class="mt--20 mb--20">Clayton VIC 3168</p>
                            <p class="mt--20 mb--20">Phone: 04 5180 7777</p> -->
                            <form class="form form-validate floating-label" novalidate="novalidate" method="POST" action= "{{action('frontend\FrontendController@acc_dropshiper')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="">
                                    <input name="dropshiper" value="dropshiper" type="checkbox">
                                    <span>Saya Setuju Dengan Semua Ketentuan Dropshiper</span>
                                </div>
                                <button class="button btn submite__btn" id="btn_submit" style="width: 100%" type="submit">Gabung</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Area -->
        <!-- End About Area -->
        <!-- Footer Area -->
        @include('frontend.layout.footer')