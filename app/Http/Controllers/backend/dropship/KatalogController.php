<?php

namespace App\Http\Controllers\backend\dropship;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductUser;
use Auth;

class KatalogController extends Controller
{
    public function katalogDropship ()
    {
    	$product = Product::paginate(10);
    	return view('backend.dropshiper.tambahKatalog.tambah', compact(['product']));
    }
    public function hapusKatalog(Request $request, $id)
    {
    	$status = 200;
        $message = "Berhasil Hapus Product dari Katalog Anda";

    	$user = ProductUser::find($id);
    	$user->delete();
    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);

    }
    public function addKatalog (Request $request, $id)
    {
    	$status = 200;
        $message = "Berhasil Tambah Product ke Katalog Anda";

    	$product = Product::find($id);

    	$user = new ProductUser;
    	$user->user_id = Auth::user()->id;
    	$user->product_id = $product->id;
    	$user->price_admin = $product->price;
    	$user->category_id = $product->category_id;
    	$user->status = 0;
    	$user->save();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    }
    public function katalogAnda ()
    {
    	$product = ProductUser::where('user_id', Auth::user()->id)->paginate(10);
    	return view('backend.dropshiper.tambahKatalog.katalogAnda', compact(['product']));
    }
}
