@extends('layouts.layout')

@section('title', 'Usuarios')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.bootstrap4.min.css') }}">
@endsection

@section('content')

<div class="section-header">
    <h1>Mantenimiento de Usuarios</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">Configuración</div>
        <div class="breadcrumb-item active"><a href="{{ route('config.user.index') }}">Usuarios</a></div>
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
                    <h4 class="mr-auto">Lista de Usuarios</h4>
                    @can('config.user.create')
                    <x-buttom color="primary" ruta="{{ route('config.user.create') }}">
                        <x-slot:icon>
                            <i class="fas fa-plus"></i>
                        </x-slot>
                        <x-slot:title>
                            Nuevo Usuario
                        </x-slot>
                    </x-buttom>
                    @endcan
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-usuario">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombres</th>
                                    <th>Usuario</th>
                                    <th>Fecha Registro</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $users)
                                    <tr>
                                        <td>{{ $users->id }}</td>
                                        <td>{{ $users->name }}</td>
                                        <td>{{ $users->nameUser }}</td>
                                        <td>{{ $users->created_at }}</td>
                                        <td class="d-flex">
                                            @can('config.user.edit')
                                            <x-buttom color="warning align-self-start" ruta="{{ route('config.user.edit', $users) }}">
                                                <x-slot:icon><i class="fas fa-pen"></i></x-slot>
                                                <x-slot:title></x-slot>
                                            </x-buttom>
                                            <x-buttom color="info align-self-start ml-2" ruta="{{ route('config.user.role', $users) }}">
                                                <x-slot:icon><i class="fas fa-user-tag"></i></x-slot>
                                                <x-slot:title></x-slot>
                                            </x-buttom>
                                            @endcan
                                            @can('config.user.destroy')
                                            <form action="{{ route('config.user.destroy', $users) }}" method="POST" class="ml-2 formulario-elimininar">
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
    <script src="{{ asset('js/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#table-usuario').DataTable({
                order: [[0, 'desc']]
            });

            $(".formulario-elimininar").submit(function(e){
                e.preventDefault();
                Swal.fire({
                    title: '¿Desea Eliminar el usuario?',
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
        });
    </script>
@endsection
