<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yayasan;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateController extends Controller
{
    public function index()
    {
        $yayasan = Yayasan::all();
        return view('generate.index',compact('yayasan'));
    }

    public function getId($id)
    {
        $yayasanID = Yayasan::find($id);
        return view('generate.index',compact('yayasanID'));
    }

    public function getQR($id)
    {
        $yayasan = Yayasan::find($id);
        return view('generate.qr',compact('yayasan'));
    }

    public function print($id){
        $yayasan = Yayasan::find($id);

        $pdf = PDF::loadview('generate.print-qr',['yayasan'=>$yayasan]);
        return $pdf->stream();
    }
}
