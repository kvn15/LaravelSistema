@props(['color','ruta'])
<a href="{{ $ruta }}"  class="btn icon-left btn-{{ $color }}">
    {{ $icon }}
    {{ $title }}
</a>
