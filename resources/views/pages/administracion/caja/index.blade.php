@extends('layouts.layout')

@section('title', 'Caja')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.bootstrap4.min.css') }}">
@endsection

@section('content')

    <div class="section-header">
        <h1>Caja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Administración</div>
            <div class="breadcrumb-item active"><a href="{{ route('admin.caja.index') }}">Caja</a></div>
        </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mr-auto">Lista de Cajas</h4>
                        @can('admin.caja.create')
                        <x-buttom color="primary" ruta="{{ route('admin.caja.create') }}">
                            <x-slot:icon>
                                <i class="fas fa-plus"></i>
                            </x-slot>
                            <x-slot:title>
                                Nueva Caja
                            </x-slot>
                        </x-buttom>
                        @endcan
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-caja">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre Caja</th>
                                        <th>Importe Caja</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cajas as $caja)
                                        <tr>
                                            <td>{{ $caja->codigo }}</td>
                                            <td>{{ $caja->name }}</td>
                                            <td>{{ $caja->importe_caja }}</td>
                                            <td>{{ $caja->estadoName }}</td>
                                            <td class="d-flex">
                                                @can('admin.caja.edit')
                                                <x-buttom color="warning align-self-start ml-2" ruta="{{ route('admin.caja.edit', $caja) }}">
                                                    <x-slot:icon><i class="fas fa-pen"></i></x-slot>
                                                    <x-slot:title></x-slot>
                                                </x-buttom>
                                                @endcan
                                                @can('admin.caja.destroy')
                                                <form action="{{ route('admin.caja.destroy', $caja) }}" method="POST" class="ml-2 formulario-elimininar">
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
            $('#table-caja').DataTable({
                order: [[0, 'desc']]
            });

            $(".formulario-elimininar").submit(function(e){
                e.preventDefault();
                Swal.fire({
                    title: '¿Desea Eliminar la Caja?',
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
