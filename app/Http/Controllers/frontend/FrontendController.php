<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductUser;
use App\Category;
use App\Blog;
use App\User;
use App\Letter;
use App\Checkout;
use App\ProductGambar;
use App\Comment;
use App\Rating;
use Auth;
use Mail;
use Hash;


class FrontendController extends Controller
{
//RATING
    public function rating (Request $request, $id)
    {
        $status = 200;
        $message = "Terimakasih Atas Penilaian Anda.";

        if (Auth::check()){
            $product = Product::find($id);
            $rating = new Rating;
            $rating->product_id = $product->id;
            $rating->user_id = Auth::user()->id;
            $rating->jumlah = $request->star;
            $rating->save();
        } else {
            $status = 500;
            $message = "Silahkan Login Terlebih Dahulu Untuk Memberikan Penilaian";
        }

        return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    }

//KETENTUAN RESELLER dan DROPSHIPER
    public function gabung_reseller ()
    {
        return view('frontend.ketentuan-reseller');
    }
    public function acc_reseller ()
    {
        $status = 200;
        $message = "Anda Berhasil Terdaftar Sebagai Reseller, Silahkan Masuk Halaman Dasboard Untuk Melengkapi Data";
            
        $user = Auth::user()->roles()->sync(array(4));
        // $user->save();

        return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    }
    public function acc_dropshiper ()
    {
        $status = 200;
        $message = "Anda Berhasil Terdaftar Sebagai Dropshiper, Silahkan Masuk Halaman Dasboard Untuk Melengkapi Data";
            
        $user = Auth::user()->roles()->sync([2]);
        // $user->save();

        return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    }
    public function gabung_dropshiper ()
    {
        return view('frontend.ketentuan-dropshiper');
    }

//SHOP DROPSHIPER
    public function shop_view_dropship (Request $request)
    {
        $user = Auth::user()->id;
        $product = ProductUser::where('user_id', $user)->paginate(16);
        $category = Category::with('productUser')->orderBy('created_at', 'desc')->get();
        // dd($category);
        if ($request->category) {
            $product = ProductUser::where('category_id', $request->category)->orderBy('created_at', 'desc')->paginate(10);
            $category = Category::with('productUser')->get();
        }
        return view('frontend.shop.shop-dropship', compact(['product', 'category', 'user']));
    }


//LETTERS
    public function letter (Request $request)
    {
        $cek = Letter::where('email', $request->letter)->first();

        if (! $cek){
            $letter = new Letter;
            $letter->email = $request->letter;
            $letter->save();

            $status = 200;
            $message = "Email berhasil berlangganan newsletter Eaoron, Eaoron akan mengirimkan newsletter terbaru ke email anda.";
            return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
        } else {
            $status = 500;
            $message = "Email sudah pernah terdaftar !";
            return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
        }
    }

//FORGOT PASSWORD
    public function forgot_pass_view ()
    {
        return view('frontend.forgotPass.forgotPass');
    }
    public function forgot_pass (Request $request)
    {
        $pass = $request->email;
        $user = User::where('email', $pass)->first();

        if ($user){
            $status = 200;
            $message = "Silahkan Cek Email Anda !";
            Mail::send('backend.mail.resetPass', compact(['user']), function ($m) use ($user) {
                $m->to($user->email)->subject('Reset Password');
            });

            return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
        } else {
            $status = 500;
            $message = "Email Anda Tidak Terdaftar !";
            return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
        }
    }
    public function changePass_view (Request $request, $id)
    {
        $user = User::find($id);
        return view('frontend.forgotPass.changePass', compact(['user']));
    }
    public function changePass (Request $request, $id)
    {
        $pass = $request->password;
        $passRepeat = $request->passRepeat;

        $this->validate($request, [
            'password' => 'required|string|min:6',
            'passRepeat' => 'required|string|min:6',
        ]);

        if ($pass == $passRepeat){
            $user = User::find($id);
            $user->password = Hash::make($passRepeat);
            $user->save();

            $status = 200;
            $message = "Password Berhasil Diganti ! Silahkan Login Untuk Melanjutkan !";
            return redirect('/login')->with(['flash_status' => $status,'flash_message' => $message]);
        } else {
            $status = 500;
            $message = "Password yang Anda Masukan Tidak Sama !";
            return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
        }
    }

    public function single_product (Request $request, $slug)
    {
        $checkout = Checkout::count();
        $product = Product::where('slug', $slug)->first();
        // dd($product);
        $category = Category::with('product')->orderBy('created_at', 'desc')->get();
        $related_product = Product::where('category_id', $product->category_id)->get();
        // dd($related_product);
        $cek_laku = Checkout::select('product_id')->max('product_id');
        $paling_laku = Checkout::where('product_id', $cek_laku)->get();
        $product_image = ProductGambar::where('product_id', $product->id)->get();
        // dd($product_image);
        $countRating = Rating::where('product_id', $product->id)->select('user_id')->count();
        $ratingSum = Rating::where('product_id', $product->id)->sum('jumlah');
        if ($countRating != 0){
            $rating = $ratingSum / $countRating;
        }else{
            $rating = 0;
        }
        // dd($ratingSum);
        return view('frontend.shop.single-product', compact(['product', 'category', 'related_product', 'paling_laku', 'checkout', 'cek_laku', 'product_image', 'rating', 'countRating']));
    }
    public function about_view ()
    {
    	return view('frontend.about');
    }
    public function bradcaump_view ()
    {
    	return view('frontend.bradcaump');
    }
    public function cart_view ()
    {
    	return view('frontend.cart');
    }
    public function checkout_view ()
    {
    	return view('frontend.checkout');
    }
    public function distributor_view ()
    {
    	return view('frontend.distributor');
    }
    public function index_view ()
    {
        // $search = \Request::get('search');
        // $product = Product::all();
        $product_kami = Product::orderBy('created_at', 'desc')->limit(4)->get();
        $blog = Blog::orderBy('created_at', 'desc')->limit(3)->with('comment')->get();
        // dd($blog);

    	return view('frontend.index', compact(['product_kami', 'blog']));
    }
    public function shop_view (Request $request)
    {
        $product = Product::paginate(16);
        $category = Category::with('product')->orderBy('created_at', 'desc')->get();
        // dd($category);
        if ($request->category) {
            $product = Product::orWhere('category_id', $request->category)->orderBy('created_at', 'desc')->paginate(16);
            $category = Category::with('product')->get();
            // dd($product);
        }elseif ($request->name) {
            $product = Product::orWhere('name', 'like', '%'.$request->name.'%')->orderBy('created_at', 'desc')->paginate(16);
            $category = Category::with('product')->get();
        }
    	return view('frontend.shop.shop-grid', compact(['product', 'category']));
    }
    public function shop_view_terbaru (Request $request)
    {
        $product = Product::orderBy('created_at', 'desc')->paginate(16);
        $category = Category::with('product')->orderBy('created_at', 'desc')->get();
        // dd($category);
        if ($request->category) {
            $product = Product::orWhere('category_id', $request->category)->orderBy('created_at', 'desc')->paginate(16);
            $category = Category::with('product')->get();
            // dd($product);
        }elseif ($request->name) {
            $product = Product::orWhere('name', 'like', '%'.$request->name.'%')->orderBy('created_at', 'desc')->paginate(16);
            $category = Category::with('product')->get();
        }
        return view('frontend.shop.sortir.shop-terbaru', compact(['product', 'category']));
    }
    public function shop_view_terendah (Request $request)
    {
        $product = Product::orderBy('price', 'asc')->paginate(16);
        $category = Category::with('product')->orderBy('created_at', 'desc')->get();
        // dd($category);
        if ($request->category) {
            $product = Product::orWhere('category_id', $request->category)->orderBy('created_at', 'desc')->paginate(16);
            $category = Category::with('product')->get();
            // dd($product);
        }elseif ($request->name) {
            $product = Product::orWhere('name', 'like', '%'.$request->name.'%')->orderBy('created_at', 'desc')->paginate(16);
            $category = Category::with('product')->get();
        }
        return view('frontend.shop.sortir.shop-terendah', compact(['product', 'category']));
    }
    public function shop_view_tertinggi (Request $request)
    {
        $product = Product::orderBy('price', 'desc')->paginate(16);
        $category = Category::with('product')->orderBy('created_at', 'desc')->get();
        // dd($category);
        if ($request->category) {
            $product = Product::orWhere('category_id', $request->category)->orderBy('created_at', 'desc')->paginate(16);
            $category = Category::with('product')->get();
            // dd($product);
        }elseif ($request->name) {
            $product = Product::orWhere('name', 'like', '%'.$request->name.'%')->orderBy('created_at', 'desc')->paginate(16);
            $category = Category::with('product')->get();
        }
        return view('frontend.shop..sortir.shop-tertinggi', compact(['product', 'category']));
    }
}
