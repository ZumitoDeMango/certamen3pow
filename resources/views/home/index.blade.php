@php  
    $route = 'templates/unlogged'; 
    if(Auth::check()){
        if (Auth::user()->rol_id == 2) {
            $route = 'templates/master'; 
        }else{
            $route = 'templates/unlogged';
        }
    }
@endphp

@extends($route)

@section('contenido-principal')
    <div class="container">
        <div class="row">
            <div class="text-center">
                <h1>Bienvenido a la venta de vehiculos</h1>
            </div>
        </div>
        <div class="row">
            <a type="button" class="btn btn-primary" href="{{ route('catalogo.index') }}">Enlace a catalogo</a>
        </div>
    </div>
@endsection