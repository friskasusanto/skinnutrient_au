@extends('backend.layouts.index', ['active' => 'barang_dibeli'])
@section('title', 'LogMember')
@section('content')

<style>
    body {font-family: Arial, Helvetica, sans-serif;}

    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
</style>

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
                                            <a href="{{url('/member/show', $u->id)}}" class="btn btn-success btn-sm" style="width: 50%"><i class="fa fa-eye"></i></a>
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
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p><center>Tambah Barang</center></p>
    <br/>
    <br/>

    <p id="detail-product"></p>
    <p>jajal</p>
  </div>

</div>

@endsection

@section('content-js')
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

    $(function(){
        $("#myBtn").click(function(){
            var barang = $("#barang").val();
            // alert(barang);
            $.get("{{url('/member/show/')}}"+'/'+'$log->id', function(data){
                // alert(data);
                // console.log(data);
                $("#id").val(data.data.id);
                $("#detail-product")
                .append("<b>Nama Produk:</b> "+data.data.name)
                .append("<p>"+"<b>Harga Produk:</b> "+data.data.price+"</p>")
                .append("<p>"+"<b>Deskripsi Produk:</b> "+data.data.description+"</p>")
                .append("<p>"+"<b>Stok Produk: </b>"+data.data.stock+"</p>");
            });
        });
    });
</script>
@endsection