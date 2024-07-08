@extends('templates.master')

@section('contenido-principal')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Arrendar Vehículo {{$auto->Marca->nombre_marca}} {{$auto->nombre_auto}}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('catalogo.storeArrendar', ['id' => $auto->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="rut_cliente" class="form-label">Rut del Cliente:</label>
                    <input type="text" class="form-control" id="rut_cliente" name="rut_cliente" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_inicio" class="form-label">Fecha de Inicio:</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_fin" class="form-label">Fecha de Fin:</label>
                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                </div>
                <button type="submit" class="btn btn-primary">Confirmar Arriendo</button>
            </form>
        </div>
    </div>
    <div class="card">
        <form action="{{ route('catalogo.mostrarDevolver') }}" method="get">
            @csrf
            <button type="submit">Devolver Auto</button>
        </form>
    </div>
</div>
@endsection