@extends('backend.layouts.index', ['active' => 'list_user'])
@section('title', 'User')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar member</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">User</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Daftar User</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <form action="" method="GET">
                    <div class="customize-input">
                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                            type="search" placeholder="cari email" aria-label="Search" name="search">
                        <i class="form-control-icon" data-feather="search" type="submit"></i>
                    </div>
                </form>
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
                                    <th class="text-center">No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Nama Toko</th>
                                    <th>Alamat</th>
                                    <th>Phone</th>
                                    <th>Tipe User</th>
                                    <th>Deposit</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($user) != 0)
                                @foreach ($user as $key =>$u)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->store_name}}</td>
                                    <td>{{$u->address}}</td>
                                    <td>{{$u->phone}}</td>
                                    <td>{{$u->user_type}}</td>
                                    <td>{{$u->deposit}}</td>
                                    <td>
                                        <center>
                                            <a type="button" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$u->id}}"><i class="fas fa-edit" style="padding: 5px;"></i></a>

                                            <a href="{{action('backend\admin\UserController@delete', $u->id)}}"class="btn btn-danger btn-icon-split btn-sm" style="font-size: xx-small;">
                                                 <i class="fas fa-trash" style="padding: 5px;"></i> 
                                            </a>
                                        </center>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9"><center>KOSONG</center></td>
                                </tr>
                            @endif 
                        </tbody>
                    </table>
                    {{$user->render()}}
                </div>
            </div>
        </div>
    </div>
</div>

@if(isset($user))
@foreach( $user as $u )
<div class="modal" id="exampleModalCenter{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form novalidate="novalidate" method="POST" action= "{{action('backend\admin\UserController@edit', $u->id)}}">
                    {{ csrf_field() }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama Toko</label>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="" name="store_name" required style="width: 100%" value="{{ucfirst($u->store_name)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="" name="address" required style="width: 100%" value="{{ucfirst($u->address)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>No. HP</label>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control pull-right" id="" name="phone" required style="width: 100%" value="{{ucfirst($u->phone)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Deposit</label>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="" name="deposit" required style="width: 100%" value="{{ucfirst($u->deposit)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info" id="btn_submit">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif

@endsection