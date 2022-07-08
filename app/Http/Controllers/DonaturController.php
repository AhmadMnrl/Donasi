<?php

namespace App\Http\Controllers;

use App\Donatur;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexApi()
    {
        $donatur = Donatur::all();
        return response()->json(["code" => "00", "message" => "success" , "data" => $donatur]);
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
        Donatur::create([
    		'nama' => $request->nama,
    		'email' => $request->email,
            'no_telp'=> $request->no_telp,
            'alamat'=> $request->alamat,
    	]);
        return redirect('/donatur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function show(Donatur $donatur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donatur = Donatur::find($id);
        return view('donatur.edit',compact('donatur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Donatur::find($id);
        $value = [
            'nama'=>$request ->nama,
            'email'=>$request ->email,
            'no_telp'=>$request ->no_telp,
            'alamat'=> $request->alamat,
        ];
        $data->update($value);
        return redirect('/donatur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Donatur::destroy($id);
        return redirect('/donatur');
    }
}
