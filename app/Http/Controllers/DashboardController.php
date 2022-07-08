<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;
use DB;

class DashboardController extends Controller
{
    public function index()
    {

        $saldo = Donasi::select(DB::raw("SUM(jumlah) as saldo"))
        ->where("jenis_donasi","uang")->Where('status','selesai')->from("donasis")->first();

        $daftar = Donasi::where('status', 'Belum Selesai')->get();

        // dd($daftar);

        $summaryData = Donasi::select(DB::raw("jenis_donasi,SUM(jumlah) as jumlah"))
        ->Where('status','selesai')
        ->from('donasis')->groupBy('jenis_donasi')->get();
        // dd($donasi);
        // dd($summaryData);
        $summary = [];
        foreach ($summaryData as $key => $value) {
            if($value->jenis_donasi != 'uang'){
                $donasi = [ "jenis_donasi"  => $value->jenis_donasi, "jumlah" => $value->jumlah];
            }else{
                $donasi = [ "jenis_donasi"  => $value->jenis_donasi, "jumlah" => number_format($value->jumlah,2,',','.')];
            }

            array_push($summary, $donasi);

        }

        // foreach ($summary as $key => $value) {
        //     var_dump($value['jenis_donasi']);
        // }
        // // dd($summary);
        // die;
        return view('home.dashboard',compact('saldo','summary','daftar'));
    }

}

