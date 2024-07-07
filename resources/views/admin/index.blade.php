@php
    $route = 'templates/unlogged'
@endphp
@if (Auth::check()) 
    @if (Auth::user()->tipo_rol == 2)
        @php
        $route = 'templates/admin'
        @endphp
    @else
        @php
        $route = 'templates/user'
        @endphp
    @endif
@endif

@extends($route)

@section('contenido-principal')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Bienvenido al panel de administración</h1>
            </div>
            <div class="row">
                <div class="col">
                    <h3>Gestion de usuarios</h3>
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>email</th>
                                <th>tipo rol</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle"></td>
                                <td class="align-middle"></td>
                                <td class="align-middle"></td>
                                <td class="align-middle"></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger pb-0" data-bs-toggle="modal" data-bs-target="">
                                        <span class="material-icons">delete</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning pb-0 text-white" data-bs-toggle="tooltip" data-bs-title="">
                                        <span class="material-icons">edit</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <h3>Gestion de vehiculos</h3>
                </div>
            </div>
        </div>
    </div>
@endsection