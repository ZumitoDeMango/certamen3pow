<?php

use Illuminate\Support\Facades\Route;

//controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CatalogoController;

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

/* rutas de catalogo */
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');
Route::get('/catalogo/admin', [CatalogoController::class, 'admin'])->name('catalogo.admin')->middleware('auth');
Route::post('/catalogo/admin/auto', [CatalogoController::class, 'storeAuto'])->name('catalogo.storeAuto')->middleware('auth');
Route::post('/catalogo/admin/marca', [CatalogoController::class, 'storeMarca'])->name('catalogo.storeMarca')->middleware('auth');
Route::post('/catalogo/admin/marca/{id}/delete', [CatalogoController::class, 'deleteMarca'])->name('catalogo.deleteMarca')->middleware('auth');