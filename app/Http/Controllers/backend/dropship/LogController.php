<?php

namespace App\Http\Controllers\backend\dropship;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Checkout;
use App\Product;
use Auth;

class LogController extends Controller
{
    public function log(Request $request)
    {
    	$log = Checkout::with('product')->where('user_id', Auth::user()->id)->paginate(10);
        $logarray = Checkout::with('product')->where('user_id', Auth::user()->id)->pluck('id')->toArray();
        // $checkout = Checkout::find($request->id)->with('product');
    	return view('backend.dropshiper.log.logOrder', compact(['log']));
    }

    public function detail($id)
    {
        $checkout = Checkout::find($id);
        return view('backend.dropshiper.log.detail', compact(['checkout']));    }

    public function try($id)
    {
        $product = Product::find($id);
        return ['status' => 200, 'data' => $product];
    }
    // public function barangTiba (Request $request, $id)
    // {
    // 	$status = 200;
    //     $message = "Terimakasih Telah Berbelanja Product EAORON";

    // 	$barang = Checkout::find($id);
    // 	$barang->status = 4;
    // 	$barang->save();

    // 	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);

    // }
}