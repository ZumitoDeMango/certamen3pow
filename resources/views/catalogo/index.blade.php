@extends('templates.master')

@section('contenido-principal')

<div class="container">
    <h2>Autos Disponibles para Arrendar</h2>
    <div class="row">
        <!-- Card de Auto -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="ruta/a/la/foto.jpg" alt="Foto del Auto">
                <div class="card-body">
                    <h5 class="card-title">Marca y Modelo</h5>
                    <p class="card-text">Tipo: Tipo de Auto</p>
                    <p class="card-text">Color: Color del Auto</p>
                    <p class="card-text">Año: Año del Auto</p>
                    <a href="#" class="btn btn-primary">Ver Detalles</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection