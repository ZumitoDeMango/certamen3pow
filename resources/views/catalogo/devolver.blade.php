@extends('templates.master')

@section('contenido-principal')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Devolver Auto</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('catalogo.devolverAuto') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="auto_id" class="form-label">Seleccione el Auto a Devolver:</label>
                    <select class="form-select" id="auto_id" name="auto_id" required>
                        <option value="">Seleccione un auto...</option>
                        @foreach($autos as $auto)
                        <option value="{{ $auto->id }}">{{ $auto->marca }} - {{ $auto->nombre_auto }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fecha_devolucion" class="form-label">Fecha de Devolución:</label>
                    <input type="date" class="form-control" id="fecha_devolucion" name="fecha_devolucion" required>
                </div>
                <button type="submit" class="btn btn-primary">Confirmar Devolución</button>
            </form>
        </div>
    </div>
</div>

@endsection