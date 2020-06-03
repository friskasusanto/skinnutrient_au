<?php

namespace App\Http\Controllers\backend\reseller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductReseller;
use Auth;
use Validator;

class LogController extends Controller
{
	public function ListPenjualan ()
	{
		$reseller = ProductReseller::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
		return view('backend.reseller.log.listPenjualan', compact('reseller'));
	}
    public function logPenjualan ()
    {
    	$product = Product::all();
    	return view('backend.reseller.log.logPenjualan', compact('product'));
    }
    public function insert(Request $request){
        if($request->ajax())
         {
          $rules = array(
           'product_id.*'  => 'required',
           'jumlah.*'  => 'required',
          );
          $error = Validator::make($request->all(), $rules);
          if($error->fails())
          {
           return response()->json([
            'error'  => $error->errors()->all()
           ]);
          }

          $product_id = $request->product_id;
          $jumlah = $request->jumlah;

          for($count = 0; $count < count($product_id); $count++)
          {
           $data = array(
            'product_id' => $product_id[$count],
            'jumlah'  => $jumlah[$count],
            'user_id'  => Auth::user()->id,
            'tgl_input' => date('Y-m-d H:i:s'),
           );

           $insert_data[] = $data; 

          }

          ProductReseller::insert($insert_data);
          return response()->json([
           'success'  => 'Data Added successfully.'
          ]);
         }
        
    }
}
