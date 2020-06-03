<?php include 'header.php' ?>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<?php include 'navbar.php' ?>
		<!-- //Header -->
		<!-- Start Search Popup -->
		<?php include 'search.php' ?>
		<!-- End Search Popup -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">My Account</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">My Account</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
		<!-- Start My Account Area -->
		<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Masuk</h3>
							<form action="#">
								<div class="account__form">
									<div class="input__box">
										<label>Masukan Email Anda<span>*</span></label>
										<input type="text">
									</div>
									<div class="input__box">
										<label>Masukan Kata Sandi Anda<span>*</span></label>
										<input type="text">
									</div>
									<div class="form__btn">
										<button>Masuk</button>
										<label class="label-for-checkbox">
											<input id="rememberme" class="input-checkbox" name="rememberme" value="forever" type="checkbox">
											<span>Ingat Saya</span>
										</label>
									</div>
									<a class="forget_pass" href="#">Lupa Kata Sandi?</a>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Daftar</h3>
							<form action="#">
								<div class="account__form">
									<div class="input__box">
										<label>Masukan Email Anda<span>*</span></label>
										<input type="email">
									</div>
									<div class="input__box">
										<label>Masukan Kata Sandi Anda<span>*</span></label>
										<input type="password">
									</div>
									<div class="form__btn">
										<button>Daftar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End My Account Area -->
		<!-- Footer Area -->
		<?php include 'footer.php' ?>