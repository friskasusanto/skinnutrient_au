@extends('backend.layouts.index', ['active' => 'list_blog'])
@section('title', 'Blog')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Blog</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Blog</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Daftar Blog</li>
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
                                    <th>Judul</th>
                                    <th>Isi Blog</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Gambar Blog</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($blog) != 0)
                                @foreach ($blog as $key =>$u)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$u->judul}}</td>
                                    <td>{!!substr($u->text,0,50)!!} ...</td>
                                    <td>{{$u->tgl_input}}</td>
                                    <td><center>
                                        <img src="{{{url('blog/'.$u->images)}}}" alt="..." style="width: 50%"></center>
                                    </td>
                                    <td>
                                    @if ($u->status == 0)
                                        <button class="btn btn-success btn-icon-split btn-sm">active</button>
                                    @else 
                                        <button class="btn btn-danger btn-icon-split btn-sm">tidak active</button>
                                    @endif
                                    </td>
                                    <td>
                                    <center>
                                        <a href="{{action('backend\admin\BlogController@edit_view', $u->id)}}" class="btn btn-warning btn-icon-split btn-sm" style="font-size: xx-small;">
                                            <i class="fa fa-edit" style="padding: 5px;"></i>
                                        </a>
                                        <a href="{{action('backend\admin\BlogController@delete', $u->id)}}" class="btn btn-danger btn-icon-split btn-sm" style="font-size: xx-small;">
                                            <i class="fa fa-trash" style="padding: 5px;"></i>
                                        </a>
                                    </center>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7"><center>KOSONG</center></td>
                                </tr>
                            @endif 
                            </tbody>
                        </table>
                        {{$blog->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection