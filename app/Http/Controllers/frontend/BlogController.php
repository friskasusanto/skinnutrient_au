<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Comment;

class BlogController extends Controller
{
    public function blog (Request $request)
    {
    	$blog = Blog::orderBy('created_at', 'desc')->paginate(10);
    	if ($request->judul) {
            $blog = Blog::orWhere('judul', 'like', '%'.$request->judul.'%')->orderBy('created_at', 'desc')->paginate(10);
        }
    	return view('frontend.blog-view', compact(['blog', 'blog']));
    }
    public function blog_detail (Request $request, $id)
    {
    	$blog = Blog::find($id);
    	$comment_count = Comment::where('blog_id', $blog->id)->first();
    	$comment = Comment::where('blog_id', $blog->id)->get();
    	$comment_child = Comment::where('blog_id', $blog->id)->where('child', 1)->orderBy('created_at', 'desc')->first();
    	$comment_parent = Comment::where('blog_id', $blog->id)->where('parent', 0)->orderBy('created_at', 'desc')->get();
    	$search = Blog::orderBy('created_at', 'desc')->paginate(10);
    	if ($request->judul) {
            $search = Blog::orWhere('judul', 'like', '%'.$request->judul.'%')->orderBy('created_at', 'desc')->paginate(10);
        }
    	// dd($comment_child);
    	// $comment = Comment::where('')
    	return view('frontend.blog-details', compact(['blog', 'comment', 'comment_count', 'comment_child', 'comment_parent', 'search']));
    }
    public function comment (Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|regex:/^.+@.+$/i',
            'comment' => 'required|string|min:6', 
        ]);

        $cek = Comment::where('email', $request->email)->first();

        if (! $cek){
        	$status = 200;
        	$message = "Berhasil menambahkan komentar";

	    	$blog = Blog::find($id);
	    	$comment = new Comment;
	    	$comment->product_id = null;
	    	$comment->comment = $request->comment;
	    	$comment->parent = 0;
	    	$comment->name = $request->name;
	    	$comment->email = $request->email;
	    	$comment->judul = $blog->judul;
	    	$comment->blog_id = $blog->id;
	    	$comment->save();

    		return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    	}else {
    		$status = 500;
        	$message = "Email sudah pernah berkomentar! gunakan email lain!";
    		return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);
    	}
    }
}
