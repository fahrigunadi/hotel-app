@extends('layouts.admin',['title'=>'Tambah Kamar'])

@section('content-header')
    <h1 class="m-0"><i class="fas fa-bed"></i> Kamar</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <x-form-create :action="route('kamar.store')" :upload="true">
                <x-input label="Nama Kamar / Type Kamar" name="nama_kamar" />
                <x-input label="Foto" name="foto" type="file"
                keterangan="Foto bertipe : png, jpg, jpeg. Dimensi : min width 1000px, min height 500px. min 50kb, max 1000kb."/>
                <x-input label="Jumlah" name="jumlah" type="number"/>
                <x-input label="Harga per malam" name="harga" type="number"/>
                <x-textarea label="Deskripsi" name="deskripsi" />
            </x-form-create>
        </div>
    </div>
@endsection
