<?php

namespace App\Http\Controllers;
use App\Yayasan;
use App\Donatur;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function indexYayasan(){

        return view('test');
    }
     public function indexDonatur(){

        return view('donatur.index');
    }
    public function show()
    {
        $yayasan = Yayasan::all();
        return response()->json(["code" => "00", "message" => "success" , "data" => $yayasan]);
    }

    public function createYayasan(Request $request){
        Yayasan::create([
    		'nama_lengkap' => $request->nama_lengkap,
    		'email' => $request->email,
            'no_tlp'=> $request->no_tlp,
            'address'=> $request->address,
            'keterangan'=> $request->keterangan
    	]);
        return response()->json(["code" => "00", "message" => "success"]);
    }
    public function updateYayasan(Request $request, $id)
    {
        $data = Yayasan::find($id);
        $value = [
            'nama_lengkap'=>$request ->nama_lengkap,
            'email'=>$request ->email,
            'no_tlp'=>$request ->no_tlp,
            'address'=> $request->address,
            'keterangan'=> $request->keterangan
        ];
        $data->update($value);
        return response()->json(["code" => "00", "message" => "success", "data" => $data]);
    }
    public function deleteYayasan($id)
    {
        $yayasan = Yayasan::find($id);
        $yayasan->delete();
        return response()->json(["code" => "00", "message" => "success"]);
    }
    public function landingPage()
    {
        return view('landing.index');
    }

}
