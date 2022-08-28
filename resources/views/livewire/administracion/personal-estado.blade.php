<div>
    <span wire:click="active" class="badge badge-{{ $isActive  ? 'primary' : 'danger' }}">
        {{ $personal->estadoName }}
    </span>
</div>
