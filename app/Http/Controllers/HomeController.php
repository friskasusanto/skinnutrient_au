<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Checkout;
use App\User;
use App\Product;
use App\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $perbulan = Checkout::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('status', 2)->sum('total_amount');
        // $perhari = Checkout::whereDay('created_at', date('m'))->whereYear('created_at', date('Y'))->where('status', 2)->sum('total_amount');
        
        // $usersall = User::whereHas('roles', function($query){
        //         $query->where('name','!=','Admin');
        //         return $query;
        //     })
        //     ->count();
            // dd($usersall);
        $product_kami = Product::orderBy('created_at', 'desc')->limit(4)->get();
        $blog = Blog::orderBy('created_at', 'desc')->limit(3)->get();

        return view('frontend.index', compact(['product_kami', 'blog']));
    }
}
