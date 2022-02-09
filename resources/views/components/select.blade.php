@props(['name','value'=>'', 'dataOption'=>[]])
@php
    $value = old($name,$value);
@endphp
<select name="{{ $name }}"
class="form-control{{ $errors->has($name) ? ' is-invalid' : ''}} form-control-sm" name="{{ $name }}">
    <option value="">Pilih</option>
    @foreach ($dataOption as $row)
    @if ($row['value'] == $value )
        <option value="{{ $row['value'] }}" selected>{{ $row['option'] }}</option>
    @else
        <option value="{{ $row['value'] }}">{{ $row['option'] }}</option>
    @endif
    @endforeach
</select>
