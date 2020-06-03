@extends('backend.layout.index', ['active' => 'add_order'])
@section('title', 'Order')
@section('content')
<style>
	body {font-family: Arial, Helvetica, sans-serif;}

	/* The Modal (background) */
	.modal {
	  display: none; /* Hidden by default */
	  position: fixed; /* Stay in place */
	  z-index: 1; /* Sit on top */
	  padding-top: 100px; /* Location of the box */
	  left: 0;
	  top: 0;
	  width: 100%; /* Full width */
	  height: 100%; /* Full height */
	  overflow: auto; /* Enable scroll if needed */
	  background-color: rgb(0,0,0); /* Fallback color */
	  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content */
	.modal-content {
	  background-color: #fefefe;
	  margin: auto;
	  padding: 20px;
	  border: 1px solid #888;
	  width: 80%;
	}

	/* The Close Button */
	.close {
	  color: #aaaaaa;
	  float: right;
	  font-size: 28px;
	  font-weight: bold;
	}

	.close:hover,
	.close:focus {
	  color: #000;
	  text-decoration: none;
	  cursor: pointer;
	}
</style>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      	<div class="d-sm-flex align-items-center justify-content-between mb-4">
        	<h1 class="h3 mb-0 text-gray-800">Quick Order</h1>
	        <a href="">
				<button type="button" class="btn ink-reaction btn-primary active pull-right">Daftar Order</button>
			</a>
			</a>
      	</div>
    </div>
    <div class="card-body">
		@include('layouts._flash')
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
        <div class="account-container register" style="width: 100%">
			<div class="content clearfix">
				<form class="form form-validate floating-label" novalidate="" method="GET" action="">
						<div class="field">
							<div class="col-sm-12">
								<p>Pilih Barang
									<select name="barang" id="barang" type="text" class="form-control pull-right select2" style="width: 100%">
			                              <option value="">--pilih barang--</option>
			                              @foreach ($product as $p)
			                              	<option value="{{$p->id}}">{{$p->name}} (stock: {{$p->stock}})</option>
			                              @endforeach
			                          </select>
								</p>
							</div>
						</div> <!-- /field -->
						<div class="field" style="padding: 1%">
							<div class="col-sm-12 text-center">
								<button class="button btn btn-primary btn-large" style="width: 100%" type="button" id="myBtn">Simpan</button>
		                        <!-- <i id="loader" class="fa fa-spinner fa-spin hidden"></i> -->
							</div>
						</div> <!-- /field -->
				</form>
			</div> <!-- /content -->
		</div>
	</div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p><center>Tambah Barang</center></p>
    <br/>
    <br/>

    <p id="detail-product"></p>
    <form class="form form-validate floating-label" novalidate="" method="post" action="#">
    	{{ csrf_field() }}
    	<input type="hidden" name="product_id" value="" id="product_id">
    	<p></p>
    	<div class="form-group">
	        <label for="recipient-name" class="col-form-label">Total Barang:</label>
	        <input type="text" class="form-control" id="" name="total">
	    </div>
	    <div class="form-group">
	        <label for="recipient-name" class="col-form-label">Nama Pemesan:</label>
	        <input type="text" class="form-control" id="recipient-name" name="receiver_name	">
	    </div>
	    <div class="form-group">
	        <label for="recipient-name" class="col-form-label">Alamat:</label>
	        <input type="text" class="form-control" id="recipient-name" name="address">
	    </div>
	    <div class="form-group">
	        <label for="recipient-name" class="col-form-label">No. Hp:</label>
	        <input type="text" class="form-control" id="recipient-name" name="phone_number">
	    </div>
	    <select name="payment_id" type="text" class="form-control pull-right select2" style="width: 100%">
          	<option value="">--pilih pembayaran--</option>
          	@foreach ($payment as $p)
          		<option value= "" >{{$p->name}}</option>
          	@endforeach
      	</select>
      	<select name="courier" type="text" class="form-control pull-right select2" style="width: 100%">
          	<option value="">--pilih kurir--</option>
          		<option value= "" ></option>
      	</select>
      	<center><button class="button btn btn-primary btn-large" type="submit">Order Barang</button></center>
    </form>
  </div>

</div>

@section ('script')
<script>
	// Get the modal
	var modal = document.getElementById("myModal");

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
	  modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
	    modal.style.display = "none";
	  }
	}

	$(function(){
		$("#myBtn").click(function(){
			var barang = $("#barang").val();
			// alert(barang);
			$.get("{{url('dropship/detail-product/')}}"+'/'+barang, function(data){
				// alert(data);
				// console.log(data);
				$("#product_id").val(data.data.id);
				$("#detail-product").append("<b>Nama Produk:</b> "+data.data.name)
				.append("<p>"+"<b>Harga Produk:</b> "+data.data.price+"</p>")
				.append("<p>"+"<b>Deskripsi Produk:</b> "+data.data.description+"</p>")
				.append("<p>"+"<b>Stok Produk: </b>"+data.data.stock+"</p>");
			});
		});
	});
</script>
@endsection


@endsection