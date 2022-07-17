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
        if($request->id_donatur == null) {
        Donasi::create([
        'name' => $request->name,
        'email' => $request->email,
        'no_tlp' => $request->no_tlp,
        'jenis_pembayaran' => $request->jenis_pembayaran,
        'jenis_donasi' => $request->jenis_donasi,
        'jumlah' => $request->jumlah,
        'pengiriman' => $request->pengiriman,
        'provinsi' => $request->provinsi,
        'kota' => $request->kota,
        'kecamatan' => $request->kecamatan,
        'kelurahan' => $request->kelurahan,
        'full_address' => $request->full_address,
        'status' =>'Belum Selesai'
        ]);
        }else{
        Donasi::create([
        'jenis_pembayaran' => $request->jenis_pembayaran,
        'id_donatur' => $request->id_donatur,
        'jenis_donasi' => $request->jenis_donasi,
        'jumlah' => $request->jumlah,
        'pengiriman' => $request->pengiriman,
        'provinsi' => $request->provinsi,
        'kota' => $request->kota,
        'kecamatan' => $request->kecamatan,
        'kelurahan' => $request->kelurahan,
        'full_address' => $request->full_address,
        'status' => 'Belum Selesai'
        ]);
        }

        return response()->json(["code" => "00", "message" => "success"]);
    }
    public function index()
    {
        $donatur = Donatur::all();
        $data = Donasi::paginate(50);
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
            'name' => $request->name,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'id_donatur' => $request->id_donatur,
            'jenis_donasi' => $request->jenis_donasi,
            'jumlah' => $request->jumlah,
            'pengiriman' => $request->pengiriman,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'full_address' => $request->full_address,
            'status' =>$request->status,
            'created_at' => date("Y/m/d"),
            'updated_at' => date("Y/m/d")
        ]);
        return redirect('/donasi')->with('message','Data Berhasil Disimpan');
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
    public function edit($id)
    {
        $donasi = Donasi::find($id);
        $donatur = Donatur::all();
        return view('donasi.edit',compact('donasi','donatur'));
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
            'full_address' => $request->full_address,
            'status' =>$request->status
        ];
        $data->update($value);
        return redirect('/donasi')->with('message3','Data Berhasil Diedit');
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
        return redirect('/donasi')->with('message2','Data Berhasil Dihapus');
    }
}
