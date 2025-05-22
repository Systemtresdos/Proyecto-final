<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }
    public function create(){
        return view('categorias.create');
    }
    public function store(Request $request){
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
        ]);

        $categoria = Categoria::create([
            'nombre' => ucwords(strtolower($request->nombre)),
            'descripcion' => $request->descripcion,
        ]);

        session()->flash('success', 'La categoria '.$categoria->nombre.' se ha registrado correctamente.');
        return redirect()->route('categorias.index');
    }
    public function edit($id){
        $categorias = Categoria::find($id);
        return view('categorias.edit', compact('categorias'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
        ]);

        $categorias = Categoria::findOrFail($id);
        $categorias->update([
            'nombre' => ucwords(strtolower($request->nombre)),
            'descripcion' => $request->descripcion,
        ]);

        session()->flash('success', 'La categoria '.$categorias->nombre.' se ha actualizado correctamente.');
        return redirect()->route('categorias.index');
    }
    public function destroy($id){
        $categorias = Categoria::findOrFail($id);
        $categorias->delete();
        session()->flash('success', 'La categoria '.$categorias->nombre.' se ha eliminado correctamente.');
        return redirect()->route('categorias.index');
    }
}
