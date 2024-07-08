@extends('templates.master')

@section('contenido-principal')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Editar Usuario</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $usuario->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="tipo_rol" class="form-label">Tipo de Rol:</label>
                    <select class="form-control" id="tipo_rol" name="tipo_rol" required>
                        @foreach($roles as $rol)
                            <option value="{{ $rol->id }}" {{ $usuario->tipo_rol == $rol->id ? 'selected' : '' }}>{{ $rol->tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
            </form>
        </div>
    </div>
</div>

@endsection