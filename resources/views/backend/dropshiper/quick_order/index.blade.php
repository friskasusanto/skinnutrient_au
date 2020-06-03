@extends('backend.layout.index', ['active' => 'try'])
@section('title', 'Try')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Quick Order List</h1>
        </div>
        <!-- Topbar Search -->
        <div class="row">
            <div class="col-lg-8"></div>
            <div class="col-lg-4">
                <form action="" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control bg-white small" placeholder="Cari Produk" aria-label="Search" aria-describedby="basic-addon2" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                              <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Produk</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Berat</th>
                        <th>Total</th>
                        <th>Cek Gambar</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection