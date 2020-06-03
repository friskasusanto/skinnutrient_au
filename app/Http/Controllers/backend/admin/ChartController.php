<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Chart;
use App\Log;

class ChartController extends Controller
{
    //CHART
    public function index ()
    {
    	$chart = Chart::paginate(10);

    	return view('backend.admin.chart.index', compact(['chart']));
    }
    public function delete (Request $request, $id)
    {
    	$status = 500;
        $message = "Data Berhasil di Hapus";
    	$delete = Chart::find($id);
    	$delete->delete();

        $log = new Log;
        $log->mutasi_action = "hapus chart ";
        $log->user_id = Auth::user()->id;
        $log->controller = "ChartController";
        $log->function = "delete";
        $log->keterangan = "hapus chart berhasil dengan product id ". $delete->product_id;
        $log->tgl_action = date('Y-m-d H:i:s');
        $log->save();

    	return redirect()->back()->with(['flash_status' => $status,'flash_message' => $message]);

    }
}
