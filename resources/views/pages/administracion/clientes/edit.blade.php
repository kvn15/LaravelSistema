@extends('layouts.layout')

@section('title', 'Cliente')

@section('content')

    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.cliente.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
        <h1>Editar Cliente</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Administración</div>
            <div class="breadcrumb-item">Cliente</div>
            <div class="breadcrumb-item active"><a href="{{ route('admin.cliente.edit', $cliente) }}">Editar Cliente</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Formulario de Edición</h2>
        <p class="section-lead">
            Los campos con <span class="text-danger">*</span> son obligatorios para el envío del formulario.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::model($cliente, ['route' => ['admin.cliente.update', $cliente], 'method' => 'put', 'autocomplete' => 'off']) !!}
                        <div class="row">
                            <div class="form-group col-12 col-md-6 col-lg-3">
                                <label>Nombres <span class="text-danger">*</span></label>
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ejem: Perez Fier']) !!}
                            </div>
                            <div class="form-group col-12 col-md-6 col-lg-3">
                                <label>Apellidos <span class="text-danger">*</span></label>
                                {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Ejem: Abelardo Torres']) !!}
                            </div>
                            
                            <div class="form-group col-12 col-md-6 col-lg-3">
                                <label>Tipo de Identificacion</label>
                                {!! Form::select('identifications_id',$identification, null, ['class' => 'form-control']) !!}
                                @error('identifications_id')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                @enderror
                            </div>
                            <div class="form-group col-12 col-md-6 col-lg-3">
                                <label>Identificacion</label>
                                {!! Form::text('identification', null, ['class' => 'form-control', 'placeholder' => 'Ejem: 73898045']) !!}
                                @error('identification')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                @enderror
                            </div>
                            
                            <div class="form-group col-12 col-md-6 col-lg-3">
                                <label>Correo</label>
                                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ejem: perezF@examp.com']) !!}
                                @error('email')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                @enderror
                            </div>

                            <div class="form-group col-12 col-md-6 col-lg-6">
                                <label>Dirección</label>
                                {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ejem: Jr. Manzana 3221']) !!}
                                    @error('direccion')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group col-12 col-md-6 col-lg-3">
                                <label>Telefono</label>
                                {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ejem: 654 123 987']) !!}
                                    @error('telefono')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
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

