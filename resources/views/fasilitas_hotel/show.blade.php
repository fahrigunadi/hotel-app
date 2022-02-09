@extends('layouts.admin',['title'=>'Fasilitas Hotel'])

@section('content-header')
    <h1 class="m-0"><i class="fas fa-swimming-pool"></i> Fasilitas Hotel</h1>
@endsection

@section('content')
<x-status/>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <img src="{{ $row->foto_fasilitas_hotel }}" class="img-fluid w-100"/>
            </div>
            <!-- ./col -->
            <div class="col">
                <h3>{{ ucwords($row->nama_fasilitas_hotel) }}</h3>
                <p>Deskripsi : <br>{{ $row->deskripsi_fasilitas_hotel }}</p>
            </div>
            <!-- ./col -->
        </div>
    </div>
    <!-- ./card-body -->
</div>
@endsection
<x-modal-delete/>

