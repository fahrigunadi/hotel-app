@extends('layouts.tamu', ['title'=>$fasilitas->nama_fasilitas_hotel])

@section('content')
<h1 class="text-center my-4">{{ $fasilitas->nama_fasilitas_hotel }}</h1>
<div class="row">
    <div class="col">
        <img src="{{ $fasilitas->foto_fasilitas_hotel }}" alt="" class="img-fluid w-100">
    </div>
    <div class="col">
        {{ $fasilitas->deskripsi_fasilitas_hotel }}
    </div>
</div>
@endsection
