<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Rol::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:roles,nombre',
            'descripcion' => 'nullable|string',
        ]);

        $rol = Rol::create([
            'nombre' => ucwords(strtolower($request->nombre)),
            'descripcion' => $request->descripcion,
        ]);

        session()->flash('success', 'El rol '.$rol->nombre.' se ha registrado correctamente.');
        return redirect()->route('roles.index');
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
        $roles = Rol::find($id);
        return view('roles.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
        ]);
        $roles = Rol::findOrFail($id);
        $roles->update([
            'nombre' => ucwords(strtolower($request->nombre)),
            'descripcion' => $request->descripcion,
        ]);
        session()->flash('success', 'El rol '.$roles->nombre.' se ha actualizado correctamente.');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roles = Rol::findOrFail($id);
        $roles->delete();
        session()->flash('success', 'El rol '.$roles->nombre.' se ha eliminado correctamente.');
        return redirect()->route('roles.index');
    }
}
