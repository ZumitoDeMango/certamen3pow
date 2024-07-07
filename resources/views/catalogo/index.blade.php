@extends('templates.master')

@section('contenido-principal')

<div class="container">
    <h2>Autos Disponibles para Arrendar</h2>
    <div class="row">
        <!-- HTML para mostrar la tabla de autos -->
        <div class="container mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo de Auto</th>
                        <th>Marca</th>
                        <th>Color</th>
                        <th>Placa</th>
                        <th>Año</th>
                        <th>Foto</th>
                        <th>Estado</th>
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Ejemplo de fila -->
                    @foreach($autos as $num=>$auto)
                    <tr>
                        <td>{{$num+1}}</td>
                        <td>{{$auto->tipoauto->tipo_auto}}</td> {{--a saber porque no lo pesca {{$auto->tipo_auto->tipo_auto}}--}}
                        <td></td>
                        {{-- <td>{{$auto->marca}}</td> --}}
                        <td>{{$auto->color}}</td>
                        <td>{{$auto->placa}}</td>
                        <td>{{$auto->anio}}</td>
                        <td></td>
                        <td></td>
                        <td>
                        <!-- Botón para abrir el modal de arrendamiento -->
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalArrendar{{ $auto->id }}">
                            Arrendar
                        </button>

                        <!-- Modal de arrendamiento -->
                        <div class="modal fade" id="modalArrendar{{ $auto->id }}" tabindex="-1" aria-labelledby="modalArrendarLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalArrendarLabel">Arrendar Vehículo</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Formulario para arrendar el vehículo -->
                                        <form action="{{ route('arrendar', ['id' => $auto->id]) }}" method="POST">
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
                        </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection