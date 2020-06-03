@extends('backend.layouts.index', ['active' => 'gambar_product'])
@section('title', 'GambarProduct')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Gambar Product</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Product</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Daftar Gambar Product</li>
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
                        <i class="form-control-icon" data-feather="search" type="submit"></i>
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
                                    <th>Nama Product</th>
                                    <th>Gambar</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($gambar) != 0)
                                @foreach ($gambar as $key =>$u)
                                <tr>
                                    <td><center>{{++$key}}</center></td>
                                    <td>{{$u->name}}</td>

                                    @if (count($u->product_image) != 0)
                                        <td>
                                        @foreach ($u->product_image as $p)
                                            <img src="{{url('product/'.$p->image)}}" alt="..." style="width: 20%">
                                        @endforeach
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>
                                        <center>
                                        <a href="{{action('backend\admin\ProductController@edit_view_product', $u->id)}}" class="btn btn-warning btn-icon-split btn-sm" style="font-size: xx-small;">
                                            <i class="fas fa-edit" style="padding: 5px;"></i>
                                        </a>
                                    </center>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4"><center>KOSONG</center></td>
                                </tr>
                            @endif 
                            </tbody>
                        </table>
                        {{$gambar->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

