<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Comment;

class CommentController extends Controller
{
    public function comment (Request $request, $id)
    {
    	$status = 200;
        $message = "Berhasil menambahkan komentar";

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|regex:/^.+@.+$/i',
            'comment' => 'required|string|min:6', 
        ]);

    	// $product = Product($id);
    	$comment = new Comment;
    	$comment->product_id = $id;
    	$comment->comment = $request->comment;
    	$comment->parent = 0;
    	$comment->name = $request->name;
    	$comment->email = $request->email;
    	$comment->save();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    }
}
