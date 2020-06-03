<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payment;
use App\Log;
use Auth;

class PaymentController extends Controller
{
    //Payment
    public function index ()
    {
    	$payment = Payment::paginate(10);
    	return view('backend.admin.payment.index', compact(['payment']));
    }

    public function edit_view (Request $request, $id)
    {
    	$payment = Payment::find($id);
    	return view('backend.admin.payment.edit', compact(['payment']));
    }

    public function edit (Request $request, $id)
    {
    	$status = 200;
        $message = "Data Berhasil di Update";
    	$edit = Payment::find($id);
    	$edit->name = $request->name;
    	$edit->save();

        $log = new Log;
        $log->mutasi_action = "edit payment ";
        $log->user_id = Auth::user()->id;
        $log->controller = "PaymentController";
        $log->function = "edit";
        $log->keterangan = "edit payment berhasil, user id ". Auth::user()->id;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect('/admin/payment/index')->with(['flash_status' => $status,'flash_message' => $message]);
    }
    public function add_view (Request $request)
    {
    	$payment = Payment::all();
    	return view('backend.admin.payment.add', compact(['payment']));
    }

    public function add (Request $request)
    {
    	$status = 200;
        $message = "Data Berhasil di Tambah";
    	$edit = new Payment;
    	$edit->name = $request->name;
    	$edit->save();

        $log = new Log;
        $log->mutasi_action = "tambah payment ";
        $log->user_id = Auth::user()->id;
        $log->controller = "paymentController";
        $log->function = "add";
        $log->keterangan = "tambah payment berhasil, user id ". Auth::user()->id;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect('/admin/payment/index')->with(['flash_status' => $status,'flash_message' => $message]);
    }

    public function delete (Request $request, $id)
    {
    	$status = 500;
        $message = "Data Berhasil di Hapus";
    	$delete = Payment::find($id);
    	$delete->delete();

        $log = new Log;
        $log->mutasi_action = "hapus payment ";
        $log->user_id = Auth::user()->id;
        $log->controller = "PaymentController";
        $log->function = "delete";
        $log->keterangan = "hapus Payment berhasil";
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);

    }
}
