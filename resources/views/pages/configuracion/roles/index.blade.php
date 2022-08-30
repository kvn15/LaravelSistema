@extends('layouts.layout')

@section('title', 'Usuarios')

@section('content')

<div class="section-header">
    <h1>Mantenimiento de Roles</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">Configuración</div>
        <div class="breadcrumb-item active"><a href="{{ route('config.roles.index') }}">Roles</a></div>
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mr-auto">Lista de Roles</h4>
                    @can('config.roles.create')
                    <x-buttom color="primary" ruta="{{ route('config.roles.create') }}">
                        <x-slot:icon>
                            <i class="fas fa-plus"></i>
                        </x-slot>
                        <x-slot:title>
                            Nuevo Rol
                        </x-slot>
                    </x-buttom>
                    @endcan
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-personal">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Roles</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($role as $roles)
                                    <tr>
                                        <td>{{ $roles->id }}</td>
                                        <td>{{ $roles->name }}</td>
                                        <td class="d-flex">
                                            @can('config.roles.edit')
                                            <x-buttom color="warning align-self-start" ruta="{{ route('config.roles.edit', $roles) }}">
                                                <x-slot:icon><i class="fas fa-pen"></i></x-slot>
                                                <x-slot:title></x-slot>
                                            </x-buttom>
                                            @endcan
                                            @can('config.roles.destroy')
                                            <form action="{{ route('config.roles.destroy', $roles) }}" method="POST" class="ml-2 formulario-elimininar">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn icon-left btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection


@section('script')
    <script>
        $(document).ready(function () {
            $(".formulario-elimininar").submit(function(e){
                e.preventDefault();
                Swal.fire({
                    title: '¿Desea Eliminar el Rol?',
                    text: "Se eliminara de manera permanente",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!',
                    cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    })
            });
        })
    </script>
@endsection
