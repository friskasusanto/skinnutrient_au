@extends('backend.layouts.index', ['active' => 'tambah_product'])
@section('title', 'User')
@section('content')


<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Product</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Product</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Product</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <a href="{{action('backend\admin\ProductController@index_product')}}">
					<button type="button" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Daftar Product</button>
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
                    <form novalidate="novalidate" method="POST" action= "{{action('backend\admin\ProductController@add_product')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nama Product</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" name="name" required style="width: 100%">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Title</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" placeholder="title" name="title" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Category</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                   <select name="category" type="text" class="form-control" style="width: 100%">
		                              	<option value="">--pilih category--</option>
		                              	@foreach ($category as $p)
		                              		<option value= "{{$p->id}}">{{$p->category_name}}</option>
		                              	@endforeach
		                          	</select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Harga</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                   <input type="text" class="form-control" id="" name="price" required style="width: 100%">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Gambar Utama</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                   <input type="file" class="form-control" id="" name="image" multiple required style="width: 100%" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Gambar lain (bisa pilih lebih dari 1 gambar)</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                   <input type="file" class="form-control" id="" name="photos[]" multiple required style="width: 100%" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Descrioption</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                   <textarea type="text" class="form-control" id="" name="description" required style="width: 100%" rows="4" ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Harga Minimal</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                   <input type="text" class="form-control" id="" name="min_price" required style="width: 100%">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Harga Maksimal</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                   <input type="text" class="form-control" id="" name="max_price" required style="width: 100%">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                   <select name="status" type="text" class="form-control" style="width: 100%">
			                              <option value="">--pilih status--</option>
			                              <option value= "1">sembunyikan</option>
			                              <option value= "0">tampilkan</option>
		                          	</select>
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