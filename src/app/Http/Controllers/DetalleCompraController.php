<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleCompraController extends Controller
{
    public function index()
    {
        $compras = Compra::all();
        $productos = Producto::all();
        return view('compras.index', compact('compras', 'productos'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        return view('compras.create', compact('proveedores', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proveedor_id' => 'required|exists:proveedors,id',
            'total' => 'required|numeric',
            'compra_id' => 'required|exists:compras,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric',
            'sub_total' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {

            $compra = Compra::create([
                'proveedor_id' => $request->proveedor_id,
                'total' => $request->total,
                'fecha_compra' => now(),
            ]);

            $detalleCompra = DetalleCompra::create([
                'compra_id' => $request->compra_id,
                'producto_id' => $request->producto_id,
                'cantidad' => $request->cantidad,
                'precio_unitario' => $request->precio_unitario,
                'sub_total' => $request->sub_total,
            ]);

            $actualizarProducto = Producto::find($request->producto_id);
            $actualizarProducto->stock -= $request->cantidad;

            if ($actualizarProducto->stock <= 0) {
                $actualizarProducto->stock = 0;
                $actualizarProducto->estado = 'descontinuado';
            }

            $actualizarProducto->save();
            DB::commit();
            return redirect()->route('compras.index')->with('success', 'Compra registrada exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('carrito')->with('error', 'No se pudo registrar la compra: ' . $e->getMessage());
        }
    }

    public function edit()
    {
        $compras = Compra::all();
        $productos = Producto::all();
        $detalleCompra = DetalleCompra::all();
        return view('detalleCompra.edit', compact('ventas', 'productos', 'detalleCompra'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'venta_id' => 'require',
            'producto_id' => 'require',
            'cantidad' => 'require',
            'precio_unitario' => 'require',
            'sub_total' => 'requiere'
        ]);

        $detalleCompra = DetalleCompra::findOrFail($id);

        $detalleCompra->update([
            'venta_id' => $request->venta_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'sub_total' => $request->sub_total
        ]);
        session()->flash('Se modifico el detalle de la venta numero: ' . $detalleCompra->id);
        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        $detalleCompra = DetalleCompra::findOrFail($id);
        $detalleCompra->delete();
        session()->flash('Se elimino el detalle de la venta numero: ' . $detalleCompra->id);
        return redirect()->route('dashboard');
    }
}
