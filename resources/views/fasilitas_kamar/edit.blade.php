@extends('layouts.admin',['title'=>'Fasilitas Kamar '.ucwords($kamar->nama_kamar)])

@section('content-header')
    <h1 class="m-0"><a class="btn" onclick="history.back()"><i class="fas fa-arrow-left" style="font-size: 25px;"></i></a> <i class="fas fa-tv"></i> Fasilitas Kamar {{ ucwords($kamar->nama_kamar) }}</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <x-form-edit :action="route('kamar.fasilitas.update',['kamar'=>$kamar->id, 'fasilita'=>$row->id])">
                <x-input label="Nama Fasilitas" name="nama_fasilitas" :value="$row->nama_fasilitas_kamar"/>
            </x-form-edit>
        </div>
    </div>
@endsection
