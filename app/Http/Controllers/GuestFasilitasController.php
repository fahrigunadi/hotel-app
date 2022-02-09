<?php

namespace App\Http\Controllers;

use App\Helper\ImageUrl;
use App\Models\FasilitasHotel;
use Illuminate\Http\Request;

class GuestFasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = FasilitasHotel::get();

        $fasilitas->map(function($row){
            $row->nama_fasilitas_hotel = ucwords($row->nama_fasilitas_hotel);
            $row->foto_fasilitas_hotel = ImageUrl::get('images/fasilitas/', $row->foto_fasilitas_hotel);
        });

        return view('fasilitas',['fasilitas'=>$fasilitas]);
    }

    public function show(FasilitasHotel $fasilitas)
    {
        $fasilitas->nama_fasilitas_hotel = ucwords($fasilitas->nama_fasilitas_hotel);
        $fasilitas->foto_fasilitas_hotel = ImageUrl::get('images/fasilitas/', $fasilitas->foto_fasilitas_hotel);

        return view('fasilitas-show',['fasilitas'=>$fasilitas]);
    }
}
