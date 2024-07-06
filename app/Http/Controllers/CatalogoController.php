<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\auto;
use App\Models\marca;
use App\Models\tipoauto;
use Carbon\Carbon;

class CatalogoController extends Controller
{
    public function index(){
        $autos = auto::all();
        return view('catalog.index', compact('autos'));
    }

    public function show(){
        $arriendoauto = arriendoauto::all();
        return view('catalog.index',compact('arriendoauto'));
    }

    public function storeBuy(Request $request){
        $request->validated();
        $arriendoauto = new arriendoauto();
        $arriendoauto->auto = $request->auto;
        $arriendoauto->usuario= $request->usuario;
        $arriendoauto->fecha_inicio= $request->fecha_inicio;
        $arriendoauto->fecha_fin = $request->fecha_fin;
        $arriendoauto->fecha_entrega = $request->fecha_entrega;
        $arriendoauto->fecha_devolucion = null;
        $arriendoauto->save();
        return redirect()->route('catalog.index');
    }

}
