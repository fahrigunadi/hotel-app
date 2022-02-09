<?php

namespace App\Http\Controllers;

use App\Helper\ImageUrl;
use App\Models\FasilitasKamar;
use App\Models\Kamar;
use Illuminate\Http\Request;

class GuestKamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::select('id','nama_kamar', 'foto_kamar', 'deskripsi_kamar', 'harga_kamar')->get();

        $kamar->map(function($row){
            $row->nama_kamar = ucwords($row->nama_kamar);
            $row->foto_kamar = ImageUrl::get('images/kamar/', $row->foto_kamar);
            $row->harga_kamar = number_format($row->harga_kamar,0,',','.');
            return $row;
        });

        return view('kamar',['kamar'=>$kamar]);
    }

    public function show(Kamar $kamar)
    {
        $kamar->nama_kamar = ucwords($kamar->nama_kamar);
        $kamar->foto_kamar = ImageUrl::get('images/kamar/', $kamar->foto_kamar);
        $kamar->harga_kamar = number_format($kamar->harga_kamar,0,',','.');

        $fasilitas = FasilitasKamar::where('kamar_id', $kamar->id)->get();

        return view('kamar-show',['row'=>$kamar, 'fasilitas'=>$fasilitas]);
    }
}
