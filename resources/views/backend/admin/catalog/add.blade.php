@extends('backend.layouts.index', ['active' => 'tambah_product'])
@section('title', 'User')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Catalog</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Catalog</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Catalog</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <a href="{{action('backend\admin\CatalogController@index')}}">
					<button type="button" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Daftar Catalog</button>
				</a>
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
                    @include('layouts._flash')
					@if (count($errors) > 0)
			        <div class="alert alert-danger">
			            <strong>Whoops!</strong> There were some problems with your input.<br><br>
			            <ul>
			                @foreach ($errors->all() as $error)
			                    <li>{{ $error }}</li>
			                @endforeach
			            </ul>
			        </div>
			        @endif
                    <form novalidate="novalidate" method="POST" action= "{{action('backend\admin\CatalogController@add')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Product</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <select name="product_id" type="text" class="form-control pull-right select2" style="width: 100%">
			                              <option value="">--pilih product--</option>
			                              @foreach ($product as $p)
			                              	<option value= "{{$p->id}}">{{$p->name}}</option>
			                              @endforeach
		                          	</select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Harga User</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" class="form-control pull-right" id="" placeholder="price" name="price_user"  required>
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
			</div> <!-- /content -->
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    function tandaPemisahTitik(b){
        var _minus = false;
        if (b<0) _minus = true;
        b = b.toString();
        b=b.replace(",","");
        b=b.replace("-","");
        c = "";
        panjang = b.length;
        j = 0;
        for (i = panjang; i > 0; i--){
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)){
        c = b.substr(i-1,1) + "," + c;
        } else {
        c = b.substr(i-1,1) + c;
        }
        }
        if (_minus) c = "-" + c ;
        return c;
        }

        function numbersonly(ini, e){
        if (e.keyCode>=49){
        if(e.keyCode<=57){
        a = ini.value.toString().replace(",","");
        b = a.replace(/[^\d]/g,"");
        b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
        ini.value = tandaPemisahTitik(b);
        return false;
        }
        else if(e.keyCode<=105){
        if(e.keyCode>=96){
        //e.keycode = e.keycode - 47;
        a = ini.value.toString().replace(",","");
        b = a.replace(/[^\d]/g,"");
        b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
        ini.value = tandaPemisahTitik(b);
        //alert(e.keycode);
        return false;
        }
        else {return false;}
        }
        else {
        return false; }
        }else if (e.keyCode==48){
        a = ini.value.replace(",","") + String.fromCharCode(e.keyCode);
        b = a.replace(/[^\d]/g,"");
        if (parseFloat(b)!=0){
        ini.value = tandaPemisahTitik(b);
        return false;
        } else {
        return false;
        }
        }else if (e.keyCode==95){
        a = ini.value.replace(",","") + String.fromCharCode(e.keyCode-48);
        b = a.replace(/[^\d]/g,"");
        if (parseFloat(b)!=0){
        ini.value = tandaPemisahTitik(b);
        return false;
        } else {
        return false;
        }
        }else if (e.keyCode==8 || e.keycode==46){
        a = ini.value.replace(",","");
        b = a.replace(/[^\d]/g,"");
        b = b.substr(0,b.length -1);
        if (tandaPemisahTitik(b)!=""){
        ini.value = tandaPemisahTitik(b);
        } else {
        ini.value = "";
        }

        return false;
        } else if (e.keyCode==9){
        return true;
        } else if (e.keyCode==17){
        return true;
        } else {
        //alert (e.keyCode);
        return false;
        }

        }

</script>
@endsection