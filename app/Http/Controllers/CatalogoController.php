<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\auto;
use App\Models\marca;
use App\Models\tipoauto;
use App\Models\cliente;
use App\Models\arriendoauto;
use Carbon\Carbon;

class CatalogoController extends Controller
{
    // Muestra la vista del catálogo de autos para los usuarios
    public function index()
    {
        $autos = Auto::where('estado', 'disponible')->with('tipoauto','marca')->get();
        return view('catalogo.index', compact('autos'));
    }

    // Muestra la vista de administración del catálogo de autos
    public function admin()
    {
        $autos = Auto::all();
        $marcas = Marca::whereNull('deleted_at')->get();
        $tipos = TipoAuto::all();
        return view('catalogo.admin', compact('autos', 'marcas', 'tipos'));
    }

    // Maneja la creación de un nuevo auto
    public function storeAuto(Request $request)
    {
        $request->validate([
            'tipo_auto' => 'required|exists:tipos_auto,id',
            'marca' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'placa' => 'required|string|max:255|unique:autos',
            'anio' => 'required|integer',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'estado' => 'required|string|max:255',
        ]);

        $fotoPath = $request->file('foto')->store('fotos', 'public');

        $auto = new Auto([
            'tipo_auto' => $request->tipo_auto,
            'marca' => $request->marca,
            'color' => $request->color,
            'placa' => $request->placa,
            'anio' => $request->anio,
            'foto' => $fotoPath,
            'estado' => $request->estado,
        ]);

        $auto->save();

        return redirect()->route('catalogo.admin')->with('success', 'Auto agregado exitosamente.');
    }

    // Maneja la creación de una nueva marca
    public function storeMarca(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:marcas',
        ]);

        $marca = new Marca([
            'nombre' => $request->nombre,
        ]);

        $marca->save();

        return redirect()->route('catalogo.admin')->with('success', 'Marca agregada exitosamente.');
    }

    // Maneja la eliminación de una marca (soft delete)
    public function deleteMarca($id)
    {
        $marca = Marca::find($id);
        if ($marca) {
            $marca->deleted_at = now();
            $marca->save();
        }

        return redirect()->route('catalogo.admin')->with('success', 'Marca eliminada exitosamente.');
    }
    
    // Método para mostrar la vista de arrendamiento de vehículos
    public function mostrarArrendar($id)
    {
        $auto = Auto::findOrFail($id);
        return view('catalogo.arrendar', compact('auto'));
    }

    // Método para procesar el arrendamiento de vehículos
    public function storeArrendar(Request $request, $id)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'rut_cliente' => 'required|exists:clientes,rut', 
        ]);

        $cliente = cliente::where('rut', $request->rut_cliente)->firstOrFail();

        $fechaInicio = Carbon::parse($request->fecha_inicio);
        $fechaEntrega = $fechaInicio->copy()->addHour();

        $arriendo = new arriendoauto();
        $arriendo->auto = $id;
        $arriendo->rut_cliente = $cliente->rut; 
        $arriendo->fecha_inicio = $fechaInicio;
        $arriendo->fecha_fin = $request->fecha_fin;
        $arriendo->fecha_entrega = $fechaEntrega;
        $arriendo->save();
        return redirect()->route('catalogo.index')->with('success', 'El vehículo ha sido arrendado exitosamente.');
    }
}
