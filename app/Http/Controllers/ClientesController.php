<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rut' => 'required|unique:clientes,rut',
            'nombre' => 'required',
        ]);

        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente agregado exitosamente.');
    }

    public function edit($rut)
    {
        $cliente = Cliente::findOrFail($rut);
        return view('clientes.edit', compact('cliente'));
    }

    /* Actualizar cliente */
    public function update(Request $request, $rut)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $cliente = Cliente::findOrFail($rut);
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /* Borrar cliente */
    public function destroy($rut)
    {
        $cliente = Cliente::findOrFail($rut);
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente borrado exitosamente.');
    }
}
