<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(){
        $proveedors = Proveedor::all();
        return view('proveedores.index', compact('proveedors'));
    }
    public function create(){
        return view('proveedores.create');
    }
    public function store(Request $request){
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:20', 'unique:'.Proveedor::class],
            'descripcion' => ['required', 'string', 'max:255'],
        ]);

        $proveedors = Proveedor::create([
            'nombre' => ucwords(strtolower($request->nombre)),
            'telefono' => $request->telefono,
            'descripcion' => $request->descripcion,
        ]);

        session()->flash('success', 'El proveedor '.$proveedors->nombre.' se ha registrado correctamente.');
        return redirect()->route('proveedores.index');
    }
    public function edit($id){
        $proveedors = Proveedor::find($id);
        return view('proveedores.edit', compact('proveedors'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:20', 'unique:users,telefono,' . $id],
            'descripcion' => ['required', 'string', 'max:255'],
        ]);

        $proveedors = Proveedor::findOrFail($id);
        $proveedors->update([
            'nombre' => ucwords(strtolower($request->nombre)),
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        session()->flash('success', 'El proveedor '.$proveedors->nombre.' se ha actualizado correctamente.');
        return redirect()->route('proveedores.index');
    }
    public function destroy($id){
        $proveedors = Proveedor::findOrFail($id);
        $proveedors->delete();
        session()->flash('success', 'El proveedor '.$proveedors->nombre.' se ha eliminado correctamente.');
        return redirect()->route('proveedores.index');
    }
}
