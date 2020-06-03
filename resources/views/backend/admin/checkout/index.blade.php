@extends('backend.layout.index', ['active' => 'list_checkout'])
@section('title', 'User')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Order</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Order</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Daftar Order</li>
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
                                    <th>Tanggal Masuk</th>
                                    <th>User Pemesan</th>
                                    <th>Total Harga</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Product</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($checkout) != 0)
                                @foreach ($checkout as $key =>$u)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$u->entry_date}}</td>
                                    <td>{{$u->user->name}}</td>
                                    <td>{{$u->total_price}}</td>
                                    <td>{{$u->payment_date}}</td>
                                    <td>{{$u->product->name}}</td>
                                @if ($u->status = 1)
                                    <td>Order Baru</td>
                                @elseif ($u->status == 2)
                                    <td>Order dalam Pengiriman</td>
                                @elseif ($u->status = 0)
                                    <td>Order di tolak</td>
                                @endif
                                    <td>
                                    <center>
                                    @if ($u->status == 1)
                                        <a href="{{action('backend\admin\ProductController@approve_admin', $u->id)}}" class="btn btn-success btn-icon-split btn-sm" style="font-size: xx-small;">
                                            <i class="fa fa-check" style="padding: 5px;"></i>
                                        </a>
                                        <a href="{{action('backend\admin\ProductController@reject_admin', $u->id)}}" class="btn btn-danger btn-icon-split btn-sm" style="font-size: xx-small;">
                                            <i class="fa fa-close" style="padding: 5px;"></i>
                                        </a>
                                        <a href="{{action('backend\admin\ProductController@detail_checkout', $u->id)}}" class="btn btn-warning btn-icon-split btn-sm" style="font-size: xx-small;">
                                            <i class="fa fa-eye" style="padding: 5px;"></i>
                                        </a>
                                    @elseif ($u->status = 2)
                                        <a href="{{action('backend\admin\ProductController@pengiriman_barang', $u->id)}}" class="btn btn-info btn-icon-split btn-sm" style="font-size: xx-small;">
                                            <i class="fa fa-truck" style="padding: 5px;"></i>
                                        </a>
                                        <a href="{{action('backend\admin\ProductController@detail_checkout', $u->id)}}" class="btn btn-warning btn-icon-split btn-sm" style="font-size: xx-small;">
                                            <i class="fa fa-eye" style="padding: 5px;"></i>
                                        </a>
                                    @elseif ($u->status = 0)
                                        <a href="" class="btn btn-warning btn-icon-split btn-sm" style="font-size: xx-small;">
                                            <i class="fa fa-circle-o-notch" style="padding: 5px;"></i>
                                        </a>
                                        <a href="{{action('backend\admin\ProductController@detail_checkout', $u->id)}}" class="btn btn-warning btn-icon-split btn-sm" style="font-size: xx-small;">
                                            <i class="fa fa-eye" style="padding: 5px;"></i>
                                        </a>
                                    @endif
                                    </center>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8"><center>KOSONG</center></td>
                                </tr>
                            @endif 
                            </tbody>
                        </table>
                        {{$checkout->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection