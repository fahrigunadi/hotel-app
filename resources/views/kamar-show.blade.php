@extends('layouts.tamu', ['title'=>$row->nama_kamar])

@section('content')
<h1 class="text-center my-4">{{ $row->nama_kamar }}</h1>
<div class="row">
    <div class="col">
        <img src="{{ $row->foto_kamar }}" alt="" class="img-fluid w-100">
    </div>
    <div class="col">
        <h5>Rp. {{ $row->harga_kamar }} <small>/ Malam.</small> </h5>
        <p class="mt-3">
            Fasilitas :
            <ul>
                @foreach ($fasilitas as $fas)
                    <li>{{ $fas->nama_fasilitas_kamar }}</li>
                @endforeach
            </ul>
        </p>
        <p>{{ $row->deskripsi_kamar }}</p>
    </div>
</div>
@endsection
