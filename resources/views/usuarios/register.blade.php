@extends('templates.master')

@section('contenido-principal')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Registro de Usuario</div>
                <div class="card-body">
                    <form action="{{ route('usuarios.store') }}" method="POST">
                        @csrf
                        <!-- Campos del formulario -->
                        <div class="form-group mb-3">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tipo_rol">Rol de la Cuenta</label>
                            <select id="tipo_rol" name="tipo_rol" class="form-control">
                                <option value="0">Seleccione</option>
                                @foreach($tipo_rol as $tipo_rol)
                                <option value="{{$tipo_rol->id}}" @if(old('rol')==$tipo_rol->id) selected @endif>{{ $tipo_rol->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password-confirm">Confirmar Contraseña:</label>
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-success">Registrarse</button>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection