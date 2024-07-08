@extends('templates.master')

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
                                <th>nombre</th>
                                <th>email</th>
                                <th>tipo rol</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($User as $num=>$usuarios)
                            <tr>
                                <td class="align-middle">{{$num+1}}</td>
                                <td class="align-middle">{{$usuarios->name}}</td>
                                <td class="align-middle">{{$usuarios->email}}</td>
                                <td class="align-middle">{{$usuarios->tiporol->tipo}}</td>
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
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection