<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /* funciones para el retorno de las vistas */
    public function index(){
        return view('home.index');
    }

}
