<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\tiporol;
use App\Http\Requests\UsuariosRequest;


class UsuariosController extends Controller
{
    // Método para mostrar el formulario de cambio de contraseña
    public function config()
    {
        return view('usuarios.config');
    }

    // Método para actualizar la contraseña del usuario
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password',
            'new_password_confirmation' => 'required|same:new_password',
        ]);

        $user = Auth::user();

        // Verificar que la contraseña actual sea correcta
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'La contraseña actual no es válida.'])->withInput();
        }

        // Actualizar la contraseña del usuario
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('home.index')->with('success', 'Contraseña actualizada correctamente.');
    }

    // Muestra la vista de administración de usuarios
    public function admin()
    {
        /* $usuarios = User::all();
        return view('usuarios.admin', compact('usuarios')); */

        $usuarios = User::with('tiporol')->get();
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
