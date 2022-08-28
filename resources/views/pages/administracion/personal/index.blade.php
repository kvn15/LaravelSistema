@extends('layouts.layout')

@section('title', 'Personal')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.bootstrap4.min.css') }}">
@endsection

@section('content')

    <div class="section-header">
        <h1>Personal</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Administración</div>
            <div class="breadcrumb-item active"><a href="{{ route('admin.personal.index') }}">Personal</a></div>
        </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mr-auto">Lista de Personal</h4>
                        <x-buttom color="primary" ruta="{{ route('admin.personal.create') }}">
                            <x-slot:icon>
                                <i class="fas fa-plus"></i>
                            </x-slot>
                            <x-slot:title>
                                Nuevo Personal
                            </x-slot>
                        </x-buttom>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-personal">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($persons as $personal)
                                        <tr>
                                            <td>{{ $personal->id }}</td>
                                            <td>{{ $personal->nombres }}</td>
                                            <td>{{ $personal->apellidos }}</td>
                                            <td>
                                                <livewire:administracion.personal-estado :personal="$personal"/>

                                            </td>
                                            <td class="d-flex">
                                                <x-buttom color="warning align-self-start" ruta="{{ route('admin.personal.edit', $personal) }}">
                                                    <x-slot:icon><i class="fas fa-pen"></i></x-slot>
                                                    <x-slot:title></x-slot>
                                                </x-buttom>
                                                <form action="{{ route('admin.personal.destroy', $personal) }}" method="POST" class="ml-2 formulario-elimininar">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn icon-left btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
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
            $('#table-personal').DataTable({
                order: [[0, 'desc']]
            });

            $(".formulario-elimininar").submit(function(e){
                e.preventDefault();
                Swal.fire({
                    title: '¿Desea Eliminar el personal?',
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
