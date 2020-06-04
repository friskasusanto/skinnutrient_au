@extends('backend.layouts.index', ['active' => 'dasboard'])
@section('title', 'Dasboard')
@section('content')

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Hallo, {{Auth::user()->name}}!</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                    </li>
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
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                @role ('Admin')
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">Rp. {{$perbulan}}</h2>
                                        <!-- <span
                                            class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none"></span> -->
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Penjualan (Perbulan)</h6>
                                @endrole
                                @role ('Member')
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">{{count(App\Checkout::where('user_id', Auth::user()->id)->where('status', 2)->get())}} barang</h2>
                                        <!-- <span
                                            class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none"></span> -->
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Order dalam Proses</h6>
                                @endrole
                                @role ('Dropshiper')
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">0 barang</h2>
                                        <!-- <span
                                            class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none"></span> -->
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Penjualan (Perbulan)</h6>
                                @endrole
                                @role ('Reseller')
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">0 barang</h2>
                                        <!-- <span
                                            class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none"></span> -->
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Penjualan (Perbulan)</h6>
                                @endrole
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                @role ('Admin')
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">Rp. {{$perhari}}</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Penjualan (Perhari)</h6>
                                @endrole
                                @role ('Member')
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{count(App\Checkout::where('user_id', Auth::user()->id)->where('status', 0)->get())}} barang</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pembelian</h6>
                                @endrole
                                @role ('Dropshiper')
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">0 barang</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Penjualan (Perhari)</h6>
                                @endrole
                                @role ('Reseller')
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">0 barang</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Penjualan (Perhari)</h6>
                                @endrole
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                @role ('Admin')
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">{{$usersall}} User</h2>
                                        <<!-- span
                                            class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span> -->
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah User</h6>
                                @endrole
                                @role ('Member')
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">Status</h2>
                                        <<!-- span
                                            class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span> -->
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Member EAORON</h6>
                                @endrole
                                @role ('Dropshiper')
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">Status</h2>
                                        <<!-- span
                                            class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span> -->
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Dropshiper EAORON</h6>
                                @endrole
                                @role ('Reseller')
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">Status</h2>
                                        <<!-- span
                                            class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span> -->
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Reseller EAORON</h6>
                                @endrole
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                @role ('Admin')
                                    <h2 class="text-dark mb-1 font-weight-medium">864 pengunjung</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Pengunjung</h6>
                                @endrole
                                @role ('Member')
                                    <h2 class="text-dark mb-1 font-weight-medium">Rp. {{Auth::user()->deposit}}</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Deposit</h6>
                                @endrole
                                @role ('Dropshiper')
                                    @if (Auth::user()->store_name != null)
                                        <h2 class="text-dark mb-1 font-weight-medium">Toko {{Auth::user()->store_name}}</h2>
                                    @else
                                        <h2 class="text-dark mb-1 font-weight-medium">Silahkan Isi Nama Toko</h2>
                                    @endif
                                @endrole
                                @role ('Reseller')
                                    @if (Auth::user()->store_name != null)
                                        <h2 class="text-dark mb-1 font-weight-medium">Toko {{Auth::user()->store_name}}</h2>
                                    @else
                                        <h2 class="text-dark mb-1 font-weight-medium">Silahkan Isi Nama Toko</h2>
                                    @endif
                                @endrole
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End First Cards -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Sales Charts Section -->
                <!-- *************************************************************** -->
                <div class="row">
                    @role ('Dropshiper')
                    @if (Auth::user()->store_name == null)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Column -->
                                    <div class="col-md-12 col-lg-12 col-xlg-12">
                                        <div class="alert alert-primary">
                                            <center><h6 class="text-black">NAMA TOKO</h6></center>
                                            <form class="form" method="POST" action= "{{url('/storeName', Auth::user()->id)}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input id="store_name" class="input-text" type="text" value="" name="store_name" style="width: 100%">
                                                <center><button type="submit" class="btn waves-effect waves-light btn-rounded btn-secondary" style="margin-top: 2%">Simpan</button></center>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endrole

                    @role ('Reseller')
                    @if (Auth::user()->store_name == null)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Column -->
                                    <div class="col-md-12 col-lg-12 col-xlg-12">
                                        <div class="alert alert-primary">
                                            <center><h6 class="text-black">NAMA TOKO</h6></center>
                                            <form class="form" method="POST" action= "{{url('/storeName', Auth::user()->id)}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input id="store_name" class="input-text" type="text" value="" name="store_name" style="width: 100%">
                                                <center><button type="submit" class="btn waves-effect waves-light btn-rounded btn-secondary" style="margin-top: 2%">Simpan</button></center>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endrole

                    @role('Member')
                    @if (count(App\Checkout::where('user_id', Auth::user()->id)->get()) != 0)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Column -->
                                    <div class="col-md-12 col-lg-12 col-xlg-12">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-danger text-center">
                                                <h6 class="text-white">Anda Memiliki beberapa barang pesanan dari EAORON, Mohon Konfirmasi Jika Barang Pesanan Sudah Tiba !</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endrole

                    @role('Admin')
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Net Income</h4>
                                    <canvas id="myChart" width="100" height="100"></canvas>
                                    <ul class="list-inline text-center mt-5 mb-2">
                                        <li class="list-inline-item text-muted font-italic">Sales for this month</li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                    @endrole
                </div>
                <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
<script src="{{asset('backend/cart/Chart.bundle.js')}}"></script>
<style type="text/css">
    .container {
        width: 50%;
        margin: 15px auto;
    }
</style>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });
</script>
@endsection