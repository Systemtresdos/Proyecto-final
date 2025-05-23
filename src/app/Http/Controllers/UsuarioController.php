<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Mostrar lista de usuarios.
     */
    public function index()
    {
        $usuarios = Usuario::with('rol')->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Mostrar formulario para crear un nuevo usuario.
     */
    public function create()
    {
        $roles = Rol::pluck('nombre', 'id');
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Guardar un nuevo usuario en la base de datos.
     */
    public function store(UsuarioRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        Usuario::create($data);
        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Mostrar detalles de un usuario específico.
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Mostrar formulario para editar un usuario.
     */
    public function edit(Usuario $usuario)
    {
        $roles = Rol::pluck('nombre', 'id');
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Actualizar un usuario en la base de datos.
     */
    public function update(UsuarioRequest $request, Usuario $usuario)
    {
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $usuario->update($data);
        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Eliminar un usuario de la base de datos.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return back()->with('success', 'Usuario eliminado correctamente.');
    }
}
