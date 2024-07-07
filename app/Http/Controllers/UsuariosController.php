<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\UsuariosRequest;


class UsuariosController extends Controller
{
    // Muestra la vista de administración de usuarios
    public function admin()
    {
        $usuarios = User::all();
        return view('usuarios.admin', compact('usuarios'));
    }

    // Muestra la vista de login
    public function login()
    {
        return view('usuarios.login');
    }

    // Maneja la autenticación de usuarios
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    // Muestra la vista de register
    public function register()
    {
        return view('usuarios.register');
    }

    // Maneja el registro de nuevos usuarios
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'tipo_rol'=>'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'tipo_rol'=>$request->tipo_rol,
            'password' => Hash::make($request->password),
            
        ]);

        $user->save();

        Auth::login($user);

        return redirect()->route('home.index');
    }

    // Maneja el cierre de sesión de usuarios
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('usuarios.login');
    }
}
