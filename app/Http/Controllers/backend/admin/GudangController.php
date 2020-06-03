<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gudang;
use App\Log;
use App\Product;
use Auth;

class GudangController extends Controller
{
    //GUDANG
    public function index ()
    {
    	$gudang = Gudang::paginate(10);
    	return view('backend.admin.gudang.index', compact(['gudang']));
    }

    public function edit_view (Request $request, $id)
    {
    	$gudang = Gudang::find($id);
        $product = Product::all();
    	return view('backend.admin.gudang.edit', compact(['gudang', 'product']));
    }

    public function edit (Request $request, $id)
    {
    	$status = 200;
        $message = "Data Berhasil di Update";
    	$edit = Gudang::find($id);
        
    if ($request->product_id == null){
        $edit->product_id = $edit->product_id;
    }elseif ($request->status != null){
        $edit->product_id = $request->product_id;
    }
    	$edit->jumlah = $request->jumlah;
    	$edit->keterangan = $request->keterangan;
    	$edit->tgl_input = date('Y-m-d H:i:s');

    if ($request->status == null){
        $edit->status = $edit->status;
    }elseif ($request->status != null){
    	$edit->status = $request->status;
    }
    	$edit->save();

    	$product = Product::where('id', $edit->product_id)->first();
        // dd($product);
    	$product->stock = $edit->jumlah;
    	$product->save();

        $log = new Log;
        $log->mutasi_action = "edit gudang ";
        $log->user_id = Auth::user()->id;
        $log->controller = "GudangController";
        $log->function = "edit";
        $log->keterangan = "edit guadang berhasil, user id ". Auth::user()->id;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect('/admin/gudang/index')->with(['flash_status' => $status,'flash_message' => $message]);
    }
    public function add_view (Request $request)
    {
    	$product = Product::all();
    	return view('backend.admin.gudang.add', compact(['product']));
    }

    public function add (Request $request)
    {
    	$status = 200;
        $message = "Data Berhasil di Tambah";
    	$edit = new Gudang;
    	$edit->product_id = $request->product_id;
    	$edit->user_id = Auth::user()->id;
    	$edit->status = $request->status;
    	$edit->jumlah = $request->jumlah;
    	$edit->tgl_input = date('Y-m-d H:i:s');
    	$edit->keterangan = $request->keterangan;
    	$edit->save();

        $log = new Log;
        $log->mutasi_action = "tambah gudang ";
        $log->user_id = Auth::user()->id;
        $log->controller = "GudangController";
        $log->function = "add";
        $log->keterangan = "tambah gudang berhasil, user id ". Auth::user()->id;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect('/admin/gudang/index')->with(['flash_status' => $status,'flash_message' => $message]);
    }

    public function delete (Request $request, $id)
    {
    	$status = 500;
        $message = "Data Berhasil di Hapus";
    	$delete = Gudang::find($id);
    	$delete->delete();

        $log = new Log;
        $log->mutasi_action = "hapus gudang ";
        $log->user_id = Auth::user()->id;
        $log->controller = "GudangController";
        $log->function = "delete";
        $log->keterangan = "hapus Gudang berhasil dengan product id ". $delete->product_id;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);

    }
}
