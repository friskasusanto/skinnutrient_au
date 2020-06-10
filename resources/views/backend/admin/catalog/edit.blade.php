@extends('backend.layouts.index', ['active' => 'edit_product'])
@section('title', 'Admin')
@section('content') 

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Catalog</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Catalog</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Edit Catalog</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <a href="{{action('backend\admin\CatalogController@index')}}">
					<button type="button" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Daftar Catalog</button>
				</a>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
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
                    <form novalidate="novalidate" method="POST" action= "{{action('backend\admin\CatalogController@edit', $catalog->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Product</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <select name="product_id" type="text" class="form-control pull-right select2" style="width: 100%">
			                              <option value="">--{{$catalog->product->name}}--</option>
			                              @foreach ($product as $p)
			                              	<option value= "{{$p->id}}">{{$p->name}}</option>
			                              @endforeach
		                          	</select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Harga User</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="number" class="form-control pull-right" id="" placeholder="price" name="price_user" required value="{{$catalog->price_user}}">
                                </div>
                            </div>
                        </div>
                       	<div class="form-actions">
                            <div class="text-right">
                                <button type="submit" class="btn btn-info" id="btn_submit">Simpan</button>
                            </div>
                        </div>
                    </div>
				</form>
			</div> <!-- /content -->
		</div>
	</div>
</div>
@endsection