@extends('templates.master')

@section('contenido-principal')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Gestionar Clientes</h5>
        </div>
        <div class="card-body">
            <!-- Formulario para agregar un nuevo cliente -->
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="rut" class="form-label">RUT:</label>
                    <input type="text" class="form-control" id="rut" name="rut" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Cliente</button>
            </form>

            <hr>

            <!-- Tabla para listar clientes -->
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>RUT</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->rut }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>
                            <!-- Botones para editar y borrar -->
                            <a href="{{ route('clientes.edit', $cliente->rut) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente->rut) }}" method="POST" style="display:inline-block;">
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

@endsection