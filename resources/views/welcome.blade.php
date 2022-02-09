@extends('layouts.tamu')

@section('content')
<x-form-pesan />
<h1 class="text-center my-4">Fasilitas</h1>

    <div class="row fasilitas">
        @foreach ($fasilitas as $row)

        <div class="col-md-3">
            <a class="card card-light" href="{{ route('guest.fasilitas.show', ['fasilitas'=>$row->id]) }}">
                <div class="card-header">
                    {{ $row->nama_fasilitas_hotel }}
                </div>
                <div class="card-body p-1">
                    <img src="{{ $row->foto_fasilitas_hotel }}" class="img-fluid rounded" />
                </div>

            </a>
        </div>
        @endforeach
    </div>

    <h1 class="text-center my-4">Kamar</h1>

    <div class="row kamar">
        @foreach ($kamar as $row)
        <div class="col-md-4">
            <a class="card card-light" href="{{ route('guest.kamar.show',['kamar'=>$row->id]) }}">
                <div class="card-header">
                    {{ $row->nama_kamar }}
                </div>
                <div class="card-body p-1">
                    <img src="{{ $row->foto_kamar }}" class="img-fluid rounded" />
                </div>
                <div class="card-footer">
                    Rp. {{ $row->harga_kamar }} <small>/ Malam.</small>
                </div>
            </a>
        </div>
        @endforeach
    </div>
@endsection
