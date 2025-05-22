<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Rol;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'alpha', 'max:255'],
            'apellido_p' => ['required', 'string', 'alpha', 'max:255'],
            'apellido_m' => ['required', 'string', 'alpha', 'max:255'],
            'ci' => ['required', 'string','max:8', 'unique:'.User::class],
            'telefono' => ['required', 'string', 'max:10', 'unique:'.User::class],
            'usuario' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'rol_id' => ['required', 'exists:rols,id']
        ]);
        $user = User::create([
            'nombre' => ucwords(strtolower($request->nombre)),
            'apellido_p' => ucwords(strtolower($request->apellido_p)),
            'apellido_m' => ucwords(strtolower($request->apellido_m)),
            'ci' => $request->ci,
            'telefono' => $request->telefono,
            'usuario' => $request->usuario,
            'password' => Hash::make($request->password),
            'rol_id' => $request->rol_id
        ]);
        session()->flash('success', 'Se ha registrado exitosamente a: ' . $user->nombre);
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with('rol')->findOrFail($id);
        $roles = Rol::all();
        return view('usuarios.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

    $user = User::findOrFail($id);

    $user->update([
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
        $user->update([
            'password' => Hash::make($request->password),
        ]);
    }
    session()->flash('success', 'Se ha modificado exitosamente a: ' . $user->nombre);
    return redirect()->route('usuarios.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('success', 'Se ha elimininado exitosamente a: ' . $user->nombre);
        return redirect()->route('usuarios.index');
    }
}
