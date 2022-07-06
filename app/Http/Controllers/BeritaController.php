<?php

namespace App\Http\Controllers;

use App\Berita;
use Auth;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexApi(Request $request)
    {
        $page = $request->page  ??  1 ;
        $limit = $request->limit  ?? 5;
        $offset = ($page - 1) * $limit;

        $berita = Berita::offset($offset)->limit($limit)->get();
        return response()->json(["code" => "00", "message" => "success" , "data" => $berita]);
    }
    public function index(Request $request)
    {
        // $limit = $request->limit ?? 10;
        $data = Berita::paginate(5);
        return view('berita.index',compact('data'));
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
        $userId = Auth::user()->id;
        // dd($userId);
        Berita::create([
    		'title' => $request->title,
    		'content' => $request->content,
            'created_by' => $userId,
            'updated_by' => $userId
    	]);
        return redirect('/berita')->with('message','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Berita::destroy($id);
        return redirect('/berita')->with('message2','Data Berhasil Dihapus');
    }
}
