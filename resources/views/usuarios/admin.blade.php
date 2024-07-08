@extends('templates.master')

@section('contenido-principal')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Bienvenido al panel de administración</h1>
            </div>
            <div class="row">
                <div class="col mt-2">
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
<<<<<<< HEAD
                            @foreach ($usuarios as $num=>$usuarios)
=======
                            @foreach ($usuarios as $num=>$user)
>>>>>>> bd3f8b10adb9acdfbe813d937b08dd944fd191e8
                            <tr>
                                <td class="align-middle">{{$num+1}}</td>
                                <td class="align-middle">{{$user->name}}</td>
                                <td class="align-middle">{{$user->email}}</td>
                                <td class="align-middle">{{$user->tipo_rol}}</td>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection