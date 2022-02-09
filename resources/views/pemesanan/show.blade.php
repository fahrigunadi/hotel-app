@extends('layouts.admin',['title'=>'Pemesanan'])

@section('content-header')
    <h1 class="m-0"><i class="fas fa-cash-register"></i> Pemesanan</h1>
@endsection

@section('content')

<x-status />
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <p>Nama Tamu : {{ $pemesanan->nama_tamu }}</p>
                <p>Kamar : {{ $kamar->nama_kamar }}, Jumlah : {{ $pemesanan->jum_kamar_dipesan }}</p>
                <p>
                    Check IN : {{ $pemesanan->tgl_checkin }},
                    Check OUT : {{ $pemesanan->tgl_checkout }},
                    Lamanya : {{ $pemesanan->lamanya }} Malam
                </p>
                <p>Total Bayar : {{ $pemesanan->bayar }}</p>
                <p>Status : {{ $pemesanan->status }}</p>
                <p>
                    <form action="{{ route('pemesanan.update',['pemesanan'=>$pemesanan->id]) }}" method="post" class="form-inline">
                        @method('put')
                        <span class="mr-2">Ubah Status :</span>
                        <x-select name="status" :value="$pemesanan->value_status" :data-option="$option"/>
                        <button type="submit" class="btn btn-sm btn-success ml-2">Update</button>
                    </form>
                </p>
                <hr>
                <p>Nama Pemesan : {{ $pemesanan->nama_pemesan }}</p>
                <p>No HP : {{ $pemesanan->no_hp }}</p>
                <p>Email : {{ $pemesanan->email_pemesan }}</p>
                <p>Pesan Tanggal : {{ $pemesanan->tgl_dibuat }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

