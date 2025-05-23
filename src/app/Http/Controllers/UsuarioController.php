<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function indice()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function vistaCrear()
    {
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function registrar(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'alpha', 'max:255'],
            'apellido_p' => ['required', 'string', 'alpha', 'max:255'],
            'apellido_m' => ['required', 'string', 'alpha', 'max:255'],
            'ci' => ['required', 'string','max:8', 'unique:'.Usuario::class],
            'telefono' => ['required', 'string', 'max:10', 'unique:'.Usuario::class],
            'usuario' => ['required', 'string', 'max:255', 'unique:'.Usuario::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'rol_id' => ['required', 'exists:rols,id']
        ]);

        $usuario = Usuario::create([
            'nombre' => ucwords(strtolower($request->nombre)),
            'apellido_p' => ucwords(strtolower($request->apellido_p)),
            'apellido_m' => ucwords(strtolower($request->apellido_m)),
            'ci' => $request->ci,
            'telefono' => $request->telefono,
            'usuario' => $request->usuario,
            'password' => Hash::make($request->password),
            'rol_id' => $request->rol_id
        ]);
        session()->flash('success', 'Se ha registrado exitosamente a: ' . $usuario->nombre);
        return redirect()->route('usuarios.index');
    }

    public function vistaEditar(string $id)
    {
        $usuario = Usuario::with('rol')->findOrFail($id);
        $roles = Rol::all();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function actualizar(Request $request, string $id)
{
    $request->validate([
        'nombre' => ['required', 'string', 'max:255'],
        'apellido_p' => ['required', 'string', 'max:255'],
        'apellido_m' => ['required', 'string', 'max:255'],
        'ci' => ['required', 'string', 'max:8', 'unique:users,ci,' . $id],
        'telefono' => ['required', 'string', 'max:10', 'unique:users,telefono,' . $id],
        'usuario' => ['required', 'string', 'max:255', 'unique:users,usuario,' . $id],
        'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        'rol_id' => ['required', 'exists:rols,id'],
        'estado' => ['required', 'in:Activo,Inactivo,Bloqueado'],
    ]);

    $usuario = Usuario::findOrFail($id);

    $usuario->update([
        'nombre' => ucwords(strtolower($request->nombre)),
        'apellido_p' => ucwords(strtolower($request->apellido_p)),
        'apellido_m' => ucwords(strtolower($request->apellido_m)),
        'ci' => $request->ci,
        'telefono' => $request->telefono,
        'usuario' => $request->usuario,
        'estado' => $request->estado,
        'rol_id' => $request->rol_id
    ]);

    if ($request->filled('password')) {
        $usuario->update([
            'password' => Hash::make($request->password),
        ]);
    }
    session()->flash('success', 'Se ha modificado exitosamente a: ' . $usuario->nombre);
    return redirect()->route('usuarios.index');
}

    public function eliminar(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        session()->flash('success', 'Se ha elimininado exitosamente a: ' . $usuario->nombre);
        return redirect()->route('usuarios.index');
    }
}
