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
        $data = Berita::paginate(50);
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
        if($request->foto > 0 ){
            $foto = $request->foto;
            $v_foto = time()."_".$userId."-".$foto->getClientOriginalName();
        }


        // dd($userId);
        $berita = new Berita();
        $berita->title = $request->title;
        $berita->content = $request->content;

        if(isset($v_foto)){
            $berita->foto = $v_foto;
        }

        $berita->created_by = $userId;
        $berita->updated_by = $userId;
        $berita->save();

        // Berita::create([
    	// 	'title' => $request->title,
    	// 	'content' => $request->content,
        //     'foto' => $v_foto,
        //     'original_fullname'=> $request->foto->getClientOriginalName(),
        //     'created_by' => $userId,
        //     'updated_by' => $userId
    	// ]);
        if(isset($v_foto)){
            $foto->move(public_path().'/image',$v_foto);
        }
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
