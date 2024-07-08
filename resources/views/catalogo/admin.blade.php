@extends('templates.master')

@section('contenido-principal')

<div class="container">
    <div class="row">
        <h2>Gestión de Autos</h2>
        {{-- Tabla para eliminar o editar autos --}}
        <div class="col-lg-8">
            <div class="row">
                <div class="container">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tipo de Auto</th>
                                <th>Marca</th>
                                <th>Nombre Vehiculo</th>
                                <th>Color</th>
                                <th>Placa</th>
                                <th>Año</th>
                                <th>Estado</th>
                                <th colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($autos as $num=>$auto)
                            <tr>
                                <td>{{$num+1}}</td>
                                <td>{{$auto->tipoauto->tipo_auto}}</td>
                                <td>{{$auto->Marca->nombre_marca}}</td>
                                <td>{{$auto->nombre_auto}}</td>
                                <td>{{$auto->color}}</td>
                                <td>{{$auto->placa}}</td>
                                <td>{{$auto->anio}}</td>
                                <td></td>
                                <td>
                                    <!-- Botones para editar y borrar -->
                                    <a href="" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <div class="row mt-5">
        <h2>Gestión de Autos</h2>
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
    <div class="row">
        <h2>Gestión de Marcas</h2>
    <div class="row mt-5">
        <h2>Gestión de Marcas</h2>
        <!-- Tabla para mostrar marcas -->
        <div class="col-lg-6 mt-2">
            <h3>Lista de Marcas</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($marcas as $marca)
                    <tr>
                        <td>{{$marca->id}}</td>
                        <td>{{$marca->nombre_marca}}</td>
                        <td>
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Formulario para agregar nueva marca -->
        <div class="col-lg-6 mt-2">
            <h3>Agregar Nueva Marca</h3>
            <form action="{{route('catalogo.storeMarca')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre_marca">Nombre de la Marca:</label>
                    <input type="text" class="form-control" id="nombre_marca" name="nombre_marca" required>
                </div>
                <button type="submit" class="btn btn-success">Agregar Marca</button>
            </form>
        </div>
    </div>
</div>

@endsection