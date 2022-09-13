@extends('layouts.layout')

@section('title', 'Marcas')

@section('content')

    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.marca.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
        <h1>Editar Marca</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Administración</div>
            <div class="breadcrumb-item">Marcas</div>
            <div class="breadcrumb-item active"><a href="{{ route('admin.marca.edit', $marca) }}">Editar Marca</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Formulario de Editar</h2>
        <p class="section-lead">
            Los campos con <span class="text-danger">*</span> son obligatorios para el envío del formulario.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        {!! Form::model($marca,['route' => ['admin.marca.update',$marca],'method' => 'put','autocomplete' => 'off']) !!}
                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label>Nombre Marca <span class="text-danger">*</span></label>
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    @error('name')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label>Estado <span class="text-danger">*</span></label>
                                    {!! Form::select('estado', [
                                        1 => 'Habilitado',
                                        0 => 'Inhabilitado'
                                    ], null, ['class' => 'form-control']) !!}
                                    @error('estado')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    {!! Form::submit('Enviar Formulario', ['class' => 'btn btn-primary']) !!}
                                </div>

                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

