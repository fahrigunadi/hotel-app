@extends('layouts.admin',['title'=>'Kamar'])

@section('content-header')
    <h1 class="m-0"><a class="btn" onclick="history.back()"><i class="fas fa-arrow-left" style="font-size: 25px;"></i></a> <i class="fas fa-bed"></i> Kamar</h1>
@endsection

@section('content')
<x-status/>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <img src="{{ $row->foto_kamar }}" class="img-fluid w-100"/>
            </div>
            <!-- ./col -->
            <div class="col">
                <h3>{{ ucwords($row->nama_kamar) }}</h3>
                <p>
                    Harga : Rp. {{ number_format($row->harga_kamar,2,',','.') }} , Jumlah : {{ $row->jum_kamar }} Kamar
                </p>
                <p>
                    Fasilitas :
                    <ul>
                        @foreach ($fasilitas as $fa)
                            <li>{{ $fa->nama_fasilitas_kamar }}</li>
                        @endforeach
                    </ul>
                </p>
                <p>Deskripsi : <br>{{ $row->deskripsi_kamar }}</p>
            </div>
            <!-- ./col -->
        </div>
    </div>
    <!-- ./card-body -->
</div>
@endsection
<x-modal-delete/>

