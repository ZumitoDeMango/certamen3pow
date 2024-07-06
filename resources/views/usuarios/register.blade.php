@extends('templates/unlogged')

@section('titulo')
    <title>Register</title>
@endsection

@section('contenido-principal')

<div class="d-flex justify-content-center">
    <div class="col-12 col-md-9 col-lg-6">
        <div class="container">
            <form action="{{route('usuarios.registerUser')}}" method="POST">
                @csrf
                <div class="mb-3 text-center">
                    <h3>Register</h3>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ingrese su correo</label>
                    <input type="email" name="" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ingrese su contraseña</label>
                    <input type="password" name="" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Confirme su contraseña</label>
                    <input type="password" name="" id="" class="form-control">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection