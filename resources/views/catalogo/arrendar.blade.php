@extends('templates.master')

@section('contenido-principal')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Arrendar Vehículo</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('arrendar.procesar', ['id' => $auto->id]) }}" method="POST">
                @csrf
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
</div>
@endsection