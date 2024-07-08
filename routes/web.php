<?php

use Illuminate\Support\Facades\Route;

//controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ClientesController;

//middlewares
use App\Http\Middleware\Middleware;
use App\Http\Middleware\MiddlewareAdmin;

/* rutas de home */
Route::get('/',[HomeController::class,'index'])->name('home.index');

/* rutas de usuarios */
Route::get('/admin', [UsuariosController::class, 'admin'])->name('usuarios.admin')->middleware('auth');
Route::get('/login', [UsuariosController::class, 'login'])->name('usuarios.login')->middleware('guest');
Route::post('/login', [UsuariosController::class, 'authenticate'])->name('usuarios.authenticate');
Route::get('/register', [UsuariosController::class, 'register'])->name('usuarios.register')->middleware('guest');
Route::post('/register', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::post('/logout', [UsuariosController::class, 'logout'])->name('usuarios.logout')->middleware('auth');
Route::get('/config', [UsuariosController::class, 'config'])->name('usuarios.config');
Route::put('/config/update-password', [UsuariosController::class, 'updatePassword'])->name('usuarios.updatePassword');
Route::get('/admin/edit/{user}', [UsuariosController::class, 'edit'])->name('usuarios.edit');
Route::put('/admin/{user}', [UsuariosController::class, 'update'])->name('usuarios.update');
Route::delete('/admin/{user}',[UsuariosController::class, 'destroy'])->name('usuarios.destroy');

/* rutas de catalogo */
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');
Route::get('/catalogo/admin', [CatalogoController::class, 'admin'])->name('catalogo.admin')->middleware('auth');
Route::post('/catalogo/admin/auto', [CatalogoController::class, 'storeAuto'])->name('catalogo.storeAuto')->middleware('auth');
Route::post('/catalogo/admin/marca', [CatalogoController::class, 'storeMarca'])->name('catalogo.storeMarca')->middleware('auth');
Route::post('/catalogo/admin/marca/{id}/delete', [CatalogoController::class, 'deleteMarca'])->name('catalogo.deleteMarca')->middleware('auth');

/* rutas para mostrar el modal de arrendar */
Route::get('/catalogo/arrendar/{id}', [CatalogoController::class, 'mostrarArrendar'])->name('catalogo.arrendar');
Route::post('/catalogo/arrendar/{id}', [CatalogoController::class, 'storeArrendar'])->name('catalogo.storeArrendar'); 

/* rutas de clientes */
Route::get('clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::post('clientes', [ClientesController::class, 'store'])->name('clientes.store');
Route::get('clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
Route::get('clientes/edit/{rut}', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('clientes/{rut}', [ClientesController::class, 'update'])->name('clientes.update');
Route::delete('clientes/{rut}', [ClientesController::class, 'destroy'])->name('clientes.destroy');
