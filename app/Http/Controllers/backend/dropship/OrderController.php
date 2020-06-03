<?php

namespace App\Http\Controllers\backend\dropship;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Payment;
use App\Checkout;

class OrderController extends Controller
{
    public function index ()
    {
    	return view ('backend.dropshiper.quick_order.index');
    }

    public function tambah_list(Request $request)
    {
    	$product = Product::get();
    	$payment = Payment::get();

    	return view ('backend.dropshiper.quick_order.tambah_product', compact('product', 'payment', 'findProduct'));
    }

    public function getProduct($id)
    {
        $product = Product::find($id);
        return ['status' => 200, 'data' => $product];
    }

    public function add (Request $request, $id)
    {
        $status = 200;
        $message = "Berhasil Order Barang";
    	$add = New Checkout;
    	$add->date_entry = date('Y-m-d H:i:s');
    	$add->user_id = Auth::user()->id;
    	$add->receiver_name = $request->receiver_name;
    	$add->address = $request->address;
    	$add->phone_number = $request->phone_number;
    	$add->total_amount = $request->total * $product->price;
    	$add->payment_id = $request->payment_id;
    	$add->courier = $request->courier;
        $add->product_id = $request->product_id;
        $add->save();

        $log = new Log;
        $log->mutasi_action = "order product id ". $request->product_id;
        $log->user_id = Auth::user()->id;
        $log->controller = "OrderController";
        $log->function = "add";
        $log->keterangan = "order berhasil";
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

        return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    }
}
