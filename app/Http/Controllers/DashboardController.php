<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\FasilitasHotel;
use App\Models\Kamar;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::select(
                DB::raw("SUM(IF( status = 'pesan',1,0) ) as jum_permintaan"),
                DB::raw("SUM(IF( status = 'checkin',1,0) ) as jum_checkin"),
        )->first();

        $kamar = Kamar::select(
            DB::raw('count(id) as jum_kamar')
        )->first();

        $fasilitas = FasilitasHotel::select(
            DB::raw('count(id) as jum_fasilitas')
        )->first();

        $admin = Admin::select(
            DB::raw('count(id) as jum_admin')
        )->first();

        return view('dashboard',[
            'pemesanan'=>$pemesanan,
            'kamar'=>$kamar,
            'fasilitas'=>$fasilitas,
            'admin'=>$admin,
            'data_chart'=>$this->data_chart()
        ]);
    }

    public function data_chart()
    {
        $pemesanan = Pemesanan::select(
            'created_at',
            DB::raw('count(*) as jum_pemesanan')
        )
        ->whereMonth('created_at',date('m'))
        ->orderBy('created_at')
        ->groupBy('created_at')
        ->get();

        $data = [];

        foreach ($pemesanan as $row) {
            $data['label'][] = date('d/m/Y', strtotime($row->created_at));
            $data['data'][] = $row->jum_pemesanan;
        }

        return $data;
    }
}
