<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Wishlist;
use App\User;

class WishlistController extends Controller
{
//WISHLIST
    public function ubah (Request $request, $id)
    {
        $status = 200;
        $message = "Berhasil memperbaharui data";

        $cart = Wishlist::find($id);
        $product = Product::where('id', $cart->product_id)->first();
        // dd($cart);
        $cart->jumlah = $request->jumlah;
        $cart->total_amount = $product->price * $request->jumlah;
        $cart->save();

        return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    }
    public function chart_view (Request $request, $name)
    {
        $cart = Wishlist::where('user_id', Auth::user()->id)->where('status', 0)->get();
        return view('frontend.cart', compact('cart'));
    }
    public function add_chart (Request $request, $id)
    {
    	if (Auth::check()) {
            $user = Auth::user();

            if ( $user->is_dropship() && $user->store_name == null) {
                $status = 500;
                $message = "Mohon Mengisi Nama Toko Sebelum Melanjutkan !";

                return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);

            } else {
        		$status = 200;
            	$message = "Berhasil menambahkan ke Chart";

            	$product = Product::find($id);
    	    	$wish = new Wishlist;
    	    	$wish->user_id = Auth::user()->id;
    	    	$wish->product_id = $id;
    	    	$wish->status = 0;
                if ($request->jumlah == null){
                    $wish->jumlah = 1;
                    $wish->total_amount = $product->price * 1;
                }else {
    	           $wish->jumlah = $request->jumlah;
                   $wish->total_amount = $product->price * $request->jumlah;
                }
    	    	$wish->save();

    	    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
            }
	    } else {
	    	$status = 500;
        	$message = "Silahkan Login Terlebih Dahulu !";

        	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
	    }
    }
    public function delete (Request $request, $id)
    {
        $status = 200;
        $message = "Data Berhasil di Hapus";
        $cart = Wishlist::find($id);
        $cart->delete();

        return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    }

}
