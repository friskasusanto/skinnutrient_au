@extends('backend.layouts.index', ['active' => 'edit_product'])
@section('title', 'Admin')
@section('content') 


<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Category</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Category</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Edit Category</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <a href="{{action('backend\admin\CategoriController@index')}}">
					<button type="button" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Daftar Category</button>
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
                    <form novalidate="novalidate" method="POST" action= "{{action('backend\admin\CategoriController@edit', $category->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nama Category</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" class="form-control pull-right" id="" placeholder="price" name="category_name" required value="{{$category->category_name}}">
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
                                    <select name="status" type="text" class="form-control pull-right select2" style="width: 100%">
			                              <option value="">--pilih status--</option>
			                              @if ($category->status == 1)
			                              <option value="">--sembunyikan--</option>
			                              @elseif ($category->status == 0)
			                              <option value="">--tampilkan--</option>
			                              @endif

			                              
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