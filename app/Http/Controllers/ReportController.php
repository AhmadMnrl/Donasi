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
                // ->join('donatur','a.id_donatur','=','donatur.id')
                // ->select('a.*','donatur.*');
                ->select("*");
        if ($request->status != "" && $request->status != null) {
                $status = $request->status;
                $data = $data->where('status',$status);
        }

        if ($request->startDate != "" && $request->startDate != null ||
            $request->endDate != "" && $request->endDate != null) {
                $startDate = $request->startDate ?? date("Y/m/d");
                $endDate = $request->endDate ?? date("Y/m/d");
                $data = $data->whereBetween('created_at',[$startDate,$endDate]);
        }


        if(
            $request->status != "" && $request->status != null ||
            $request->startDate != "" && $request->startDate != null ||
            $request->endDate != "" && $request->endDate != null
            ){
                if($request->status == "" || $request->status == null ){
                    $status = NULL;
                }
                if($request->startDate == "" || $request->startDate == null ){
                    $startDate = NULL;
                }
                if($request->endDate == "" || $request->endDate == null ){
                    $endDate = NULL;
                }
                $donasi = $data->get();
                return view('report.index-report',compact('donasi','status','startDate','endDate'));
            }else{
                $donasi = $data->paginate(5);
                // dd($donasi);
                return view('report.index-report',compact('donasi'));
            }


    }
    public function export_excel()
	{
		return Excel::download(new DonasiExport, 'donasi-export.xlsx');
	}
}
