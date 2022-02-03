@props(['action', 'upload'=>false])
<form action="{{ $action }}" method="post" class="card card-primary" <?= $upload ? ' enctype="multipart/form-data"' : '' ?>>
    <div class="card-header">
        <i class="fas fa-plus"></i> Tambah
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
