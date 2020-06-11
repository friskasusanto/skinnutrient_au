@extends('backend.layouts.index', ['active' => 'list_blog'])
@section('title', 'Blog')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Katalog SKINNUTRIENT</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Dropshiper</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Katalog Skinnutrient</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <form action="" method="GET">
                    <div class="customize-input">
                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                            type="search" placeholder="cari email" aria-label="Search" name="search">
                        <i class="form-control-icon" data-feather="search" type="submit"></i>
                    </div>
                </form>
            </div>
        </div> -->
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
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Stock</th>
                                    <th>Gambar Product</th>
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
                                    <td>{{$u->stock}}</td>
                                    <td><img src="{{{url('product/'.$u->image)}}}" alt="..." style="width: 100%"></td>
                                    <td>
                                    @if ($u->stock != 0)
                                        <p style="color: green">Barang Tersedia</p>
                                    @else 
                                        <button class="btn btn-danger btn-icon-split btn-sm">barang kosong</button>
                                    @endif
                                    </td>
                                    <td>
                                    <center>
                                        <a href="{{url('/dropship/addKatalog', $u->id)}}" class="btn btn-success btn-icon-split btn-sm" style="font-size: xx-small;">
                                            <i class="fa fa-plus-square" style="padding: 5px;"></i>
                                        </a>
                                    </center>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7"><center>KOSONG</center></td>
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

@endsection