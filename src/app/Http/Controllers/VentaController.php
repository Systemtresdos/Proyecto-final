<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    public function index(){
        $user = Auth::user();
        $ventas = Venta::all();
        return view('ventas.index', compact('ventas', 'user'));
    }

    public function create()
    {   
        $ventas = Venta::all();
        $usuarioActual = Auth::user();
        $productos = Producto::all();
        return view('ventas.create', compact('productos', 'usuarioActual','ventas'));
    }

    public function store (Request $request){

        $request->validate([
            'total' => 'required','numeric',
            'fecha_venta' => 'required',
            'user_id' => 'required',
        ]);

        $ventas = Venta::create([
            'total'=> $request->total,
            'fecha_venta'=> $request->fecha_venta,
            'user_id'=> $request->user_id,
        ]);

        session()->flash('success', 'Venta numero:' . $ventas->id . ' registrada correctamente.');
        return redirect()->route('dashboard');
    }

    public function edit($id){
        $ventas = Venta::find($id);
        return view('ventas.edit', compact('ventas'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'total' => 'required','numeric',
            'fecha_venta' => 'required',
            'user_id' => 'required',
        ]);

        $ventas = Venta::findOrFail($id);
        
        $ventas->update([
            'total'=> $request->total,
            'fecha_venta'=> $request->fecha_venta,
            'user_id'=> $request->user_id,
        ]);

        session()->flash('success', 'Venta numero:' . $ventas->id . ' actualizada correctamente.');
        return redirect()->route('dashboard');
    }
    public function destroy($id){
        $ventas = Venta::findOrFail($id);
        $ventas->delete();
        session()->flash('success', 'Venta numero:' . $ventas->id . ' eliminada correctamente.');
        return redirect()->route('dashboard');
    }
}
