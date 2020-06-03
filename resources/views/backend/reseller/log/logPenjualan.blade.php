@extends('backend.layouts.index', ['active' => 'barang_dibeli'])
@section('title', 'LogMember')
@section('content')


<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Report Penjualan</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Reseller</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Report Penjualan</li>
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form form-validate floating-label" novalidate="novalidate" method="POST" id="dynamic_form">
                        {{ csrf_field() }}
                        <table id="dinamic" class="table-bordered table-striped" width="100%" style="width: -webkit-fill-available;">
                            <thead>
                                <tr>
                                    <th rowspan="5" width="50%">Product</th>
                                    <th rowspan="5" width="50%" class="text-center">Jumlah</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="body-table">
                            </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" align="right">&nbsp;</td>
                                        <td>
                                            @csrf
                                            <center>
                                                <button type="submit" name="add" id="save" class="btn btn-primary btn-icon-split btn-sm"><i class="fas fa-check" style="padding: 5px;"></i></button>
                                            </center>
                                        </td>
                                    </tr>
                                </tfoot>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
<script>

$(document).ready(function(){
 var count = 1;
 dynamic_field(count);
 function dynamic_field(number)
 {
  html = '<tr>';
         html += '<td><center><select name="product_id[]" class="coba-select" id="product_id" type="text"><option value="" >--Pilih Product--</option>@foreach ($product as $key => $l)<option value= "{{$l->id}}" >{!! ucfirst($l->name) !!}</option>@endforeach</select></center></td>';
         html += '<td><center><input type="text" name="jumlah[]" class="form-control" id="jumlah" value=""/></center></td>';
        if(number > 1)
        {
            html += '<td class="text-center"><button type="button" name="remove" id="" class="btn btn-danger btn-icon-split btn-sm remove"><i class="fas fa-trash" style="padding: 5px;"></i></button></td></tr>';
            $('#body-table').append(html);
        }
        else
        {   
            html += '<td class="text-center"><button type="button" name="add" id="add" class="btn btn-success btn-icon-split btn-sm"><i class="fas fa-plus" style="padding: 5px;"></i></button></td></tr>';
            $('#body-table').html(html);
        }
 }

 $(document).on('click', '#add', function(){
  count++;
  dynamic_field(count);
 });

 $(document).on('click', '.remove', function(){
  count--;
  $(this).closest("tr").remove();
 });

 $('#dynamic_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:'{{ url("/reseller/insertPenjualan") }}',
            method:'post',
            data:$(this).serialize(),
            beforeSend:function(){
                $('#save').attr('disabled','disabled');
            },
            success:function(data)
            {
                console.log(data);
                if(data.error)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<p>'+data.error[count]+'</p>';
                    }
                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                }
                else
                {
                    dynamic_field(1);
                    // $('#result').html('<div class="alert alert-success">'+data.success+'</div>');

                    swal({   
                        title: "Success !",   
                        text: "Berhasil Input Data Penjualan",   
                        showConfirmButton: false ,
                        showCloseButton: true,
                        footer: ''
                    });
                }
                $('#save').attr('disabled', true);
            }
        })
 });

});
</script>
@endsection