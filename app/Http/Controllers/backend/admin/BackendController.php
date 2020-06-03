<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Checkout;
use App\User;

class BackendController extends Controller
{
    public function dasboard()
    {
    	$perbulan = Checkout::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('status', 2)->sum('total_amount');
    	$perhari = Checkout::whereDay('created_at', date('m'))->whereYear('created_at', date('Y'))->where('status', 2)->sum('total_amount');
    	
    	$usersall = User::whereHas('roles', function($query){
                $query->where('name','!=','Admin');
                return $query;
            })
            ->count();
            
        // $chechoutBln = Checkout::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->orderBy('created_at', 'asc');
        // $chechoutPenghasilan = Checkout::select('created_at', date('m'))->whereYear('created_at', date('Y'))->orderBy('created_at', 'asc')
          	// dd($usersall);

    	return view('backend.dasboard.dasboard', compact(['perbulan', 'perhari', 'usersall']));
    }

    public function store(Request $request, $id)
    {
        $status = 200;
        $message = "Berhasil Menambah Nama Toko"; 

        $user = User::find($id);
        $user->store_name = $request->store_name;
        $user->save();

        return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);

    }
}
