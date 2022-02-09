@extends('layouts.tamu', ['title'=>'Kamar'])

@section('content')
<x-form-pesan />
<h1 class="text-center my-4">Kamar</h1>

@foreach ($kamar as $item)
<hr>
<div class="row kamar mb-3">

    <div class="col-md-4">
        <img src="{{ $item->foto_kamar }}" class="img-fluid rounded img-thumbnail" />
    </div>
    <div class="col-md">
        <h2><a href="{{ route('guest.kamar.show',['kamar'=>$item->id]) }}"> {{ $item->nama_kamar }} </a></h2>
        <h5>Rp. {{ $item->harga_kamar }} <small>/ Malam.</small> </h5>
        <p>{{ $item->deskripsi_kamar }}</p>
    </div>
</div>
@endforeach
@endsection
