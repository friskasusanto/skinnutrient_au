@extends('backend.layouts.index', ['active' => 'list_blog'])
@section('title', 'Blog')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Penjualan</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Log</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Daftar Penjualan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <form action="" method="GET">
                    <div class="customize-input">
                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                            type="search" placeholder="cari nama product" aria-label="Search" name="search">
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
                                    <th>Product</th>
                                    <th>Jumlah</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Masuk</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($reseller) != 0)
                                @foreach ($reseller as $key =>$u)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$u->product->name}}</td>
                                    <td>{{$u->jumlah}}</td>
                                    <td>{{$u->product->category->category_name}}</td>
                                    <td>{{$u->tgl_input}}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5"><center>KOSONG</center></td>
                                </tr>
                            @endif 
                            </tbody>
                        </table>
                        {{$reseller->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection