@extends('layouts.admin',['title'=>'Fasilitas Hotel'])

@section('content-header')
    <h1 class="m-0"><i class="fas fa-swimming-pool"></i> Fasilitas Hotel</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <x-form-edit :action="route('fasilitas.update',['fasilita'=>$row->id])" :upload="true">
                <x-input label="Nama Fasilitas" name="nama_fasilitas" :value="$row->nama_fasilitas_hotel"/>
                    <div class="form-group">
                        <img src="{{ $row->foto_fasilitas_hotel }}" class="img-fluid w-100" alt="">
                    </div>
                <x-input label="Foto" name="foto" type="file"
                keterangan="Foto bertipe : png, jpg, jpeg. Dimensi : min width 1000px, min height 500px. min 50kb, max 1000kb."/>
                <x-textarea label="Deskripsi" name="deskripsi" :value="$row->deskripsi_fasilitas_hotel"/>
            </x-form-edit>
        </div>
    </div>
@endsection
