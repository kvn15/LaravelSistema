@extends('layouts.layout')

@section('title', 'Usuarios')

@section('content')

<div class="section-header">
    <h1>Asignar Roles</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">Configuración</div>
        <div class="breadcrumb-item">Usuarios</div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.personal.create') }}">Rol de Usuario</a></div>
    </div>
</div>

@if ($mensaje = session('mensaje'))
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        Swal.fire({
            icon: 'success',
            title: '{{ $mensaje }}',
        })
    });
</script>
@endif

<div class="section-body">
    <h2 class="section-title">Roles para '{{ $user->nameUser }}'</h2>
    <p class="section-lead">
        Los campos con <span class="text-danger">*</span> son obligatorios para el envío del formulario.
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($user, ['route' => ['config.user.rolePut', $user], 'method' => 'put']) !!}
                        @foreach ($roles as $role)
                            <label>
                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                {{ $role->name }}
                            </label>
                        @endforeach

                        {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
