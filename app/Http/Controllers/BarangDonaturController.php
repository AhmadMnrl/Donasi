<?php

namespace App\Http\Controllers;

use App\Barang_donatur;
use Illuminate\Http\Request;

class BarangDonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listBarang()
    {
        $barang = Barang_donatur::all();
        return response()->json(["code" => "00", "message" => "success" , "data" => $barang]);
    }
    public function index()
    {
        $data = Barang_donatur::all();
        return view('barang.index',compact('data'));
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
    public function store(Request $request)
    {
         Barang_donatur::create([
    		'nama' => $request->nama,
    		'keterangan' => $request->keterangan
    	]);
        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang_donatur  $barang_donatur
     * @return \Illuminate\Http\Response
     */
    public function show(Barang_donatur $barang_donatur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang_donatur  $barang_donatur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang_donatur::find($id);
        return view('barang.edit',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang_donatur  $barang_donatur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Barang_donatur::find($id);
        $value = [
            'nama'=>$request ->nama,
            'keterangan'=>$request ->keterangan
        ];
        $data->update($value);
        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang_donatur  $barang_donatur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang_donatur::destroy($id);
        return redirect('/barang');
    }
}
