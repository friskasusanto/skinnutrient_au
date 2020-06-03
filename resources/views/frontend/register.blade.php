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
        <?php include 'bradcaump.php' ?>
        <!-- End Bradcaump area -->
		<!-- Start My Account Area -->
		<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
            <div class="row">
        			<div class="col-lg-6 col-12">
                        <div class="my__account__wrapper">
                            <h3 class="account__title">Daftar</h3>
                                <form action="#">
                                    <div class="account__form">
                                        <div class="customer_details">
                                            <div class="customar__field">
                                                <div class="margin_between">
                                                    <div class="input_box space_between">
                                                        <label>Nama Depan<span>*</span></label>
                                                        <input type="text">
                                                    </div>
                                                    <div class="input_box space_between">
                                                        <label>Nama Belakang<span>*</span></label>
                                                        <input type="text">
                                                    </div>
                                                </div>
                                                <div class="input_box">
                                                    <label>User ID<span>*</span></label>
                                                    <input type="text">
                                                </div>
                                                <div class="input_box">
                                                    <label>Kota<span>*</span></label>
                                                    <select class="select__option">
                                                        <option>Pilih Kota</option>
                                                        <option>Kota Semarang</option>
                                                        <option>Kab. Semarang</option>
                                                        <option>Kota Medan</option>
                                                        <option>Kota Denpasar</option>
                                                        <option>Kota Jakarta</option>
                                                    </select>
                                                </div>
                                                <div class="input_box">
                                                    <label>Kecamatan<span>*</span></label>
                                                    <select class="select__option">
                                                        <option>Pilih Kecamatan</option>
                                                        <option>Semarang Barat</option>
                                                        <option>Semarang Timur</option>
                                                        <option>Semarang Tengah</option>
                                                        <option>Semarang Selatan</option>
                                                        <option>Depok</option>
                                                    </select>
                                                </div>
                                                <div class="input_box">
                                                    <label>Alamat <span>*</span></label>
                                                    <input type="text" placeholder="Masukan Alamat Anda">
                                                </div>
                                                <div class="input_box">
                                                    <input type="text" placeholder="Patokan Rumah, Apartment, gedung dll. (opsional)">
                                                </div>
                                                <div class="input_box">
                                                    <label>Kode POS<span>*</span></label>
                                                    <input type="text">
                                                </div>
                                                <div class="margin_between">
                                                    <div class="input_box space_between">
                                                        <label>Nomor Telepon<span>*</span></label>
                                                        <input type="text">
                                                    </div>

                                                    <div class="input_box space_between">
                                                        <label>Email<span>*</span></label>
                                                        <input type="Masukan Email Anda">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form__btn">
										        <button>Daftar</button>
                                            </div>
                                            <a class="forget_pass" href="#">Sudah punya akun?</a>
                                        </div>
                                    </div>
                        </div>
			</div>
		</section>
		<!-- End My Account Area -->
		<!-- Footer Area -->
		<?php include 'footer.php' ?>