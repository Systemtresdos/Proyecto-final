<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function iniciarSesion(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required|min:6'
        ]);
        $credentials = $request->only('correo', 'contrasena');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'correo' => 'Las credenciales no coinciden con nuestros registros.',
            ]);
        }
    }
    public function cerrarSesion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Has cerrado sesión correctamente.');
    }
}
