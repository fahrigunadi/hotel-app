@props(['label','value','icon','link'=>'', 'background'])
<div class="small-box {{ $background }}">
    <div class="inner">
    <h3>{{ $value }}</h3>

    <p>{{ $label }}</p>
    </div>
    <div class="icon">
    <i class="{{ $icon }}"></i>
    </div>
    @if ($link)
    <a href="{{ $link }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    @endif
</div>

