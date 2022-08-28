@extends('layouts.layout')

@section('title', 'Personal')

@section('content')

    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.personal.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
        <h1>Editar Personal</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Administración</div>
            <div class="breadcrumb-item">Personal</div>
            <div class="breadcrumb-item active"><a href="{{ route('admin.personal.edit', $personal) }}">Editar Personal</a></div>
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
                        <form action="{{ route('admin.personal.update', $personal) }}" method="POST" autocomplete="off">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="form-group col-12 col-md-6 col-lg-4">
                                    <label>Nombres <span class="text-danger">*</span></label>
                                    <input type="text" name="nombres" class="form-control" placeholder="Ejem: Perez Fier"
                                        value="{{ old('nombres', $personal->nombres) }}">
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-4">
                                    <label>Apellidos <span class="text-danger">*</span></label>
                                    <input type="text" name="apellidos" class="form-control" placeholder="Ejem: Abelardo Torres"
                                        value="{{ old('apellidos', $personal->apellidos) }}">
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-4">
                                    <label>Correo</label>
                                    <input type="text" name="correo" class="form-control" placeholder="Ejem: perezF@examp.com"
                                        value="{{ old('correo', $personal->correo) }}">
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-4">
                                    <label>Dirección</label>
                                    <input type="text" name="direccion" class="form-control" placeholder="Ejem: Jr. Manzana 3221"
                                        value="{{ old('direccion', $personal->direccion) }}">
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-4">
                                    <label>Telefono</label>
                                    <input type="text" name="telefono" class="form-control" placeholder="Ejem: 654 123 987"
                                        value="{{ old('telefono', $personal->telefono) }}">
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-4">
                                    <label>Sexo <span class="text-danger">*</span></label>
                                    <select class="form-control" name="sexo">
                                      <option value="M" {{ old('sexo', $personal->sexo) == 'M' ? 'selected' : '' }}>Masculino</option>
                                      <option value="F" {{ old('sexo', $personal->sexo) == 'F' ? 'selected' : '' }}>Femenino</option>
                                    </select>
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

