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
         if($request->foto > 0  && $request->foto != NULL){
            $foto = $request->foto;
            $v_foto = time()."_Donasi_".$foto->getClientOriginalName();
        }

        if(isset($v_foto)){
            $foto->move(public_path().'/image',$v_foto);
            $fileUrl = public_path().'/image/'.$v_foto;
        }else{
            $fileUrl = NULL;
        }

        if ($request->jenis_donasi == 'uang') {
            $status = 'Selesai';
        }else{
            $status ='Belum Selesai';
        }

        if($request->id_donatur == null) {
            Donasi::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
            // 'jenis_pembayaran' => $request->jenis_pembayaran,
            'jenis_donasi' => $request->jenis_donasi,
            'jumlah' => $request->jumlah,
            'pengiriman' => $request->pengiriman,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'full_address' => $request->full_address,
            'status' => $status,
            'foto' => $v_foto,
            'url_foto' => $fileUrl
            ]);
        }else{
        Donasi::create([
            // 'jenis_pembayaran' => $request->jenis_pembayaran,
            'id_donatur' => $request->id_donatur,
            'jenis_donasi' => $request->jenis_donasi,
            'jumlah' => $request->jumlah,
            'pengiriman' => $request->pengiriman,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'full_address' => $request->full_address,
            'status' => $status,
            'foto' => $v_foto,
            'url_foto' => $fileUrl
            ]);
        }

        return response()->json(["code" => "00", "message" => "success",'file'=>$fileUrl]);
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

        // dd($request->foto);
        if($request->foto != NULL){
            $foto = $request->foto;
            $v_foto = time()."_Donasi_".$foto->getClientOriginalName();
        }
        if(isset($v_foto)){
            $foto->move(public_path().'/image',$v_foto);
            $fileUrl = public_path().'/image/'.$v_foto;
        }else{
            $fileUrl = NULL;
        }

        if ($request->jenis_donasi == 'uang') {
            $status = 'Selesai';
        }else{
            $status ='Belum Selesai';
        }

         Donasi::create([
            'id_donatur' => $request->id_donatur,
            'jenis_donasi' => $request->jenis_donasi,
            'jumlah' => $request->jumlah,
            'pengiriman' => $request->pengiriman,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'full_address' => $request->full_address,
            'status' =>$status,
            'created_at' => date("Y/m/d"),
            'updated_at' => date("Y/m/d"),
            'foto' => $v_foto,
            'url_foto' => $fileUrl
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
        if($request->foto != NULL){
            $foto = $request->foto;
            $v_foto = time()."_Donasi_".$foto->getClientOriginalName();
        }
        if(isset($v_foto)){
            $foto->move(public_path().'/image',$v_foto);
            $fileUrl = public_path().'/image/'.$v_foto;
        }else{
            $fileUrl = NULL;
        }
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
            'status' =>$request->status,
            'foto' => $v_foto,
            'url_foto' => $fileUrl
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
