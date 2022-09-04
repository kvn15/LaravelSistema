@extends('layouts.layout')

@section('title', 'Cliente')

@section('content')

    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.cliente.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
        <h1>Nuevo Cliente</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Administración</div>
            <div class="breadcrumb-item">Cliente</div>
            <div class="breadcrumb-item active"><a href="{{ route('admin.cliente.create') }}">Nuevo Cliente</a></div>
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
                        <form action="{{ route('admin.cliente.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12 col-md-6 col-lg-3">
                                    <label>Nombres <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Ejem: Perez Fier"
                                        value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-3">
                                    <label>Apellidos <span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Ejem: Abelardo Torres"
                                        value="{{ old('last_name') }}">
                                        @error('last_name')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-3">
                                    <label>Tipo de Identificacion</label>
                                    <select class="form-control" name="identifications_id">
                                        @foreach ($identification as $identifications)
                                            <option value="{{ $identifications->id }}" {{ old('identifications_id') == $identifications->id ? 'selected' : '' }}>
                                                    {{ $identifications->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('identifications_id')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-3">
                                    <label>Identificacion</label>
                                    <input type="text" name="identification" class="form-control" placeholder="Ejem: 73898045"
                                        value="{{ old('identification') }}">
                                    @error('identification')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-12 col-md-6 col-lg-3">
                                    <label>Correo</label>
                                    <input type="email" name="email" class="form-control" placeholder="Ejem: perezF@examp.com"
                                        value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 col-lg-6">
                                    <label>Dirección</label>
                                    <input type="text" name="direccion" class="form-control" placeholder="Ejem: Jr. Manzana 3221"
                                        value="{{ old('direccion') }}">
                                        @error('direccion')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-3">
                                    <label>Telefono</label>
                                    <input type="text" name="telefono" class="form-control" placeholder="Ejem: 654 123 987"
                                        value="{{ old('telefono') }}">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

