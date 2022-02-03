@props(['action', 'header'=>true, 'upload'=>false])
<form action="{{ $action }}" method="post" class="card card-primary"<?= $upload ? ' enctype="multipart/form-data"' : '' ?>>
    @if ($header)
    <div class="card-header">
        <i class="fas fa-edit"></i> Edit
    </div>
    @endif
    <div class="card-body">
        @method('put')
        {{ $slot }}
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
