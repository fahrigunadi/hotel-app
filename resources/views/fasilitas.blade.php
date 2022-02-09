@extends('layouts.tamu', ['title'=>'Fasilitas'])

@section('content')
<h1 class="text-center my-4">Fasilitas</h1>

@foreach ($fasilitas as $item)
<hr>
<div class="row kamar mb-3">

    <div class="col-md-4">
        <img src="{{ $item->foto_fasilitas_hotel }}" class="img-fluid rounded img-thumbnail" />
    </div>
    <div class="col-md">
        <h2><a href="{{ route('guest.fasilitas.show', ['fasilitas'=>$item->id]) }}"> {{ $item->nama_fasilitas_hotel }} </a></h2>
        <p>{{ $item->deskripsi_fasilitas_hotel }}</p>
        <p>
            Rp. 300. 000 / malam
        </p>
    </div>
</div>
@endforeach
@endsection
