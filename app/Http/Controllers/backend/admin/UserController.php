<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Log;
use Auth;

class UserController extends Controller
{
    //USER
    public function acountAcc (){
        $search = \Request::get('search');
        $user = User::where('email', 'like', '%'.$search.'%')->where('email_verified_at', null)->paginate(10);

        return view('backend.admin.emailKonfirmasi.index', compact(['user']));
    }
    public function emailKonfirmasi (Request $request, $id) 
    {
        $status = 200;
        $message = "Account Berhasil di Acc";
        $user = User::find($id);
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    }

    public function index ()
    {
    	$search = \Request::get('search');
    	$user = User::where('email', 'like', '%'.$search.'%')->paginate(10);

    	return view('backend.admin.user.index', compact(['user']));
    }

    public function edit_view (Request $request, $id)
    {
    	$user = User::find($id);
    	return view('backend.admin.user.edit', compact(['user']));
    }

    public function edit (Request $request, $id)
    {
    	$status = 200;
        $message = "Data Berhasil di Update";
    	$edit = User::find($id);
    	$edit->store_name = $request->store_name;
    	$edit->address = $request->address;
    	$edit->phone = $request->phone;
    	$edit->deposit = $request->deposit;
    	$edit->save();

        $log = new Log;
        $log->mutasi_action = "edit user ". $edit->name;
        $log->user_id = Auth::user()->id;
        $log->controller = "UserController";
        $log->function = "edit";
        $log->keterangan = "edit user berhasil";
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect('/admin/index')->with(['flash_status' => $status,'flash_message' => $message]);
    }

    public function delete (Request $request, $id)
    {
    	$status = 500;
        $message = "Data Berhasil di Hapus";
    	$delete = User::find($id);
    	$delete->delete();

        $log = new Log;
        $log->mutasi_action = "hapus user ". $delete->name;
        $log->user_id = Auth::user()->id;
        $log->controller = "UserController";
        $log->function = "delete";
        $log->keterangan = "hapus user berhasil";
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);

    }
}
