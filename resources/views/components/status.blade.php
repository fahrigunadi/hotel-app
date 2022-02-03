@if (session('status')=='store')
<div class="alert alert-success alert-dismissible fade show">
    <strong>Berhasil Simpan!</strong> Data telah berhasil di simpan.
    <button type="button" data-dismiss="alert" aria-label="close" class="close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status')=='update')
<div class="alert alert-success alert-dismissible fade show">
    <strong>Berhasil Update!</strong> Data telah berhasil diubah.
    <button type="button" data-dismiss="alert" aria-label="close" class="close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status')=='destroy')
<div class="alert alert-success alert-dismissible fade show">
    <strong>Berhasil Hapus!</strong> Data telah berhasil dihapus.
    <button type="button" data-dismiss="alert" aria-label="close" class="close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
