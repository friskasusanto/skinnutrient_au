@extends('backend.layouts.index', ['active' => 'biodata_member'])
@section('title', 'Biodata Member')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Diri</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Member</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Data diri</li>
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
                                    <th>Nama</th>
                                    <th>: {{Auth::user()->name}}</th>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <th>: {{Auth::user()->email}}</th>
                                </tr>
                            @role('Reseller')
                                <tr>
                                    <th>Nama Toko</th>
                                @if (Auth::user()->store_name == null)
                                    <th>-</th>
                                @else
                                    <th>: {{Auth::user()->store_name}}</th>
                                @endif
                                </tr>
                            @endrole
                            @role('Dropshiper')
                                <tr>
                                    <th>Nama Toko</th>
                                @if (Auth::user()->store_name == null)
                                    <th>-</th>
                                @else
                                    <th>: {{Auth::user()->store_name}}</th>
                                @endif
                                </tr>
                            @endrole
                                <tr>
                                    <th>Alamat</th>
                                    <th>: {{Auth::user()->address}}</th>
                                </tr>
                                <tr>
                                    <th>No Hp</th>
                                    <th>: {{Auth::user()->phone}}</th>
                                </tr>
                                <tr>
                                    <th>Deposit</th>
                                @if (Auth::user()->deposit == null)
                                    <th>: Rp. 0</th>
                                @else
                                    <th>: Rp. {{Auth::user()->deposit}}</th>
                                @endif
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