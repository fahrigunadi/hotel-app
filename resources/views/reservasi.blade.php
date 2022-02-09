@extends('layouts.tamu', ['title'=>'Reservasi'])

@section('content')
<h1 class="text-center my-4">Reservasi</h1>
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="post" action="?" class="card card-primary">
            <div class="card-header py-1"></div>
            <div class="card-body">
                <x-input-reservasi label="Check IN" name="checkin" type="date" :value="request()->checkin"/>
                <x-input-reservasi label="Check OUT" name="checkout" type="date" :value="request()->checkout"/>
                <x-select-reservasi label="Kamar" name="kamar" :data-option="$kamar"/>
                <x-input-reservasi label="Jumlah Kamar" name="jumlah_kamar" type="number" :value="request()->jumlah"/>
                <x-input-reservasi label="Nama Pemesan" name="nama_pemesan"/>
                <x-input-reservasi label="Alamat Email" name="email" type="email"/>
                <x-input-reservasi label="Nomor Handphone" name="nomor_handphone"/>
                <x-input-reservasi label="Nama Tamu" name="nama_tamu"/>
            </div>
            <div class="card-footer">
                <button class="btn btn-block btn-lg btn-primary w-75 m-auto" type="submit">Booking Sekarang</button>
            </div>
        </form>
    </div>
</div>
@endsection
