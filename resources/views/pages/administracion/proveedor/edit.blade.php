@extends('layouts.layout')

@section('title', 'Proveedor')

@section('content')
<div class="section-header">
    <div class="section-header-back">
        <a href="{{ route('admin.proveedor.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
    <h1>Editar Proveedor</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">Administración</div>
        <div class="breadcrumb-item">Proveedor</div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.proveedor.edit', $proveedor) }}">Editar Proveedor</a></div>
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

                    {!! Form::model($proveedor, ['route' => ['admin.proveedor.update', $proveedor], 'method' => 'put', 'autocomplete' => 'off']) !!}
                    <div class="row">
                        <div class="form-group col-12 col-md-6 col-lg-3">
                            <label>Tipo de Documento <span class="text-danger">*</span></label>
                            {!! Form::select('identifications_id', $identifications, null, ['class' => 'form-control']) !!}
                            @error('identifications_id')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-3">
                            <label>N° de Documento <span class="text-danger">*</span></label>
                            {!! Form::text('identification', null, ['class' => 'form-control', 'placeholder' => 'Ejem: 1075978644']) !!}
                            @error('identifications_id')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror     
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-3">
                            <label>Nombre Proveedor <span class="text-danger">*</span></label>
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ejem: Plaza VCoxc Sac']) !!}
                            @error('name')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror     
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-3">
                            <label>Correo Proveedor <span class="text-danger">*</span></label>
                            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ejem: plVco@example.com']) !!}
                            @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror     
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-3">
                            <label>Encargado <span class="text-danger">*</span></label>
                            {!! Form::text('emcargado', null, ['class' => 'form-control', 'placeholder' => 'Ejem: Jose Perz Albeo']) !!}
                            @error('emcargado')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror     
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-3">
                            <label>Telefono</label>
                            {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ejem: +51 2535488664']) !!}
                            @error('telefono')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror     
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label>Dirección Proveedor <span class="text-danger">*</span></label>
                            {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ejem: Av. Las Palmeras 525 $']) !!}
                            @error('direccion')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror  
                        </div>

                        <div class="form-group col-12 col-md-6 col-lg-3">
                            <label>Estado</label>
                            {!! Form::select('estado', [
                                1 => 'Habilitado',
                                0 => 'Inhabilitado',
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