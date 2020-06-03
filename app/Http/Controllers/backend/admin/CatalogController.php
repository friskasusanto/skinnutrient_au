<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Catalog;
use App\Product;
use App\Log;
use Auth;

class CatalogController extends Controller
{
    //CATALOG
    public function index ()
    {
    	$catalog = Catalog::paginate(10);
    	return view('backend.admin.catalog.index', compact(['catalog']));
    }

    public function edit_view (Request $request, $id)
    {
        $product = Product::all();
    	$catalog = Catalog::find($id);
    	return view('backend.admin.catalog.edit', compact(['catalog', 'product']));
    }

    public function edit (Request $request, $id)
    {
    	$status = 200;
        $message = "Data Berhasil di Update";
    	$edit = Catalog::find($id);
    if ($request->product_id == null){
    	$edit->produk_id = $edit->product_id;
    }elseif ($request->product_id != null){
        $edit->produk_id = $request->product_id;
    }
    	$edit->price_user = $request->price_user;
    	$edit->date_entry = date('Y-m-d H:i:s');
    	// $edit->status = $request->status;
    	$edit->save();

        $log = new Log;
        $log->mutasi_action = "edit catalog ";
        $log->user_id = Auth::user()->id;
        $log->controller = "CatalogController";
        $log->function = "edit";
        $log->keterangan = "edit catalog berhasil, user id ". Auth::user()->id;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect('/admin/catalog/index')->with(['flash_status' => $status,'flash_message' => $message]);
    }
    public function add_view (Request $request)
    {
        $product = Product::all();
    	return view('backend.admin.catalog.add', compact(['product']));
    }

    public function add (Request $request)
    {
    	$status = 200;
        $message = "Data Berhasil di Tambah";
    	$edit = new Catalog;
    	$edit->produk_id = $request->product_id;
    	$edit->user_id = Auth::user()->id;
    	$edit->price_user = $request->price_user;
    	$edit->date_entry = date('Y-m-d H:i:s');
    	$edit->status = 1;
    	$edit->save();

        $log = new Log;
        $log->mutasi_action = "tambah catalog ";
        $log->user_id = Auth::user()->id;
        $log->controller = "CatalogController";
        $log->function = "add";
        $log->keterangan = "tambah catalog berhasil, user id ". Auth::user()->id;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect('/admin/catalog/index')->with(['flash_status' => $status,'flash_message' => $message]);
    }

    public function delete (Request $request, $id)
    {
    	$status = 200;
        $message = "Data Berhasil di Hapus";
    	$delete = Catalog::find($id);
    	$delete->delete();

        $log = new Log;
        $log->mutasi_action = "hapus catalog ";
        $log->user_id = Auth::user()->id;
        $log->controller = "CatalogController";
        $log->function = "delete";
        $log->keterangan = "hapus catalog berhasil dengan product id ". $delete->product_id;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);

    }
}
