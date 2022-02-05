@extends('layouts.admin',['title'=>'Fasilitas Kamar '.ucwords($kamar->nama_kamar)])

@section('content-header')
    <h1 class="m-0"><i class="fas fa-tv"></i> Fasilitas Kamar {{ ucwords($kamar->nama_kamar) }}</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <x-form-create :action="route('kamar.fasilitas.store',['kamar'=>$kamar->id])">
                <x-input label="Nama Fasilitas" name="nama_fasilitas" />
            </x-form-create>
        </div>
    </div>
@endsection
