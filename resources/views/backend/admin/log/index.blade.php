@extends('backend.layouts.index', ['active' => 'list_log'])
@section('title', 'Log')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Log Admin</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Log Admin</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Daftar Log Admin</li>
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
                                    <th>Aksi</th>
                                    <th>User Id</th>
                                    <th>Controller</th>
                                    <th>Fungsi</th>
                                    <th>Keterangan</th>
                                    <th>Tgl Action</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($log) != 0)
                                @foreach ($log as $key =>$u)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$u->mutasi_action}}</td>
                                    <td>{{$u->user_id}}</td>
                                    <td>{{$u->controller}}</td>
                                    <td>{{$u->function}}</td>
                                    <td>{{$u->keterangan}}</td>
                                    <td>{{$u->tgl_action}}</td>
                                    <td>
                                    <center>
                                        <!-- <a href="{{action('backend\admin\GudangController@edit_view', $u->id)}}" class="btn btn-warning btn-icon-split btn-sm" style="font-size: xx-small;">
                                            <i class="fa fa-edit" style="padding: 5px;"></i>
                                        </a>
                                        <a href="{{action('backend\admin\GudangController@delete', $u->id)}}" class="btn btn-danger btn-icon-split btn-sm" style="font-size: xx-small;">
                                            <i class="fa fa-trash" style="padding: 5px;"></i>
                                        </a> -->
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
                        {{$log->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection