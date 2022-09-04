@extends('layouts.layout')

@section('title', 'Usuarios')

@section('content')

<div class="section-header">
    <div class="section-header-back">
        <a href="{{ route('config.user.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Editar Usuario</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">Configuración</div>
        <div class="breadcrumb-item">Usuarios</div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.personal.edit', $user) }}">Editar Usuario</a></div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Formulario de Registro</h2>
    <p class="section-lead">
        Los campos con <span class="text-danger">*</span> son obligatorios para el envío del formulario.
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($user,['route' => ['config.user.update', $user],'method' => 'put', 'autocomplete' => 'off']) !!}
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label>Usuario <span class="text-danger">*</span></label>
                                {!! Form::text('nameUser', null, ['class' => 'form-control', 'placeholder' => 'Ejem. Zper12']) !!}
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label>Nombre de Usuario <span class="text-danger">*</span></label>
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ejem. Zardex calda']) !!}
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label>Asignar Personal <span class="text-danger">*</span></label>
                                {!! Form::select('person_id',$person, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary">Enviar Formulario</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
