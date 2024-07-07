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
                    @foreach($autos as $auto)
                    <tr>
                        <td>{{$auto->id}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm">Editar</a>
                            <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection