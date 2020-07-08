<?php

namespace App\Http\Controllers\backend\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Log;
use Auth;

class MenuController extends Controller
{
    public function index ()
    {
    	$search = \Request::get('search');
    	$menu = Menu::where('name', 'like', '%'.$search.'%')->paginate(10);
    	return view('backend.admin.menu.index', compact('menu'));
    }

    public function addMenu (Request $request)
    {
    	$status = 200;
        $message = "Menu By Berhasil di Tambahkan";

    	$add = new Menu;
    	$add->name = $request->name;
    if ($request->status != null){
    	$add->status = $request->status;
    }else{
    	$add->status = '1';
    }
    	$add->save();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    }

    public function deleteMenu (Request $request, $id)
    {
    	$status = 200;
        $message = "Data Berhasil di Hapus";

        $delete = Menu::find($id);

        $log = new Log;
        $log->mutasi_action = "hapus menu by ";
        $log->user_id = Auth::user()->id;
        $log->controller = "MenuController";
        $log->function = "deleteMenu";
        $log->keterangan = "telah menghapus menu by".$delete->name;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save(); 

    	$delete->delete();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    }

    public function editMenu (Request $request, $id)
    {
    	$status = 200;
        $message = "Menu By berhasil di perbaharui";

    	$edit = Menu::find($id);
    	$edit->name = $request->name;
    if ($request->status != null) {
    	$edit->status = $request->status;
    }else{
    	$edit->status = $edit->status;
    }

    	$log = new Log;
        $log->mutasi_action = "edit kode promo";
        $log->user_id = Auth::user()->id;
        $log->controller = "MenuController";
        $log->function = "editMenu";
        $log->keterangan = "telah mengubah menu by".$edit->name;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save(); 

    	$edit->save();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    }
}
