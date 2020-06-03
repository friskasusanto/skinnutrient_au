<?php

namespace App\Http\Controllers\backend\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Checkout;

class OrderController extends Controller
{
    //ORDER
    public function index ()
    {
    	$order = Checkout::paginate(10);
    	return view('backend.member.order.index', compact(['order']));
    }
}
