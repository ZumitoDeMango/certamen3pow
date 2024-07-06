<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsuariosController extends Controller
{
    public function login(){
        return view('usuarios.login');
    }
    public function register(){
        return view('usuarios.register');
    }

    function loginUser(Request $request){

        $credentials = [
            'name' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->rol == '1') {
                return redirect()->route('admin.home');
            }else{
                return redirect()->route('ejecutivo.index');
            }
        }

        return back()->withErrors([
            'errors' => 'Errores con las credenciales de acceso',
        ]);
    }

    function registerUser(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->rol = 1;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('usuarios.login');
    }

    function logout(){
        Auth::logout();
        return redirect()->route('home.index');
    }

    function selfedit(Request $request){
        $user = User::where('id', $request->id)->first();
        if (Auth::user()->id || $user-> id != null){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }
        return redirect()->route('usuarios');
    }

}
