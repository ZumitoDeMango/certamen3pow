@extends('templates.master')

@section('contenido-principal')

<div class="container">
    <h2>Gestión de Autos</h2>
    <div class="row">
        <!-- Formulario para agregar nuevo auto -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Agregar Nuevo Auto</h5>
                    <form action="{{ route('catalogo.storeAuto') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Selector de Tipo de Auto -->
                        <div class="form-group">
                            <label for="tipo_auto">Tipo de Auto:</label>
                            <select class="form-control" id="tipo_auto" name="tipo_auto" required>
                                @foreach($tiposAuto as $tipos)
                                    <option value="{{ $tipos->id }}">{{ $tipos->tipo_auto }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Selector de Marca -->
                        <div class="form-group">
                            <label for="marca">Marca:</label>
                            <select class="form-control" id="marca" name="marca" required>
                                @foreach($marcas as $marca)
                                    <option value="{{ $marca->id }}">{{ $marca->nombre_marca }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombre_auto">Nombre Auto:</label>
                            <input type="text" class="form-control" id="nombre_auto" name="nombre_auto" required>
                        </div>
                        <div class="form-group">
                            <label for="color">Color:</label>
                            <input type="text" class="form-control" id="color" name="color" required>
                        </div>
                        <div class="form-group">
                            <label for="placa">Patente:</label>
                            <input type="text" class="form-control" id="placa" name="placa" required>
                        </div>
                        <div class="form-group">
                            <label for="anio">Año:</label>
                            <input type="text" class="form-control" id="anio" name="anio" required>
                        </div>
                        <div class="col-12 my-2">
                            <label for="foto" class="form-label">Foto del Vehiculo</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                        <button type="submit" class="btn btn-success">Agregar Auto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h2>Gestión de Marcas</h2>
    <div class="row">
        <!-- Tabla para mostrar marcas -->
        <div class="col-lg-6">
            <h3>Marcas de Autos</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ford</td>
                        <td>
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Formulario para agregar nueva marca -->
        <div class="col-lg-6">
            <h3>Agregar Nueva Marca</h3>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre de la Marca:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <button type="submit" class="btn btn-success">Agregar Marca</button>
            </form>
        </div>
    </div>
</div>

@endsection