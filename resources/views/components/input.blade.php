@props(['label', 'name', 'type'=>'text', 'value'=>'', 'keterangan'=> '', 'onkeydown'=>''])
<div class="form-group">
    <Label>{{ $label }}</Label>
    <input onkeydown="{{ $onkeydown }}" value="{{ old($name,$value) }}" type="{{ $type }}" class="form-control{{ $errors->has($name) ? ' is-invalid' : ''}}" name="{{ $name }}">
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    @if ($keterangan)
        <div class="text-muted">
            <small>{{ $keterangan }}</small>
        </div>
    @endif
</div>
