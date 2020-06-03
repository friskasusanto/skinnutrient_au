<?php

namespace App\Http\Controllers\backend\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class MemberController extends Controller
{
	public function changePass_view (Request $request, $id)
	{
		$user = User::find($id);
		return view('auth.changepass', compact(['user']));
	}
	public function changePass (Request $request, $id)
	{
			$user = User::find($id);
			$password_lama = $request->password_lama;
			$password_baru = $request->password;
			$password_repeat = $request->password_repeat;
			// dd (Hash::check($password_lama, $user->password));

		$this->validate($request, [
            'password_lama' => 'required|string|min:6',
            'password' => 'required|string|min:6',
            'password_repeat' => 'required|string|min:6', 
        ]);

		if (Hash::check($password_lama, $user->password)){
			if ($password_baru == $password_repeat){
				$user->password = Hash::make($password_baru);
				$user->save();

				return redirect()->back()->with(['flash_status' => '200','flash_message' => 'Password Berhasil Diganti']);
			}else {
				return redirect()->back()->with(['flash_status' => '500','flash_message' => 'Password Tidak Sama !']);
			}
		} else{
			return redirect()->back()->with(['flash_status' => '500','flash_message' => 'Password Lama Salah !']);
		}
	}

    public function biodata ()
    {
    	return view('backend.member.biodata.index');
    }
}
