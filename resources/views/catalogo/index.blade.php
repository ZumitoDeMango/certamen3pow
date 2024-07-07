@php  
    $route = 'templates/unlogged'; 
    if(Auth::check()){
        if (Auth::user()->rol_id == 2) {
            $route = 'templates/master'; 
        }else{
            $route = 'templates/user';
        }
    }
@endphp

@extends($route)
@section('contenido-principal')
    <div class="container">
        <h1 class="text-center">Vehículos Disponibles</h1>
        <div class="row">
            <!-- Vehicle 1 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="OIP.jpeg" class="card-img-top" alt="Vehículo 1">
                    <div class="card-body">
                        <h5 class="card-title">Toyota Corolla</h5>
                        <p class="card-text">Un vehículo confiable y económico, ideal para viajes urbanos.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary w-100">Arrendar</a>
                    </div>
                </div>
            </div>
            <!-- Vehicle 2 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="moto.jpeg" class="card-img-top" alt="Vehículo 2">
                    <div class="card-body">
                        <h5 class="card-title">Moto Toyota</h5>
                        <p class="card-text">.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary w-100">Arrendar</a>
                    </div>
                </div>
            </div>
            <!-- Vehicle 3 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="moto.jpeg" class="card-img-top" alt="Vehículo 3">
                    <div class="card-body">
                        <h5 class="card-title">Ford Mustang</h5>
                        <p class="card-text">Un coche deportivo con alto rendimiento, ideal para los amantes de la velocidad.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary w-100">Arrendar</a>
                    </div>
                </div>
            </div>
            <!-- Vehicle 4 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="OIP.jpeg" class="card-img-top" alt="Vehículo 1">
                    <div class="card-body">
                        <h5 class="card-title">Toyota Corolla</h5>
                        <p class="card-text">Un vehículo confiable y económico, ideal para viajes urbanos.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary w-100">Arrendar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection