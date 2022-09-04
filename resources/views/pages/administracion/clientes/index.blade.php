@extends('layouts.layout')

@section('title', 'Clientes')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.bootstrap4.min.css') }}">
@endsection

@section('content')

    <div class="section-header">
        <h1>Clientes</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Administración</div>
            <div class="breadcrumb-item active"><a href="{{ route('admin.cliente.index') }}">Clientes</a></div>
        </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mr-auto">Lista de Clientes</h4>
                        @can('admin.cliente.create')
                        <x-buttom color="primary" ruta="{{ route('admin.cliente.create') }}">
                            <x-slot:icon>
                                <i class="fas fa-plus"></i>
                            </x-slot>
                            <x-slot:title>
                                Nuevo Cliente
                            </x-slot>
                        </x-buttom>
                        @endcan
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-cliente">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Correo Electronico</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $cliente)
                                        <tr>
                                            <td>{{ $cliente->id }}</td>
                                            <td>{{ $cliente->name }}</td>
                                            <td>{{ $cliente->last_name }}</td>
                                            <td>{{ $cliente->email }}</td>
                                            <td class="d-flex">
                                                <x-buttom color="info align-self-start" ruta="{{ route('admin.cliente.show', $cliente) }}">
                                                    <x-slot:icon><i class="fas fa-eye"></i></x-slot>
                                                    <x-slot:title></x-slot>
                                                </x-buttom>
                                                @can('admin.cliente.edit')
                                                <x-buttom color="warning align-self-start ml-2" ruta="{{ route('admin.cliente.edit', $cliente) }}">
                                                    <x-slot:icon><i class="fas fa-pen"></i></x-slot>
                                                    <x-slot:title></x-slot>
                                                </x-buttom>
                                                @endcan
                                                @can('admin.cliente.destroy')
                                                <form action="{{ route('admin.cliente.destroy', $cliente) }}" method="POST" class="ml-2 formulario-elimininar">
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

@endsection

@section('script')
    <script src="{{ asset('js/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#table-cliente').DataTable({
                order: [[0, 'desc']]
            });

            $(".formulario-elimininar").submit(function(e){
                e.preventDefault();
                Swal.fire({
                    title: '¿Desea Eliminar el cliente?',
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
