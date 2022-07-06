<?php

namespace App\Http\Controllers;

use App\Donasi;
use App\Donatur;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexApi()
    {
        $donasi = Donasi::all();
        $donatur = Donatur::all();
        return response()->json(["code" => "00", "message" => "success" , "data" => $donasi]);
    }
    public function createApi(Request $request)
    {
        Donasi::create([
        'id_donatur' => $request->id_donatur,
        'jenis_donasi' => $request->jenis_donasi,
        'jumlah' => $request->jumlah,
        'pengiriman' => $request->pengiriman,
        'provinsi' => $request->provinsi,
        'kota' => $request->kota,
        'kecamatan' => $request->kecamatan,
        'kelurahan' => $request->kelurahan,
        'longitude' => $request->longitude,
        'latitude' => $request->latitude,
        'status' =>$request->status
        ]);
        return response()->json(["code" => "00", "message" => "success"]);
    }
    public function index()
    {
        $donatur = Donatur::all();
        $data = Donasi::paginate(3);
        return view('donasi.index',compact('data','donatur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Donasi::create([
            'id_donatur' => $request->id_donatur,
            'jenis_donasi' => $request->jenis_donasi,
            'jumlah' => $request->jumlah,
            'pengiriman' => $request->pengiriman,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'status' =>$request->status
        ]);
        return redirect('/donasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donasi  $donasi
     * @return \Illuminate\Http\Response
     */
    public function show(Donasi $donasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donasi  $donasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Donasi $donasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donasi  $donasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Donasi::find($id);
        $value = [
            'id_donatur' => $request->id_donatur,
            'jenis_donasi' => $request->jenis_donasi,
            'jumlah' => $request->jumlah,
            'pengiriman' => $request->pengiriman,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'status' =>$request->status
        ];
        $data->update($value);
        return redirect('/donasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donasi  $donasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Donasi::destroy($id);
        return redirect('/donasi');
    }
}
