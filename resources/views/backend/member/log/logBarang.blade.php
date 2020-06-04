@extends('backend.layouts.index', ['active' => 'barang_dibeli'])
@section('title', 'LogMember')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">List Barang Dibeli</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Member</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">List Barang Dibeli</li>
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
                                    <th>Detail Order</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                {{ csrf_field() }}
                            </thead>
                            <tbody>
                            @if(count($log) != 0)
                                @foreach ($log as $key =>$u)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$u->product->name}}</td>
                                    <td>
                                        <center>
                                            <a type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter{{$u->id}}"><i class="fa fa-eye"></i></a>
                                        </center>
                                    </td>
                                    <td>
                                    @if ($u->status == 0)
                                        <p style="color: green">order dalam proses</p>
                                    @elseif ($u->status == 1)
                                        <p style="color: red">order di tolak</p>
                                    @elseif ($u->status == 2)
                                        <p style="color: yellow">menunggu pengiriman</p>
                                    @elseif ($u->status == 3)
                                        <p style="color: purple">dalam proses pengiriman</p>
                                    @elseif ($u->status == 4)
                                        <p style="color: green">barang telah tiba</p>
                                    @endif

                                    </td>
                                    <td>
                                    @if ($u->status == 3)
                                    <center>
                                        <a href="{{url('/member/barangTiba', $u->id)}}" class="btn btn-success btn-icon-split">konfirmasi barang tiba
                                        </a>
                                    </center>
                                    @endif
                                    </td>

                                    

                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5"><center>KOSONG</center></td>
                                </tr>
                            @endif 
                            </tbody>
                        </table>
                        {{$log->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(isset($log))
@foreach( $log as $u )
<div class="modal" id="exampleModalCenter{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <tr>
                    <th>Tanggal Beli</th>
                    <td>: {{ $u->date_entry }}</td>
                </tr>
                <br/>
                <tr>
                    <th>Nama Penerima</th>
                    <td>: {{ $u->receiver_name }}</td>
                </tr>
                <br/>
                <tr>
                    <th>Alamat</th>
                    <td>: {{ $u->address }}</td>
                </tr>
                <br/>
                <tr>
                    <th>No Telfon</th>
                    <td>:{{ $u->phone_number }}</td>
                </tr>
                <br/>
                <tr>
                    <th>Total Pembelian</th>
                    <td>: {{ $u->total_amount }}</td>
                </tr>
                <br/>
                <tr>
                    <th>Payment</th>
                    <td>: </td>
                </tr>
                <br/>
                <tr>
                    <th>Courier</th>
                    <td>: </td>
                </tr>
                <br/>
                <tr>
                    <th>Nama Product</th>
                    <td>: {{ $u->product->name }}</td>
                </tr>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
@endsection