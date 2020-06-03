
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
							<h3 class="account__title">Daftar</h3>
							<form action="{{ route('register') }}" method="POST">
								@csrf
								<div class="account__form">
									<div class="input__box">
										<label>Nama Depan<span>*</span></label>
										<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

		                                @error('name')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
									</div>
									<div class="input__box">
										<label>Nama Belakang<span>*</span></label>
										<input id="nama_belakang" type="text" class="form-control @error('nama_belakang') is-invalid @enderror" name="nama_belakang" value="" required autocomplete="nama_belakang" autofocus>
									</div>
									<div class="input__box">
										<label>Alamat<span>*</span></label>
										<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="" required autocomplete="address" autofocus>
									</div>
									<div class="input__box">
										<label>No Telp<span>*</span></label>
										<input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="" required autocomplete="phone" autofocus>
									</div>
								<!-- TRY -->
									<div class="input__box">
										<label>Provinsi<span>*</span></label>
										<select name="state" id="state" class="form-control" >
						                    <option value="">--- Pilih Provinsi ---</option>
						                    @foreach ($states as $key => $value)
						                        <option value="{{ $key }}">{{ $value }}</option>
						                    @endforeach
						                </select>
									</div>
									<div class="input__box">
										<label>Kabupaten<span>*</span></label>
										<select name="city" id="city" class="form-control" >
						                  <option>-- Pilih Kabupaten --</option>
						                </select>
									</div>
									<div class="input__box">
										<label>Kota<span>*</span></label>
										<select name="regency" id="regency" class="form-control" >
						                  <option>-- Pilih Kota --</option>
						                </select>
									</div>
									<div class="input__box">
										<label>Kelurahan<span>*</span></label>
										<select name="village" id="village" class="form-control" >
						                  <option>-- Pilih Kelurahan/Desa --</option>
						                </select>
									</div>
								<!-- ENDTRY -->

									<div class="input__box">
										<label>Email<span>*</span></label>
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

				                        @error('email')
				                            <span class="invalid-feedback" role="alert">
				                                <strong>{{ $message }}</strong>
				                            </span>
				                        @enderror
									</div>
									<div class="input__box">
										<label>Masukan Kata Sandi Anda<span>*</span></label>
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

		                                @error('password')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
									</div>
									<div class="input__box">
										<label>Ulangi Password<span>*</span></label>
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
									</div>
									<div class="form__btn">
										<button type="submit">Daftar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div></center>
			</div>
		</section>
		<!-- End My Account Area -->
		<!-- Footer Area -->
		@include('frontend.layout.footer')

		<script type="text/javascript">
	    $(document).ready(function() {
	        $('select[name="state"]').on('change', function() {
	            var stateID = $(this).val();
	            if(stateID) {
	                $.ajax({
	                    url: '/regencies/ajax/'+stateID,
	                    type: "GET",
	                    dataType: "json",
	                    success:function(data) {                        
	                        $('select[name="city"]').empty();
	                        $.each(data, function(key, value) {
	                            $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
	                        });
	                    }
	                });
	            }else{
	                $('select[name="city"]').empty();
	            }
	        });
	    });

	     $(document).ready(function() {
	        $('select[name="city"]').on('change', function() {
	            var cityID = $(this).val();
	            if(cityID) {
	                $.ajax({
	                    url: '/districts/ajax/'+cityID,
	                    type: "GET",
	                    dataType: "json",
	                    success:function(data) {
	                        $('select[name="regency"]').empty();
	                        $.each(data, function(key, value) {
	                            $('select[name="regency"]').append('<option value="'+ key +'">'+ value +'</option>');
	                        });
	                    }
	                });
	            }else{
	                $('select[name="regency"]').empty();
	            }
	        });
	    });

	     $(document).ready(function() {
	        $('select[name="regency"]').on('change', function() {
	            var regencyID = $(this).val();
	            if(regencyID) {
	                $.ajax({
	                    url: '/villages/ajax/'+regencyID,
	                    type: "GET",
	                    dataType: "json",
	                    success:function(data) {
	                        $('select[name="village"]').empty();
	                        $.each(data, function(key, value) {
	                            $('select[name="village"]').append('<option value="'+ key +'">'+ value +'</option>');
	                        });
	                    }
	                });
	            }else{
	                $('select[name="village"]').empty();
	            }
	        });
	    });
	</script>