@extends('backend.layouts.index', ['active' => 'biodata_member'])
@section('title', 'Biodata Member')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Detail Order</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Dropshiper</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Detail Order</li>
                    </ol>
                </nav>
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
                            <tbody>
                                <tr>
                                    <th>Barang</th>
                                    <th>: {{$checkout->product->name}}</th>
                                </tr>
                                <tr>
                                    <th>Tanggal Masuk</th>
                                    <th>: {{$checkout->entry_date}}</th>
                                </tr>
                                <tr>
                                    <th>Nama Pemesan</th>
                                    <th>: {{$checkout->user->name}}</th>
                                </tr>
                                <tr>
                                    <th>Nama Penerima</th>
                                    <th>: {{$checkout->receiver_id}}</th>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <th>: {{$checkout->address}}</th>
                                </tr>
                                <tr>
                                    <th>No HP</th>
                                    <th>: {{$checkout->phone_number}}</th>
                                </tr>
                                <tr>
                                    <th>Total Tagihan</th>
                                    <th>: {{$checkout->Total_amount}}</th>
                                </tr>
                                <tr>
                                    <th>Payment</th>
                                    <th>: </th>
                                </tr>
                                <tr>
                                    <th>Tanggal payment</th>
                                    <th>: {{$checkout->payment_date}}</th>
                                </tr>
                                <tr>
                                    <th>Courier</th>
                                    <th>: {{$checkout->courier}}</th>
                                </tr>
                                <tr>
                                    <th>Harga Courier</th>
                                    <th>: {{$checkout->courier_price}}</th>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <th>: {{$checkout->status}}</th>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection