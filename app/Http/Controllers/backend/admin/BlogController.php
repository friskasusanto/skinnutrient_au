<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Log;
use App\Letter;
use Auth;
use Mail;
use App\Mail\SendMail;

class BlogController extends Controller
{
    public function mailsend()
    {
        $details = [
            'title' => 'Title: Mail from Real Programmer',
            'body' => 'Body: This is for testing email using smtp'
        ];

        \Mail::to('eaoron.indonesia@gmail.com')->send(new SendMail($details));
        return view('backend.mail.thanks');
    }

    //BLOG
    public function index ()
    {
    	$blog = Blog::orderBy('created_at', 'desc')->paginate(10);

    	return view('backend.admin.blog.index', compact(['blog']));
    }

    public function edit_view (Request $request, $id)
    {
    	$blog = Blog::find($id);
    	return view('backend.admin.blog.edit', compact(['blog']));
    }

    public function edit (Request $request, $id)
    {
    	$status = 200;
        $message = "Data Berhasil di Update";
    	$edit = Blog::find($id);
    	$edit->judul = $request->judul;
    	$edit->text = $request->text;

    if ($request->status == null){
    	$edit->status = $edit->status;
    } elseif ($request->status != null){
    	$edit->status = $request->status;
    }
    if ($request->images == null){
        $edit->images = $edit->images;
    } elseif ($request->images != null){
        $fileName = time().'.'.$request->file->getClientOriginalExtension();  
        $request->file->move(public_path('blog'), $fileName);
        $edit->images = $fileName;
    }
    	$edit->save();
    // dd($edit);

        $log = new Log;
        $log->mutasi_action = "edit blog ";
        $log->user_id = Auth::user()->id;
        $log->controller = "BlogController";
        $log->function = "edit";
        $log->keterangan = "edit blog berhasil, judul blog ". $edit->judul;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect('/admin/blog/index')->with(['flash_status' => $status,'flash_message' => $message]);
    }
    public function add_view (Request $request)
    {
    	
    	return view('backend.admin.blog.add');
    }

    public function add (Request $request)
    {
    	$status = 200;
        $message = "Data Berhasil di Tambah";
    	$add = new Blog;
    	$add->judul = $request->judul;
    	$add->text = $request->text;
    	$add->status = 0;

        $fileName = time().'.'.$request->file->getClientOriginalExtension();  
        $request->file->move(public_path('blog'), $fileName);
        $add->images = $fileName;

    // if ($request->status == null){
    // 	$add->judul = $add->judul;
    // } elseif ($request->status != null){
    // 	$add->judul = $request->judul;
    // }
    	$add->tgl_input = date('Y-m-d H:i:s');
    	$add->save();

        $latter = Letter::pluck('email')->toArray();;
        // dd($latter);
        Mail::send('backend.mail.latter', compact(['add', 'latter']), function ($m) use ($latter) {
            $m->to($latter)->subject('News Latter EAORON');
        });

        $log = new Log;
        $log->mutasi_action = "tambah blog ";
        $log->user_id = Auth::user()->id;
        $log->controller = "BlogController";
        $log->function = "add";
        $log->keterangan = "tambah category blog, judul blog ". $add->judul;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect('/admin/blog/index')->with(['flash_status' => $status,'flash_message' => $message]);
    }

    public function delete (Request $request, $id)
    {
    	$status = 500;
        $message = "Data Berhasil di Hapus";
    	$delete = Blog::find($id);
    	$delete->delete();

        $log = new Log;
        $log->mutasi_action = "hapus blog ";
        $log->user_id = Auth::user()->id;
        $log->controller = "BlogController";
        $log->function = "delete";
        $log->keterangan = "hapus blog berhasil dengan judul blog ". $delete->judul;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);

    }
}
