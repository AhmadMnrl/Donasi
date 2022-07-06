<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Yayasan;
use Auth;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexApi(Type $var = null)
    {

        $page = $request->page  ??  1 ;
        $limit = $request->limit  ?? 5;
        $offset = ($page - 1) * $limit;

        $data = Gallery::offset($offset)->limit($limit)->get();
        // $data = Gallery::all();
        // $yayasan = Yayasan::all();
        return response()->json(["code" => "00", "message" => "success" , "data" => $data]);
    }
    public function index()
    {
        $data = Gallery::paginate(5);
        $yayasan = Yayasan::all();
        return view('gallery.index',compact(['data','yayasan']));
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
        $foto = $request->image;
        $idUser = Auth::user()->id;
        $v_foto = time()."_".$idUser."-".$foto->getClientOriginalName();


        $data = [
            'id_yayasan' => $request->id_yayasan,
            'image' => $v_foto,
            'original_fullname'=> $foto->getClientOriginalName(),
            'keterangan'=> $request->keterangan,
        ];

        Gallery::create($data);

        $foto->move(public_path().'/image',$v_foto);

            return redirect('/gallery');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gallery::destroy($id);
        return redirect('/gallery');
    }
}
