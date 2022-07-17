<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;

use App\Exports\DonasiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Donatur;

use DB;

class ReportController extends Controller
{
    public function indexReport(Request $request)
    {
        // $donatur = Donatur::all();
        $data = Donasi::
                select('*');
                // ->join('donatur','a.id_donatur','=','donatur.id')
                // ->select('a.*','donatur.*');
                // all();

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
                // dd($donasi);
                // dd($status);
                return view('report.index-report',compact('donasi','status','startDate','endDate'));
            }else{
                $donasi = $data->paginate(5);
                // dd($donasi);
                return view('report.index-report',compact('donasi'));
            }


    }
    public function export_excel(Request $request)
	{
        // dd($request);
        $data = [];
        if($request->status != Null){
            $data['status'] = $request->status;
        }
        if($request->startDate != Null){
            $data['startDate'] = $request->startDate;
        }
        if($request->endDate != Null){
            $data['endDate'] = $request->endDate;
        }
        // dd($data);
		return Excel::download(new DonasiExport($data), 'donasi-export.xlsx');
	}
}
