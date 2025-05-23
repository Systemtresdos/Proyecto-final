<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        $productos = Producto::all();
        return view('detalleventa.index', compact('pedidos', 'productos'));
    }

    public function create()
    {
        $pedidos = Pedido::all();
        $productos = Producto::all();
        return view('detalleventa.create', compact('pedidos', 'productos'));
    }
    
    public function registrarVenta(Request $request)
{
    // Verificar que se están enviando productos
    if (!$request->has('productos') || count($request->productos) === 0) {
        return redirect()->route('carrito')->with('error', 'No hay productos en el carrito.');
    }

    // Validaciones
    $request->validate([
        'total' => 'required|numeric',
        'tipo_pago' => 'required|string',
        'productos' => 'required|array',
        'productos.*.producto_id' => 'required|exists:productos,id',
        'productos.*.cantidad' => 'required|integer|min:1',
        'productos.*.precio_unitario' => 'required|numeric',
        'productos.*.sub_total' => 'required|numeric',
    ]);

    DB::beginTransaction();
    try {
        $usuario = Auth::user();

        $pedido = Pedido::create([
            'total' => $request->total,
            'tipo_pago' => $request->tipo_pago,
            'fecha_venta' => now(),
            'user_id' => $usuario->id,
        ]);

        foreach ($request->productos as $producto) {
            DetallePedido::create([
                'venta_id' => $pedido->id,
                'producto_id' => $producto['producto_id'],
                'cantidad' => $producto['cantidad'],
                'precio_unitario' => $producto['precio_unitario'],
                'sub_total' => $producto['sub_total'],
            ]);

            $actualizarProducto = Producto::find($producto['producto_id']);
            $actualizarProducto->stock -= $producto['cantidad'];

            if ($actualizarProducto->stock <= 0) {
                $actualizarProducto->stock = 0;
                $actualizarProducto->estado = 'No_disponible';
            }
            if ($actualizarProducto->stock < 5 && $actualizarProducto->stock > 0) {
                $actualizarProducto->estado = 'Stock_bajo';
            }

            $actualizarProducto->save();
        }

        DB::commit();
        session()->forget('carrito');

        return redirect()->route('carrito')->with('success', 'Venta registrada exitosamente.');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('carrito')->with('error', 'No se pudo registrar la venta: ' . $e->getMessage());
    }
}
    

    public function store(Request $request)
    {
        $request->validate([
            'venta_id' => 'required',
            'producto_id' => 'required',
            'cantidad' => 'required',
            'precio_unitario' => 'required',
            'sub_total' => 'required',
        ]);

        $detallePedido = DetallePedido::create([
            'venta_id'=> $request->venta_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'sub_total' => $request->sub_total
        ]);
        
        session()->flash('Se registro el detalle de la venta numero: '. $detallePedido->id);
        return redirect()->route('dashboard');
    }
    
    public function edit(){
        $pedidos = Pedido::all();
        $productos = Producto::all();
        $detalleVenta = DetallePedido::all();
        return view('detalleventa.edit',compact('ventas','productos','detalleventa'));
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'venta_id' => 'require',
            'producto_id' => 'require',
            'cantidad' => 'require',
            'precio_unitario' => 'require',
            'sub_total' => 'requiere'
        ]);

        $detallePedido = DetallePedido::findOrFail($id);

        $detallePedido -> update([
            'venta_id' => $request->venta_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'sub_total' => $request->sub_total
        ]);
        session()->flash('Se modifico el detalle de la venta numero: '. $detallePedido->id);
        return redirect()->route('dashboard');
    }

    public function destroy($id){
        $detallePedido = DetallePedido::findOrFail($id);
        $detallePedido->delete();
        session()->flash('Se elimino el detalle de la venta numero: '.$detallePedido->id);
        return redirect()->route('dashboard');
    }
}
