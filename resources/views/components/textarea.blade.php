@props(['label', 'name', 'type'=>'text', 'value'=>''])
<div class="form-group">
    <Label>{{ $label }}</Label>
    <textarea type="{{ $type }}" class="form-control{{ $errors->has($name) ? ' is-invalid' : ''}}" name="{{ $name }}">{{ old($name,$value) }}</textarea>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
