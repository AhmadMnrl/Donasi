<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;

use App\Exports\DonasiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use DB;

class ReportController extends Controller
{
    public function indexReport(Request $request)
    {


        $data = DB::table('donasis','a')
                ->join('donatur','a.id_donatur','=','donatur.id')
                ->select('a.*','donatur.*');

        if ($request->status != "" && $request->status != null) {
                $status = $request->status;
                $data = $data->where('status',$status);
        }


        if(
            $request->status != "" && $request->status != null ||
            $request->startDate != "" && $request->startDate != null ||
            $request->endDate != "" && $request->endDate != null
            ){
                $donasi = $data->get();
                return view('report.index-report',compact('donasi','status'));
            }else{
                $donasi = $data->paginate(5);
                return view('report.index-report',compact('donasi'));
            }


    }
    public function export_excel()
	{
		return Excel::download(new DonasiExport, 'donasi-export.xlsx');
	}
}
