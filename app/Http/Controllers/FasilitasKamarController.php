<?php

namespace App\Http\Controllers;

use App\Models\FasilitasKamar;
use App\Models\Kamar;
use Illuminate\Http\Request;

class FasilitasKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kamar $kamar)
    {
        $dataFasilitasKamar = FasilitasKamar::where('kamar_id', $kamar->id)->get();
        return view('fasilitas_kamar.index', ['data'=>$dataFasilitasKamar, 'kamar'=>$kamar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kamar $kamar)
    {
        return view('fasilitas_kamar.create', ['kamar'=>$kamar]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Kamar $kamar)
    {
        $request->validate([
            'nama_fasilitas'=>'required',
        ]);

        FasilitasKamar::create([
            'kamar_id'=>$kamar->id,
            'nama_fasilitas_kamar'=>$request->nama_fasilitas,
        ]);

        return redirect()->route('kamar.fasilitas.index',['kamar'=>$kamar->id])->with('status','store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar, FasilitasKamar $fasilita)
    {
        return view('fasilitas_kamar.edit', ['kamar'=>$kamar, 'row'=>$fasilita]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar, FasilitasKamar $fasilita)
    {
        $request->validate([
            'nama_fasilitas'=>'required',
        ]);

        $fasilita->update([
            'nama_fasilitas_kamar' => $request->nama_fasilitas
        ]);

        return redirect()->route('kamar.fasilitas.index',['kamar'=>$kamar->id])->with('status','update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar, FasilitasKamar $fasilita)
    {
        $fasilita->delete();

        return redirect()->route('kamar.fasilitas.index',['kamar'=>$kamar->id])->with('status','destroy');
    }
}
