<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class CompraController extends Controller
{
    public function index(){
        $proveedores = Proveedor::all();
        $compras = Compra::all();
        return view('compras.index', compact('compras', 'proveedores'));
    }

    public function generarPdf(){
        $compras = Compra::all();
        $pdf = Pdf::loadView('pdfCompras', compact('compras'));
        return $pdf->download('ReporteCompras.pdf');
    }

    public function store (Request $request){

        $request->validate([
            'proveedor_id' => 'required|exists:proveedors,id',
            'productos' => 'required|array|min:1',
            'productos.*.producto_id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio_unitario' => 'required|numeric|min:0',
            'productos.*.sub_total' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0'
        ]);

        DB::beginTransaction();
        try {

            $compra = Compra::create([
                'proveedor_id' => $request->proveedor_id,
                'total' => $request->total,
                'fecha_compra' => now(),
            ]);

            foreach ($request->productos as $producto) {
            // Crear detalle de compra
            DetalleCompra::create([
                'compra_id' => $compra->id,
                'producto_id' => $producto['producto_id'],
                'cantidad' => $producto['cantidad'],
                'precio_unitario' => $producto['precio_unitario'],
                'sub_total' => $producto['sub_total'],
            ]);

            $productoActualizar = Producto::find($producto['producto_id']);
            $productoActualizar->stock += $producto['cantidad'];
            
            $productoActualizar->precio_venta = $producto['precio_unitario'] * 1.3; // 1 + 0.3 (30%)

            if ($productoActualizar->stock <= 0) {
                $productoActualizar->stock = 0;
                $productoActualizar->estado = 'descontinuado';
            }

            $productoActualizar->save();
        }
            DB::commit();
            //limpiar el carrito
            session()->forget('carritoCompra');
            return redirect()->route('carrito.compras')->with('success', 'Compra registrada exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('carrito.compras')->with('error', 'No se pudo registrar la compra: ' . $e->getMessage());
        }
    }

    public function edit($id){
        $compras = Compra::find($id);
        return view('compras.edit', compact('compras'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'proveedor_id' => 'required',
            'total' => 'required'|'numeric',
            'fecha_compra' => 'required',
        ]);

        $compra = Compra::findOrFail($id);
        
        $compra->update([
            'proveedor_id'=> $request->proveedor_id,
            'total'=> $request->total,
            'fecha_compra'=> $request->fecha_compra,
        ]);

        session()->flash('success', 'Compra numero:' . $compra->id . ' del proveedor: '. $compra->proveedor->nombre . 'actualizada correctamente.');
        return redirect()->route('compras.index');
    }
    public function destroy($id){
        $compra = Compra::findOrFail($id);
        $compra ->delete();
        session()->flash('success', 'Compra numero:' . $compra->id . ' del proveedor: '. $compra->proveedor->nombre . 'eliminada correctamente.');
        return redirect()->route('compras.index');
    }
}
