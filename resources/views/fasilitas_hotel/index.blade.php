@extends('layouts.admin',['title'=>'Fasilitas Hotel'])

@section('content-header')
    <h1 class="m-0"><i class="fas fa-swimming-pool"></i> Fasilitas Hotel</h1>
@endsection

@section('content')
@can('role', 'admin')
<x-status/>
@endcan
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                @can('role', 'admin')
                <x-btn-create :link="route('fasilitas.create')" icon="fas fa-plus" />
                @endcan
            </div>
            <div class="col">
                <x-search />
            </div>
        </div>
    </div>
    <x-card-table>
        <thead>
            <tr>
                <th>No</th><th>Nama Fasilitas</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = $data->firstItem();
            @endphp
            @foreach ($data as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ ucwords($row->nama_fasilitas_hotel)  }}</td>
                <td>
                    <x-btn-show :link="route('fasilitas.show',['fasilita'=>$row->id])"/>
                    @can('role', 'admin')
                    <x-btn-edit :link="route('fasilitas.edit',['fasilita'=>$row->id])"/>
                    <x-btn-delete :link="route('fasilitas.destroy',['fasilita'=>$row->id])"/>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-card-table>
    <!-- ./card-body -->
    <div class="card-body pb-1">
        {{ $data->appends(['search' => request()->search ])->links('pagination'); }}
    </div>
    <!-- ./card-body -->
</div>
@endsection
@can('role', 'admin')
<x-modal-delete/>
@endcan

