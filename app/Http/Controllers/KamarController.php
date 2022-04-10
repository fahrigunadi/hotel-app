<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use App\Models\FasilitasKamar;
use App\Helper\ImageUrl;


class KamarController extends Controller
{

    function __construct()
    {
        $this->middleware('can:role, "admin"', [
            'except'=>['index', 'show']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyWord = $request->search;
        $dataKamar = Kamar::select('id', 'nama_kamar', 'foto_kamar', 'jum_kamar_kosong', 'jum_kamar_terisi', 'jum_kamar', 'harga_kamar', 'deskripsi_kamar')
        ->when($keyWord, function($query, $keyWord){
            return $query->where('nama_kamar', 'like', "%{$keyWord}%")
                        ->orWhere('harga_kamar', 'like', "%{$keyWord}%");
        })
        ->orderBy('id')
        ->paginate(15);
        return view('kamar.index',['data'=>$dataKamar]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kamar'=>'required',
            'foto'=>'required|image|mimes:png,jpg,jpeg,avif|dimensions:min_width=200,min_height=100|between:10,4000',
            'jumlah'=>'required|min:1',
            'harga'=>'required|min:1',
            'deskripsi'=>'required|min:10',
        ]);

        $ext = $request->foto->getClientOriginalExtension();
        $filename = rand(1,999).'_'.time().'.'.$ext;

        Kamar::create([
            'nama_kamar'=>$request->nama_kamar,
            'foto_kamar'=>$filename,
            'jum_kamar'=>$request->jumlah,
            'jum_kamar_kosong'=>$request->jumlah,
            'harga_kamar'=>$request->harga,
            'deskripsi_kamar'=>$request->deskripsi,
        ]);

        $request->foto->move('images/kamar/',$filename);

        return redirect()->route('kamar.index')->with('status', 'store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        $fasilitas = FasilitasKamar::where('kamar_id', $kamar->id)->get();

        $kamar->foto_kamar = ImageUrl::get('images/kamar/', $kamar->foto_kamar);

        return view('kamar.show',['row'=>$kamar, 'fasilitas'=>$fasilitas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
        return view('kamar.edit', ['row'=>$kamar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'nama_kamar'=>'required',
            'foto'=>'nullable|image|mimes:png,jpg,jpeg,avif|dimensions:min_width=200,min_height=100|between:10,4000',
            'jumlah'=>'required|min:1',
            'harga'=>'required|min:1',
            'deskripsi'=>'required|min:10',
        ]);

        if ($kamar->foto_kamar && $request->foto) {
            $file = 'images/kamar/'.$kamar->foto_kamar;
            if ( file_exists($file) ) {
                unlink($file);
            }
        }

        if ($request->foto) {
            $ext = $request->foto->getClientOriginalExtension();
            $filename = rand(1,999).'_'.time().'.'.$ext;
            $request->foto->move('images/kamar/',$filename);

            $arr = [
                'nama_kamar'=>$request->nama_kamar,
                'foto_kamar'=>$filename,
                'jum_kamar'=>$request->jumlah,
                'harga_kamar'=>$request->harga,
                'deskripsi_kamar'=>$request->deskripsi,
            ];
        } else {
            $arr = [
                'nama_kamar'=>$request->nama_kamar,
                'jum_kamar'=>$request->jumlah,
                'harga_kamar'=>$request->harga,
                'deskripsi_kamar'=>$request->deskripsi,
            ];
        }
        $kamar->update($arr);

        return redirect()->route('kamar.index')->with('status', 'update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        if ($kamar->foto_kamar) {
            $file = 'images/kamar/'.$kamar->foto_kamar;
            if ( file_exists($file) ) {
                unlink($file);
            }
        }

        $kamar->delete();
        return back()->with('status', 'destroy');
    }
}
