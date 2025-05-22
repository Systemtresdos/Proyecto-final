<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function perfil($id)
    {
        return view('cliente.perfil', compact('roles'));
    }
    public function editarPerfil(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        if(Auth::user()->id !== $usuario->id) {
            abort(403, 'No tienes permiso para editar este perfil.');
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:255',
        ]);
        
        $usuario->update([
            'nombre' => $request->input('nombre'),
            'correo' => $request->input('correo'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
        ]);
        return redirect()->route('cliente.perfil', ['id' => $usuario->id])->with('success', 'Perfil actualizado correctamente.');
    }

    public function cambiarContrasena(Request $request, $id)
{
    $usuario = Usuario::findOrFail($id);

    if (Auth::id() !== $usuario->id) {
        abort(403, 'No tienes permiso para cambiar la contraseña de este perfil.');
    }

    $request->validate([
        'contrasena_actual' => 'required|string',
        'nueva_contrasena' => 'required|string|min:8|confirmed',
    ]);

    if (!Hash::check($request->input('contrasena_actual'), $usuario->password)) {
        return redirect()->back()->withErrors(['contrasena_actual' => 'La contraseña actual es incorrecta.']);
    }

    $usuario->update([
        'password' => bcrypt($request->input('nueva_contrasena')),
    ]);

    return redirect()->route('cliente.perfil', ['id' => $usuario->id])->with('success', 'Contraseña cambiada correctamente.');
}

    public function eliminarCuenta($id)
    {
        $usuario = Usuario::findOrFail($id);

        if(Auth::user()->id !== $usuario->id) {
            abort(403, 'No tienes permiso para eliminar esta cuenta.');
        }

        $usuario->delete();

        return redirect()->route('/')->with('success', 'Cuenta eliminada correctamente.');
    }
}
