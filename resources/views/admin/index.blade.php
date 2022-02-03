@extends('layouts.admin',['title'=>'User Admin'])

@section('content-header')
    <h1 class="m-0"><i class="fas fa-users"></i> User Admin</h1>
@endsection

@section('content')
<x-status/>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <x-btn-create :link="route('admin.create')" icon="fas fa-user-plus" />
            </div>
            <div class="col">
                <x-search />
            </div>
        </div>
    </div>
    <x-card-table>
        <thead>
            <tr>
                <th>No</th><th>Nama User</th><th>Username</th><th>Role</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = $data->firstItem();
            @endphp
            @foreach ($data as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->username }}</td>
                <td>{{ $row->role }}</td>
                <td>
                    <x-btn-edit :link="route('admin.edit',['admin'=>$row->id])"/>
                    <x-btn-delete :link="route('admin.destroy',['admin'=>$row->id])"/>
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
<x-modal-delete/>
