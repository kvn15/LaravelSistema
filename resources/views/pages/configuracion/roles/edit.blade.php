@extends('layouts.layout')

@section('title', 'Rol')

@section('content')

<div class="section-header">
    <div class="section-header-back">
        <a href="{{ route('config.roles.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Editar Rol</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">Configuración</div>
        <div class="breadcrumb-item">Roles</div>
        <div class="breadcrumb-item active"><a href="{{ route('config.roles.edit',$role) }}">Editar Rol</a></div>
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
    <h2 class="section-title">Formulario de Registro</h2>
    <p class="section-lead">
        Los campos con <span class="text-danger">*</span> son obligatorios para el envío del formulario.
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                {!! Form::model($role, ['route' => ['config.roles.update', $role], 'method' => 'put', 'autocomplete' => 'off']) !!}
                    <div class="card-body">

                        <div class="row">
                            <div class="form-group col-12">
                                <label>Nombre Rol <span class="text-danger">*</span></label>
                                {!! Form::text('name', null, ['class' => 'form-control '. ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <h5>Lista de Permisos</h5>

                        <div class="col-12 p-0">
                            @foreach ($permissions as $permission)
                                <div class="custom-control custom-checkbox">
                                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'custom-control-input', 'id' => $permission->id]) !!}
                                    <label class="custom-control-label" for="{{ $permission->id }}">
                                        {{ $permission->description }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-primary float-right">Enviar Formulario</button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>

@endsection
