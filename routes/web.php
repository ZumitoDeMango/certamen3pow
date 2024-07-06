<?php

use Illuminate\Support\Facades\Route;

//controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\EjecutivoController;
//middlewares

use App\Http\Middleware\Middleware;
use App\Http\Middleware\MiddlewareAdmin;


/* rutas de home */
Route::get('/',[HomeController::class,'index'])->name('home.index');

/*rutas de Usuario*/
Route::get('/login',[UsuariosController::class,'login'])->name('usuarios.login');
Route::get('/register',[UsuariosController::class,'register']) ->name('usuarios.register');

Route::post('/loginUser',[UsuariosController::class,'loginUser'])->name('usuarios.loginUser');
Route::post('/registerUser',[UsuariosController::class,'registerUser'])->name('usuarios.registerUser');

/* rutas de ejecutivo */

Route::get('/ejecutivo',[EjecutivoController::class,'index'])->name('ejecutivo.index')->middleware(Middleware::class);


/* rutas de catalog */

Route::get('/catalog',[CatalogoController::class,'index'])->name('catalog.index')->middleware(Middleware::class);
Route::get('/catalog/show',[CatalogoController::class,'show'])->name('catalog.show')->middleware(Middleware::class);
Route::post('/catalog/storebuy',[CatalogoController::class,'storebuy'])->name('catalog.store')->middleware(Middleware::class);


/* rutas de admin */
// home
Route::get('/admin',[AdminController::class,'index'])->name('admin.home')->middleware(MiddlewareAdmin::class); // home de admin
// user managment
Route::get('/admin/usuarios',[AdminController::class,'listUsers'])->name('admin.usuarios')->middleware(MiddlewareAdmin::class); // lista de usuarios
Route::post('/admin/store',[AdminController::class,'storeUsers'])->name('admin.store.user')->middleware(MiddlewareAdmin::class); // formulario de creacion de usuarios
Route::get('/admin/edit',[AdminController::class,'editUsersstore'])->name('admin.edit.user')->middleware(MiddlewareAdmin::class); // formulario de edicion de usuarios
Route::delete('/admin/delete',[AdminController::class,'deleteUsers'])->name('admin.delete.user')->middleware(MiddlewareAdmin::class); // formulario de eliminacion de usuarios
// cartipe gestion
Route::get('/admin/cartypes',[AdminController::class,'listCartypes'])->name('admin.cartypes')->middleware(MiddlewareAdmin::class); // lista de tipos de autos
Route::get('/admin/cartypeform',[AdminController::class,'cartypeForm'])->name('admin.cartypeform')->middleware(MiddlewareAdmin::class); // formulario de creacion de tipos de autos
Route::post('/admin/storeCartype',[AdminController::class,'storeCartypes'])->name('admin.store.cartype')->middleware(MiddlewareAdmin::class); // formulario de creacion de tipos de autos
Route::post('/admin/editCartype',[AdminController::class,'editCartypesstore'])->name('admin.edit.cartype')->middleware(MiddlewareAdmin::class); // formulario de edicion de tipos de autos
Route::delete('/admin/deleteCartype',[AdminController::class,'deleteCartypes'])->name('admin.delete.cartype')->middleware(MiddlewareAdmin::class); // formulario de eliminacion de tipos de autos

// car gestion
Route::get('/admin/cars',[AdminController::class,'listCars'])->name('admin.cars')->middleware(MiddlewareAdmin::class); // lista de autos
Route::get('/admin/carform',[AdminController::class,'carForm'])->name('admin.carform')->middleware(MiddlewareAdmin::class); // formulario de creacion de autos
Route::post('/admin/storeCar',[AdminController::class,'storeCars'])->name('admin.store.car')->middleware(MiddlewareAdmin::class); // formulario de creacion de autos
Route::post('/admin/editCar',[AdminController::class,'editCarsstore'])->name('admin.edit.car')->middleware(MiddlewareAdmin::class); // formulario de edicion de autos
Route::delete('/admin/deleteCar',[AdminController::class,'deleteCars'])->name('admin.delete.car')->middleware(MiddlewareAdmin::class); // formulario de eliminacion de autos



//fock off
Route::get('/logout',[UsuariosController::class,'logout'])->name('logout') ->middleware(Middleware::class);
Route::post('/usuario/selfedit',[UsuariosController::class,'selfedit'])->name('self.edit')->middleware(Middleware::class);