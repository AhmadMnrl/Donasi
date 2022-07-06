<?php

namespace App\Http\Controllers;

use App\Yayasan;
use App\Gallery;
use Illuminate\Http\Request;

class YayasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileYayasan($id)
    {
        $profile = Yayasan::find($id);
        $id = $profile->id;
        // dd($id);
        $images = Gallery::where('id_yayasan',$id)->orderBy('created_at','desc')->paginate(4);
        // dd($images);
        return view('yayasan.profile',compact('profile','images'));
    }
    public function listYayasan()
    {
        $yayasan = Yayasan::all();
        return response()->json(["code" => "00", "message" => "success" , "data" => $yayasan]);
    }
    public function detailYayasan($id)
    {
        $detail = Yayasan::find($id);
        return response()->json(["code" => "00", "message" => "success" , "data" => $detail]);
    }
    public function index()
    {
        $data = Yayasan::all();
        return view('yayasan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {



        Yayasan::create([
    		'nama_lengkap' => $request->nama_lengkap,
    		'email' => $request->email,
            'no_tlp'=> $request->no_tlp,
            'address'=> $request->address,
            'keterangan'=> $request->keterangan
            ]);


        return redirect('/yayasan')->with('message','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Yayasan  $yayasan
     * @return \Illuminate\Http\Response
     */
    public function show(Yayasan $yayasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Yayasan  $yayasan
     * @return \Illuminate\Http\Response
     */
    public function edit(Yayasan $yayasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Yayasan  $yayasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        return redirect('/yayasan')->with('message3','Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Yayasan  $yayasan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Yayasan::destroy($id);
        return redirect('/yayasan')->with('message2','Data Berhasil Dihapus');
    }
}
