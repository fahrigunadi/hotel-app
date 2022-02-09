@extends('layouts.tamu', ['title'=>'Reservasi'])

@section('content')
<div class="row mt-5">
    <div class="col-lg-8 offset-lg-2">
        <div class="jumbotron shadow border">
            <h1 class="display-4">Berhasil Reservasi!</h1>
            <p class="lead">Terimakasih {{ $row->nama_tamu }}, telah melakukan reservasi dihotel kami</p>
            <hr class="my-4">
            <p>Untuk selanjutnya silahkan cetak atu download Booking Invoice</p>
            <a href="{{ route('guest.reservasi.invoice',['pemesanan'=>$row->id]) }}" target="_blank" class="btn btn-primary btn-lg">Cetak Booking Invoice</a>
        </div>
    </div>
</div>
@endsection
