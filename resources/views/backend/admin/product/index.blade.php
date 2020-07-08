@extends('backend.layouts.index', ['active' => 'list_product'])
@section('title', 'User')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Product</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Product</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Daftar Product</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <form action="" method="GET">
                    <div class="customize-input">
                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                            type="search" placeholder="cari nama product" aria-label="Search" name="search">
                    </div>
                </form>
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
    <!-- basic table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Deskripsi</th>
                                    <th>Stock</th>
                                    <th>Min Price</th>
                                    <th>Max Price</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($product) != 0)
                                @foreach ($product as $key =>$u)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->category->category_name}}</td>
                                    <td>{{$u->price}}</td>
                                    <td><img src="{{url('product/'.$u->image)}}" alt="..." style="width: 100%"></td>
                                    <td>{!!substr($u->description,0,50)!!} ...</td>
                                    <td>{{$u->stock}}</td>
                                    <td>{{$u->min_price}}</td>
                                    <td>{{$u->max_price}}</td>

                                @if ($u->status == 1)
                                    <td><p style="color: red">tidak aktif</p></td>
                                @elseif ($u->status == 0)
                                    <td><p style="color: green">aktif</p></td>
                                @elseif ($u->status == null)
                                    <td>-</td>
                                @endif

                                    <td>
                                        <center>
                                            <!-- <a href="{{action('backend\admin\ProductController@edit_view_product', $u->id)}}" class="btn btn-warning btn-icon-split btn-sm" style="font-size: xx-small;">
                                                <i class="fas fa-edit" style="padding: 5px;"></i>
                                            </a> -->

                                            <a type="button" class="btn btn-circle btn-warning btn-icon-split btn-sm" style="font-size: xx-small;" data-toggle="modal" data-target="#modalEdit{{$u->id}}"><i class="fas fa-edit" style="padding: 5px;"></i></a>

                                            <a href="{{action('backend\admin\ProductController@delete_product', $u->id)}}" class="btn btn-circle btn-danger btn-icon-split btn-sm" style="font-size: xx-small;">
                                                 <i class="fas fa-trash" style="padding: 5px;"></i> 
                                            </a>
                                    </center>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="11"><center>KOSONG</center></td>
                                </tr>
                            @endif 
                            </tbody>
                        </table>
                        {{$product->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(isset($product))
@foreach( $product as $u )
<div class="modal" id="modalEdit{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form novalidate="novalidate" method="POST" action= "{{action('backend\admin\ProductController@edit_product', $u->id)}}" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" id="" name="name" required style="width: 100%" value="{{ucfirst($u->name)}}">
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
                                    <input type="text" class="form-control" id="" placeholder="title" name="title" required value="{{$u->title}}">
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
                                        <option value="">--{{$u->category->category_name}}--</option>
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
                                   <input type="text" class="form-control" id="" name="price" required style="width: 100%" value="{{ucfirst($u->price)}}">
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
                                    <img src="{{url('product/'.$u->image)}}" alt="..." style="width: 20%">
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

                                    <?php 
                                        $gambar = App\ProductGambar::where('product_id', $u->id)->get();
                                    ?>
                                    @if (count($gambar) != 0)
                                        @foreach ($gambar as $g)
                                            <img src="{{url('product/'.$g->image)}}" alt="..." style="width: 20%">
                                        @endforeach
                                    @endif
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
                                   <textarea type="text" class="form-control" id="" name="description" required style="width: 100%" rows="4" >{{$u->description}}</textarea>
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
                                   <input type="text" class="form-control" id="" name="min_price" required style="width: 100%" value="{{ucfirst($u->min_price)}}">
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
                                   <input type="text" class="form-control" id="" name="max_price" required style="width: 100%" value="{{ucfirst($u->max_price)}}">
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
                                          @if ($u->status == 1)
                                          <option value="">--sembunyikan--</option>
                                          @elseif ($u->status == 0)
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
            </div>
        </div>
    </div>
</div>
@endforeach
@endif

@endsection