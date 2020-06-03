@extends('backend.layout.index', ['active' => 'edit_gudang'])
@section('title', 'Gudang')
@section('content') 

<div class="card shadow mb-4">
    <div class="card-header py-3">
      	<div class="d-sm-flex align-items-center justify-content-between mb-4">
        	<h1 class="h3 mb-0 text-gray-800">Edit Catalog</h1>
	        <a href="{{action('backend\admin\GudangController@index')}}">
				<button type="button" class="btn ink-reaction btn-primary active pull-right">Daftar Gudang</button>
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
				<form class="form form-validate floating-label" novalidate="novalidate" method="POST" action= "{{action('backend\admin\GudangController@edit', $gudang->id)}}" enctype="multipart/form-data">
					{{ csrf_field() }}
						<div class="field" style="padding: 1%">
							<div class="col-sm-12">	
								<label>Product</label>
								<select name="product_id" type="text" class="form-control pull-right select2" style="width: 100%">
		                              <option value="">--pilih product--</option>
		                              <option value="">--{{$gudang->product->name}}--</option>
		                              @foreach ($product as $p)
		                              	<option value= "{{$p->id}}">{{$p->name}}</option>
		                              @endforeach
	                          	</select>
							</div>
						</div> <!-- /field -->
						<div class="field" style="padding: 1%">
							<div class="col-sm-12">	
								<label>Jumlah</label>
								<input type="number" class="form-control pull-right" id="" placeholder="price" name="jumlah" required value="{{$gudang->jumlah}}">
						</div> <!-- /field -->
						<div class="field" style="padding: 1%">
							<div class="col-sm-12">	
								<label>Keterangan</label>
								<textarea type="text" class="form-control summernote" id="" name="keterangan" required style="width: 100%" rows="10" >{{$gudang->keterangan}}</textarea>
						</div> <!-- /field -->
						<div class="field" style="padding: 1%">
							<div class="col-sm-12">	
								<label>Status</label>
								<select name="status" type="text" class="form-control pull-right select2" style="width: 100%">
		                              <option value="">--pilih status--</option>
		                              @if ($gudang->status == 1)
		                              <option value="">--sembunyikan--</option>
		                              @elseif ($gudang->status == 0)
		                              <option value="">--tampilkan--</option>
		                              @endif

		                              
		                              <option value= "1">sembunyikan</option>
		                              <option value= "0">tampilkan</option>
	                          	</select>
						</div> <!-- /field -->
						<div class="field" style="padding: 1%">
							<div class="col-sm-12 text-center">
								<button class="button btn btn-primary btn-large" id="btn_submit" style="width: 100%" type="submit">Simpan</button>
		                        <!-- <i id="loader" class="fa fa-spinner fa-spin hidden"></i> -->
							</div>
						</div>
				</form>
			</div> <!-- /content -->
		</div>
	</div>
</div>
@endsection