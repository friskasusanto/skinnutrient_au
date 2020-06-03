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
                            <thead>
                                <tr>
                                    <th>Tanggal Beli</th>
                                    <td>{{ $barang->date_entry }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Penerima</th>
                                    <td>{{ $barang->receiver_name }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $barang->address }}</td>
                                </tr>
                                <tr>
                                    <th>No Telfon</th>
                                    <td>{{ $barang->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Total Pembelian</th>
                                    <td>{{ $barang->total_amount }}</td>
                                </tr>
                                <tr>
                                    <th>Payment</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Courier</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Nama Product</th>
                                    <td>{{ $barang->product->name }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection