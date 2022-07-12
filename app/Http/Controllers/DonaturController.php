<?php

namespace App\Http\Controllers;

use App\Donatur;
use Hash;
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
        $donatur = new Donatur;
        $donatur->nama = $request->nama;
        $donatur->no_telp = $request->no_telp;
        $donatur->email = $request->email;
        $donatur->alamat = $request->alamat;
        $donatur->password = Hash::make($request->password);
        $donatur->save();
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
        $donatur = Donatur::findOrFail($id);
        $donatur->update($request->all());
        if(!empty($request->password)){
            $donatur->password = Hash::make($request->password);
        }
        $donatur->save();
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
