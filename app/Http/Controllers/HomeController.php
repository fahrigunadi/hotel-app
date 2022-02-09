<?php

namespace App\Http\Controllers;

use App\Helper\ImageUrl;
use App\Models\FasilitasHotel;
use App\Models\Kamar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $fasilitas = FasilitasHotel::select('id', 'nama_fasilitas_hotel', 'foto_fasilitas_hotel')->get();
        $kamar = Kamar::select('id', 'foto_kamar', 'nama_kamar', 'harga_kamar')->get();

        $fasilitas->map(function($row){
            $row->nama_fasilitas_hotel = ucwords($row->nama_fasilitas_hotel);
            $row->foto_fasilitas_hotel = ImageUrl::get('images/fasilitas/', $row->foto_fasilitas_hotel);
            return $row;
        });

        $kamar->map(function($row){
            $row->nama_kamar = ucwords($row->nama_kamar);
            $row->foto_kamar = ImageUrl::get('images/kamar/', $row->foto_kamar);
            $row->harga_kamar = number_format($row->harga_kamar,0,',','.');
            return $row;
        });

        return view('welcome',[
            'fasilitas'=>$fasilitas,
            'kamar'=>$kamar
        ]);
    }
}
