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
<!-- <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      ...
    </div>
  </div>
</div> -->
<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <p class="text-center">
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 -->
<!-- Modal -->
<div class="modal modal-danger fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <p for="cat_id"></p>
    </div>
  </div>
</div>

@endsection

@section('content-js')
<!-- <script>
    $(document).ready(function(){
        $("#myModal").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('target-id');
            $.get( "/dropship/load/" + id, function( data ) {
                $(".modal-body").html(data.html);
                .append("<b>Nama Produk:</b> "+data.name)
                .append("<p>"+"<b>Harga Produk:</b> "+data.price+"</p>")
                .append("<p>"+"<b>Deskripsi Produk:</b> "+data.description+"</p>")
                .append("<p>"+"<b>Stok Produk: </b>"+data.stock+"</p>");
            });

        });
    });
</script> -->
<script>
    $('#myModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var cat_id = button.data('catid')
      var id = $(this).attr("id"); 
      var modal = $(this)
      modal.find('.modal-body #cat_id').val(cat_id);
})
</script>
@endsection