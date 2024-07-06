@php
    $route = 'templates/unlogged'
@endphp
@if (Auth::check()) 
    @if (Auth::user()->tipo_rol == 2)
        @php
        $route = 'templates/admin'
        @endphp
    @else
        @php
        $route = 'templates/user'
        @endphp
    @endif
@endif

@extends($route)

@section('contenido-principal')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Bienvenido al panel de administración</h1>
            </div>
        </div>
    </div>
@endsection