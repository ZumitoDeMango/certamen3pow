@extends('templates.master')

@section('contenido-principal')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 text-center">
            <h1>Bienvenido a Autocosmos</h1>
            <div class="mb-3">
                <a href="{{ route('catalogo.index') }}" class="btn btn-primary btn-lg mr-3">Ir al Catálogo</a>
                {{-- si es admin te debe mandar a catalogo.admin --}}
                {{-- si no lo es (usuario normal u otra variante) te manda al catalogo.index --}}
                <a href="" class="btn btn-success btn-lg">Ir a Usuarios</a>
                {{-- si es admin te debe mandar a usuarios.admin --}}
            </div>
        </div>
    </div>
</div>

@endsection