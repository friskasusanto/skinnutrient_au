@extends('backend.layouts.index', ['active' => 'barang_dibeli'])
@section('title', 'LogMember')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Barang Dibeli</h1>
        </div>
        <!-- Topbar Search -->
        <!-- <div class="row">
            <div class="col-lg-8"></div>
            <div class="col-lg-4">
                <form action="" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control bg-white small" placeholder="cari nama product" aria-label="Search" aria-describedby="basic-addon2" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                              <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Product</th>
                        <th>Detail Order</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($log) != 0)
                    @foreach ($log as $key =>$u)
                    <tr class="post{{$u->id}}">
                        <td>{{++$key}}</td>
                        <td>{{$u->product->name}}</td>
                        <td>
                            <center>
                                <!-- <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" style="width: 50%" id="{{$u->id}}" data-id="{{$u->id}}"><i class="fa fa-eye"></i></a> -->
                                <center>
                                    <a type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter{{$u->id}}"><i class="fa fa-eye"></i></a>
                                </center>

                                <a href="{{url('/dropship/detailOrder', $u->id)}}" class="btn btn-success btn-sm" style="width: 50%"><i class="fa fa-eye"></i></a>
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
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4"><center>KOSONG</center></td>
                    </tr>
                @endif 
                </tbody>
            </table>
            {{$log->render()}}
        </div>
    </div>
</div>
@if(isset($log))
@foreach( $log as $u )
<div class="modal" id="exampleModalCenter{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                        <tbody>
                            <tr>
                                <th>Barang</th>
                                <th>: {{$u->product->name}}</th>
                            </tr>
                            <tr>
                                <th>Tanggal Masuk</th>
                                <th>: {{$u->entry_date}}</th>
                            </tr>
                            <tr>
                                <th>Nama Pemesan</th>
                                <th>: {{$u->user->name}}</th>
                            </tr>
                            <tr>
                                <th>Nama Penerima</th>
                                <th>: {{$u->receiver_id}}</th>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <th>: {{$u->address}}</th>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <th>: {{$u->phone_number}}</th>
                            </tr>
                            <tr>
                                <th>Total Tagihan</th>
                                <th>: {{$u->Total_amount}}</th>
                            </tr>
                            <tr>
                                <th>Payment</th>
                                <th>: </th>
                            </tr>
                            <tr>
                                <th>Tanggal payment</th>
                                <th>: {{$u->payment_date}}</th>
                            </tr>
                            <tr>
                                <th>Courier</th>
                                <th>: {{$u->courier}}</th>
                            </tr>
                            <tr>
                                <th>Harga Courier</th>
                                <th>: {{$u->courier_price}}</th>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <th>: {{$u->status}}</th>
                            </tr>


                        </tbody>
                    </table>
                </div>
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