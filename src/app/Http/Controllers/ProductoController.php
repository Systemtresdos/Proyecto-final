<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function buscarProducto(Request $request){
        $productos = Producto::where('nombre', 'like', '%' . $request->nombre . '%')
            ->orWhere('codigo', 'like', '%' . $request->nombre . '%')
            ->get();
        $categorias = Categoria::all();
        $modo = 'individual'; // <== Aquí marcas el modo
        return view('productos.index', compact('productos', 'categorias', 'modo'));
    }
    
    public function buscarPorCategoria(Request $request)
{
    if ($request->has('categoria_id') && $request->categoria_id != '') {
        $productos = Producto::where('categoria_id', $request->categoria_id)->get();
    } else {
        $productos = Producto::all();
    }
    $categorias = Categoria::all();
    $modo = 'lista';
    return view('productos.index', compact('productos', 'categorias', 'modo'));
}

    public function verCarritoCompra() {
        $productos = Producto::all();
        $carritoCompra = session()->get('carritoCompra', []);
        return view('carritoCompra', compact('carritoCompra','proveedores','productos'));
    }
    public function agregarAlCarritoCompra($id) {
        $producto = Producto::find($id);
        $carritoCompra = session()->get('carritoCompra', []);
    
        if (isset($carritoCompra[$id])) {
            $carritoCompra[$id]['cantidad']++;
        } else {
            $carritoCompra[$id] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio_venta,
                'imagen' => $producto->imagen,
                'cantidad' => 1
            ];
        }
    
        session(['carritoCompra' => $carritoCompra]);
        session()->flash('success', 'El producto ' . $producto->nombre . ' se añadio al carrito correctamente.');
        return redirect()->route('productos.index');
    }

    public function quitarDelCarritoCompra($id) {
        $carritoCompra = session()->get('carritoCompra', []);
    
        if (isset($carritoCompra[$id])) {
            unset($carritoCompra[$id]);
        }
    
        // Si el carrito quedó vacío, eliminarlo completamente
        if (empty($carritoCompra)) {
            session()->forget('carritoCompra');
        } else {
            session(['carritoCompra' => $carritoCompra]);
        }
    
        return redirect()->route('carrito.compras')->with('success', 'Producto eliminado del carrito.');
    }
    
/*  metodos para el carrito */
    public function verCarrito() {
        $carrito = session()->get('carrito', []);
        return view('carrito', compact('carrito'));
    }    

    public function agregarAlCarrito($id) {
        $producto = Producto::find($id);
        $carrito = session()->get('carrito', []);
    
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio_venta,
                'imagen' => $producto->imagen,
                'cantidad' => 1
            ];
        }
    
        session(['carrito' => $carrito]);
        session()->flash('success', 'El producto ' . $producto->nombre . ' se añadio al carrito correctamente.');
        return redirect()->route('productos.index');
    }    

    public function quitarDelCarrito($id) {
        $carrito = session()->get('carrito', []);
    
        if (isset($carrito[$id])) {
            unset($carrito[$id]);
        }
    
        // Si el carrito quedó vacío, eliminarlo completamente
        if (empty($carrito)) {
            session()->forget('carrito');
        } else {
            session(['carrito' => $carrito]);
        }
    
        return redirect()->route('carrito')->with('success', 'Producto eliminado del carrito.');
    }
    
    
/*     public function actualizarCarrito(Request $request) {
        $carrito = session()->get('carrito', []);
    
        foreach ($request->cantidades as $id => $cantidad) {
            if (isset($carrito[$id])) {
                $carrito[$id]['cantidad'] = max(1, intval($cantidad));
            }
        }
    
        session(['carrito' => $carrito]);
    
        return redirect()->route('carrito')->with('success', 'Carrito actualizado correctamente.');
    }     */
    


    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        $modo = 'lista';
        return view('productos.index', compact('productos', 'categorias','modo'));
    }
    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['string', 'max:255', 'nullable'],
            'codigo' => ['required', 'string', 'max:255', 'unique:productos'],
            'stock' => ['required', 'numeric'],
            'precio_venta' => ['required', 'numeric'],
            'imagen' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'categoria_id' => ['required', 'exists:categorias,id'],
        ]);

        $imagenUrl = null;

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('imagenes', 'public');
            $imagenUrl = 'storage/' . $imagenPath;
        }


        $producto = Producto::create([
            'nombre' => ucwords(strtolower($request->nombre)),
            'descripcion' => ucwords(strtolower($request->descripcion)),
            'codigo' => $request->codigo,
            'stock' => $request->stock,
            'precio_venta' => $request->precio_venta,
            'imagen' => $imagenUrl,
            'categoria_id' => $request->categoria_id,
        ]);

        session()->flash('success', 'El producto ' . $producto->nombre . ' se ha registrado correctamente.');
        return redirect()->route('productos.index');
    }

        public function actualizar($id) 
    {
        $productos = Producto::find($id);
        $categorias = Categoria::all();
        return view('productos.actualizar', compact('productos','categorias'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['string', 'max:255','nullable'],
            'codigo' => ['required', 'string', 'max:255', 'unique:productos,codigo,' . $id],
            'stock' => ['required', 'numeric'],
            'precio_venta' => ['required', 'numeric'],
            'imagen' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'categoria_id' => ['required', 'exists:categorias,id'],
        ]);

        // Buscar el producto a actualizar
        $productos = Producto::findOrFail($id);

        $imagenUrl = $productos->imagen;

        if ($request->hasFile('imagen')) {
            if ($productos->imagen && file_exists(public_path($productos->imagen))) {
                unlink(public_path($productos->imagen));
            }

            $imagenPath = $request->file('imagen')->store('imagenes', 'public');
            $imagenUrl = 'storage/' . $imagenPath;
        }

        $productos->update([
            'nombre' => ucwords(strtolower($request->nombre)),
            'descripcion' => ucwords(strtolower($request->descripcion)),
            'codigo' => $request->codigo,
            'stock' => $request->stock,
            'precio_venta' => $request->precio_venta,
            'imagen' => $imagenUrl, // Actualizar la URL de la imagen
            'categoria_id' => $request->categoria_id,
        ]);

        session()->flash('success', 'El producto ' . $productos->nombre . ' se ha actualizado correctamente.');
        return redirect()->route('productos.index');
    }

    public function reabastecer(Request $request, $id) {
        $request->validate([
            'cantidad' => ['required','numeric']
        ]);

        $productos = Producto::findOrFail($id);
        $productos->stock += $request->cantidad;

        $productos->save();

        session()->flash('success', 'Ahora el stock es de: ' . $productos->stock . ' del producto: ' . $productos->nombre . '!!!');
        return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        $productos = Producto::findOrFail($id);
        $productos->delete();
        session()->flash('success', 'El producto ' . $productos->nombre . ' se ha eliminado correctamente.');
        return redirect()->route('productos.index');
    }
}
