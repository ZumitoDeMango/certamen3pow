@extends('templates.master')

@section('contenido-principal')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Editar Cliente</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('clientes.update', $cliente->rut) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="rut" class="form-label">RUT:</label>
                    <input type="text" class="form-control" id="rut" name="rut" value="{{ $cliente->rut }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cliente->nombre }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
            </form>
        </div>
    </div>
</div>

@endsection