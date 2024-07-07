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
                    <label for="name" class="form-label">Ingrese un nombre de usuario</label>
                    <input type="name" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                    @error('name')
                    <div id="nameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ingrese su correo</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                    @error('email')
                    <div id="emailFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ingrese el rol del usuario</label>
                    <input type="tipo_rol" name="tipo_rol" id="tipo_rol" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ingrese su contraseña</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Confirme su contraseña</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection