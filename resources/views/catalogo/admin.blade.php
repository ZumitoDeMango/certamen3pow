@extends('templates.master')

@section('contenido-principal')

<div class="container">
    <h2>Gestión de Autos</h2>
    <div class="row">
        <!-- Ejemplo de Card de Auto -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="ruta/a/la/foto.jpg" alt="Foto del Auto">
                <div class="card-body">
                    <h5 class="card-title">Marca y Modelo</h5>
                    <p class="card-text">Tipo: Tipo de Auto</p>
                    <p class="card-text">Color: Color del Auto</p>
                    <p class="card-text">Año: Año del Auto</p>
                    <a href="#" class="btn btn-primary">Editar</a>
                    <a href="#" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
        <!-- Formulario para agregar nuevo auto -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Agregar Nuevo Auto</h5>
                    <form action="ruta/para/agregar/auto" method="POST">
                        <!-- Campos del formulario -->
                        <div class="form-group">
                            <label for="marca">Marca:</label>
                            <input type="text" class="form-control" id="marca" name="marca" required>
                        </div>
                        <div class="form-group">
                            <label for="modelo">Modelo:</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" required>
                        </div>
                        <div class="form-group">
                            <label for="color">Color:</label>
                            <input type="text" class="form-control" id="color" name="color" required>
                        </div>
                        <div class="form-group">
                            <label for="anio">Año:</label>
                            <input type="number" class="form-control" id="anio" name="anio" required>
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