<?php

namespace App\Http\Controllers\backend\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Checkout;
use Auth;

class LogController extends Controller
{
    public function log(Request $request)
    {
    	$log = Checkout::where('user_id', Auth::user()->id)->paginate(10);
    	return view('backend.member.log.logBarang', compact(['log']));
    }
    public function barangTiba (Request $request, $id)
    {
    	$status = 200;
        $message = "Terimakasih Telah Berbelanja Product EAORON";

    	$barang = Checkout::find($id);
    	$barang->status = 4;
    	$barang->save();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);

    }
    // public function detailBarang (Request $request, $id)
    // {
    // 	$barang = Checkout::find($id);
    // 	return view('backend.member.log.detailBarang', compact(['barang']))->renderSections()['content'];
    // }

    public function show ($id)
    {
        $barang = Checkout::find($id);
        return view('backend.member.log.detailBarang', compact(['barang']));
    }
    public function getProduct($id)
    {
        $product = Product::find($id);
        return ['status' => 200, 'data' => $product];
    }
}
