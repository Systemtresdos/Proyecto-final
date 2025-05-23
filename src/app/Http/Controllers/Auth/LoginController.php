<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => ['required', 'string'], 
            'password' => ['required', 'string'],
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['correo' => $request->correo, 'password' => $request->password], $request->remember)) {
            if(Auth::usuario()->estado == 'Bloqueado') {
                Auth::logout();
                return back()->withErrors([
                    'usuario' => 'Su cuenta está Bloqueada. Por favor, contacte al administrador.',
                ])->onlyInput('usuario');
            }
            $user = Usuario::findOrFail(Auth::id());
            $user->estado = 'Activo';
            $user->save();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'usuario' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('usuario');
    }

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        $user = Usuario::findOrFail(Auth::id());
        $user->estado = 'Inactivo';
        $user->save();

        Auth::logout();
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 

        return redirect('/'); 
    }
}
