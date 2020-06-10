<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Log;
use Auth;

class CategoriController extends Controller
{
    //CATEGORI
    public function index ()
    {
    	$category = Category::paginate(10);

    	return view('backend.admin.category.index', compact(['category']));
    }

    public function edit_view (Request $request, $id)
    {
    	$category = Category::find($id);
    	return view('backend.admin.category.edit', compact(['category']));
    }

    public function edit (Request $request, $id)
    {
    	$status = 200;
        $message = "Data Berhasil di Update";
    	$edit = Category::find($id);
    	$edit->category_name = $request->category_name;
    if ($request->status == null){
        $edit->status = $edit->status;
    }elseif($request->status != null){
        $edit->status = $request->status;
    }
    	$edit->save();

        $log = new Log;
        $log->mutasi_action = "edit category ";
        $log->user_id = Auth::user()->id;
        $log->controller = "CategoriController";
        $log->function = "edit";
        $log->keterangan = "edit category berhasil, nama category ". $edit->category_name;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect('/admin/category/index')->with(['flash_status' => $status,'flash_message' => $message]);
    }
    public function add_view ()
    {
    	return view('backend.admin.category.add');
    }

    public function add (Request $request)
    {
    	$status = 200;
        $message = "Data Berhasil di Tambah";
    	$add = new Category;
    	$add->category_name = $request->category_name;
    	$add->save();

        $log = new Log;
        $log->mutasi_action = "tambah category ";
        $log->user_id = Auth::user()->id;
        $log->controller = "CategoriController";
        $log->function = "add";
        $log->keterangan = "tambah category berhasil, nama category ". $add->category_name;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect('/admin/category/index')->with(['flash_status' => $status,'flash_message' => $message]);
    }

    public function delete (Request $request, $id)
    {
    	$status = 500;
        $message = "Data Berhasil di Hapus";
    	$delete = Category::find($id);
    	$delete->delete();

        $log = new Log;
        $log->mutasi_action = "hapus category ";
        $log->user_id = Auth::user()->id;
        $log->controller = "CategoriController";
        $log->function = "delete";
        $log->keterangan = "hapus category berhasil dengan nama category ". $delete->category_name;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);

    }
}
