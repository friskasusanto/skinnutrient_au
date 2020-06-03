<?php

namespace App\Http\Controllers\backend\dropship;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DropshipController extends Controller
{
    public function biodata ()
    {
    	return view('backend.dropshiper.biodata.index');
    }
    public function ketentuanDropship ()
    {
    	return view('backend.dropshiper.biodata.ketentuanDropship');
    }
    public function ketentuanReseller ()
    {
    	return view('backend.dropshiper.biodata.ketentuanReseller');
    }
}
