@extends('layouts.admin',['title'=>'Dashboard'])

@section('content-header')
    <h1 class="m-0">Dashboard</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-6 col-lg-4">
        <x-small-box label="Permintaan" :value="$pemesanan->jum_permintaan"
        icon="fas fa-cash-register"
        background="bg-warning"
        :link="route('pemesanan.index')"/>
    </div>
    <div class="col-6 col-lg-4">
        <x-small-box label="Check IN" :value="$pemesanan->jum_checkin"
        icon="fas fa-door-closed"
        background="bg-success"
        :link="route('pemesanan.index')"/>
    </div>
    <div class="col-6 col-lg-4">
        <x-small-box label="Kamar" :value="$kamar->jum_kamar"
        icon="fas fa-bed"
        background="bg-indigo"
        :link="route('kamar.index')"/>
    </div>
    <div class="col-6 col-lg-4">
        <x-small-box label="Fasilitas Hotel" :value="$fasilitas->jum_fasilitas"
        icon="fas fa-swimming-pool"
        background="bg-pink"
        :link="route('fasilitas.index')"/>
    </div>
    @can('role', 'admin')
    <div class="col-6 col-lg-4">
        <x-small-box label="User Admin" :value="$admin->jum_admin"
        icon="fas fa-users"
        background="bg-navy"
        :link="route('admin.index')"/>
    </div>
    @endcan
</div>
@include('dashboard.chart')
@endsection
