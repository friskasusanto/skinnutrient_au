<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Checkout;
use App\Log;
use Auth;

class CheckoutController extends Controller
{
    //CHECKOUT
	public function index_checkout ()
    {
    	// $search = \Request::get('search');
    	$checkout = Checkout::paginate(10);
    	return view('backend.admin.checkout.index', compact(['checkout']));
    }

    public function approve_admin (Request $request, $id)
    {
    	$status = 200;
        $message = "Order di Setujui Admin";
    	$status = Checkout::find($id);
    	$status->status = 2;
    	$status->save();

    	$log = new Log;
        $log->mutasi_action = "approve product by admin ";
        $log->user_id = Auth::user()->id;
        $log->controller = "CheckoutController";
        $log->function = "approve_admin";
        $log->keterangan = "product id ". $status->product_id;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    }

    public function pengiriman_barang (Request $request, $id)
    {
    	$status = 200;
        $message = "Barang dalam pengiriman";
    	$status = Checkout::find($id);
    	$status->status = 3;
    	$status->save();

    	$log = new Log;
        $log->mutasi_action = "Barang proses pengiriman";
        $log->user_id = Auth::user()->id;
        $log->controller = "CheckoutController";
        $log->function = "pengiriman_barang";
        $log->keterangan = "pengiriman dengan product id ". $status->product_id;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    }

    public function reject_admin (Request $request, $id)
    {
    	$status = 500;
        $message = "Order di Tolak";
    	$status = Checkout::find($id);
    	$status->status = 1;
    	$status->save();

    	$log = new Log;
        $log->mutasi_action = "Order di tolak admin";
        $log->user_id = Auth::user()->id;
        $log->controller = "CheckoutController";
        $log->function = "reject_admin";
        $log->keterangan = "di tolak dengan product id ". $status->product_id;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    }
    public function detail_checkout (Request $request, $id)
    {
    	$checkout = Checkout::find($id);
    	return view('backend.admin.checkout.detail', compact(['checkout']));
    }
}
