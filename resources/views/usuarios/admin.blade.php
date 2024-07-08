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
                            @foreach ($usuarios as $num=>$user)
                            <tr>
                                <td class="align-middle">{{$num+1}}</td>
                                <td class="align-middle">{{$user->name}}</td>
                                <td class="align-middle">{{$user->email}}</td>
                                <td class="align-middle">{{$user->tiporol->tipo}}</td>
                                <td>
                                    <!-- Botones para editar y borrar -->
                                    <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
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
@endsection