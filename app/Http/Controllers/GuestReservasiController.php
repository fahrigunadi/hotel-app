<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helper\Lamanya;

class GuestReservasiController extends Controller
{
    public function create(Request $request)
    {

        $kamar = Kamar::select('id as value', 'nama_kamar as option')->get();

        $kamar->map(function($row){
            $row->option = ucwords($row->option);
            return $row;
        });

        $kamar->toArray();

        return view('reservasi',['kamar'=>$kamar]);
    }

    public function store(Request $request)
    {
        $before_today = date("Y-m-d",strtotime(today()." -1 day"));

        $request->validate([
            'checkin'=>"required|date|after:{$before_today}",
            'checkout'=>'required|date|after:checkin',
            'kamar'=>'required|numeric|integer',
            'jumlah_kamar'=>"required|numeric|integer|min:1",
            'nama_pemesan'=>'required',
            'email'=>'required|email',
            'nomor_handphone'=>'required',
            'nama_tamu'=>'required'
        ]);

        $kamar = Kamar::select('id', 'jum_kamar')->where('id', $request->kamar)->first();

        $tersedia = "tersedia_" . $request->kamar;
        $jumlah_kamar = $kamar->jum_kamar;
        if ($request->$tersedia){
            $jumlah_kamar = $request->$tersedia;
        }

        $request->validate([
            'jumlah_kamar'=>"required|numeric|integer|min:1|max:{$jumlah_kamar}",
        ]);

        // $lamaBooking = Lamanya::get($request->checkin, $request->checkout);

        // if ($lamaBooking > 30) {
        //     return redirect()->back()->with('status', 'lamaKamarBerlebih');
        // }


        $pemesanan = Pemesanan::create([
            'kamar_id'=>$request->kamar,
            'tgl_checkin'=>$request->checkin,
            'tgl_checkout'=>$request->checkout,
            'jum_kamar_dipesan'=>$request->jumlah_kamar,
            'nama_pemesan'=>$request->nama_pemesan,
            'email_pemesan'=>$request->email,
            'no_hp'=>$request->nomor_handphone,
            'nama_tamu'=>$request->nama_tamu,
            'status'=>'pesan'
        ]);

        return redirect()->route('guest.reservasi.show',['pemesanan'=>$pemesanan->id]);
    }

    public function show(Pemesanan $pemesanan)
    {
        return view('reservasi-show', ['row'=>$pemesanan]);
    }

    public function invoice(Pemesanan $pemesanan)
    {
        $pemesanan->nama_pemesan = ucwords($pemesanan->nama_pemesan);
        $pemesanan->nama_tamu = ucwords($pemesanan->nama_tamu);
        $pemesanan->total_malam = Lamanya::get($pemesanan->tgl_checkin, $pemesanan->tgl_checkout);
        $pemesanan->tgl_checkin = date('l,d m Y', strtotime($pemesanan->tgl_checkin));
        $pemesanan->tgl_checkout = date('l,d m Y', strtotime($pemesanan->tgl_checkout));

        $kamar = Kamar::find($pemesanan->kamar_id);

        $total = $kamar->harga_kamar * $pemesanan->jum_kamar_dipesan * $pemesanan->total_malam;
        $pemesanan->total = number_format($total, 0, '.',',');

        $kamar->nama_kamar = ucwords($kamar->nama_kamar);
        $kamar->harga_kamar = number_format($kamar->harga_kamar,0,'.',',');

        $pdf = Pdf::loadView('reservasi-invoice',['row'=>$pemesanan, 'kamar'=>$kamar]);
        return $pdf->stream();
    }

    public function getKamar(Request $request)
    {
        if ($request->checkout && $request->checkin) {

            $pemesanan = Pemesanan::select('id', 'kamar_id')
            ->where('tgl_checkin', $request->checkin)
            ->where('tgl_checkout', $request->checkout)
            ->where('status', 'pesan')
            ->orWhere('tgl_checkin', $request->checkin)
            ->where('tgl_checkout', $request->checkout)
            ->where('status', 'checkin')
            ->get();

            $kamar_id = [];
            foreach ($pemesanan as $key => $value) {
                $kamar_id[] = $value->kamar_id;
            }
            $kamar_id = array_count_values($kamar_id);

            $kamar = Kamar::all();

            $kamar->map(function ($item) use ($kamar_id){
                $item->nama_kamar = ucwords($item->nama_kamar);
                $item->name_tersedia = trim(ucwords($item->nama_kamar), "");
                if (!empty($kamar_id[$item->id])) {
                    $item->jum_kamar = $item->jum_kamar - $kamar_id[$item->id];
                }
            });
        } else {
            $kamar = Kamar::all();
        }

        return $kamar;
    }
}
