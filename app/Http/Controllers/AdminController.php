<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\userstoreRequest;
class AdminController extends Controller
{
    //Gestion de Usuarios
    function index(){
        return view('admin.index');
    }
    
    function listUsers(Request $request){
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    function storeUsers(Request $request){
        $request->validated();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tipo_rol = $request->tipo_rol;
        $user->password =Hash::make($request->password);
        $user->save();
        return redirect()->route('usuarios');
    }

    function editUsers(Request $request){
        $user = User::where('id', $request->id)->first();
        return view('admin.edit', compact('user'));
    }

    function editUsersstore(Request $request){
        $user = User::where('id', $request->id)->first();
        if (Auth::user()->tipo_rol == 2 || $user-> id != null){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }
        return redirect()->route('usuarios');
    }

    function deleteUsers(Request $request){
        $user = User::where('id', $request->id)->first();
        $user->delete();
        return redirect()->route('usuarios');
    }

    //Gestion Tipo Auto
    function listCartypes(Request $request){
        $tipoautos=tipoauto::all();
        return view('admin.cartypes', compact('tipoautos'));
    }

    function cartypeForm(){
        //no se que poner aqui
    }

    function storeCartypes(Request $request){
        $request->validated();
        $tipoauto = new tipoauto();
        $tipoauto->tipo_auto=$request->tipo_auto;
        $tipoauto->valor_dia=$request->valor_dia;
        $tipoauto->save();
        return redirect()->route();
    }

    function editCartypestore(Request $request){
        $tipoauto = tipoauto::where('id',$request->id)->first();
        if (Auth::user()->tipo_rol == 2 || $tipoauto-> id != null){
            $tipoauto->valor_dia=$request->valor_dia;
            $tipoauto->save();
        }
        return redirect()->route();
    }
    
    function deleteCartypes(Request $request){
        $tipoauto = tipoauto::where('id',$request->id)->first();
        $tipoauto->delete();
        return redirect()->route();
    }

    //Gestion de Autos
    function listCars(Request $request){
        $autos=auto::all();
        return view('admin.cars', compact('autos'));
    }

    function carForm(){
        //no se que poner aqui
    }

    function storeCars(Request $request){
        $request->validated();
        $auto = new auto();
        $auto->tipo_auto=$request->tipo_auto;
        $auto->marca=$request->marca;
        $auto->color=$request->color;
        $auto->placa=$request->placa;
        $auto->anio=$request->$anio;
        $auto->foto=null;
        $auto->save();
        return redirect()->route();
    }

    function editCarsstore(Request $request){
        $auto = auto::where('id',$request->id)->first();
        if (Auth::user()->tipo_rol == 2 || $auto-> id != null){
            $auto->color=$request->color;
            $auto->placa=$request->placa;
            $auto->anio=$request->$anio;
            $auto->save();
        }
        return redirect()->route();
    }
    
    function deleteCars(Request $request){
        $auto = auto::where('id',$request->id)->first();
        $auto->delete();
        return redirect()->route();
    }

   
}
