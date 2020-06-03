<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Log;

class LogController extends Controller
{
    //LOG
    public function index ()
    {
    	$log = Log::orderBy('created_at', 'DESC')->paginate(10);
    	// dd($log);
    	return view('backend.admin.log.index', compact(['log']));
    }
}
