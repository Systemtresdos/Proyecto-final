<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\RolController;
use App\Models\Categoria;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Rol;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
Route::resource('usuarios', UsuarioController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $productos = Producto::all();
    $categorias = Categoria::all();
    $ventas = Venta::all();
    $detalleVentas = DetalleVenta::all();
    $proveedores = Proveedor::all();
    $categorias = Categoria::all();
    $user = User::all();
    $compras = Compra::all();
    $detalleCompras = DetalleCompra::all();
    return view('dashboard', compact('productos', 'categorias', 'ventas', 'detalleVentas', 'proveedores', 'categorias', 'user', 'compras', 'detalleCompras'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//roles
Route::get('/roles', [RolController::class, 'index'])->name('roles.index');
Route::get('/roles/registro', [RolController::class, 'create'])->name('roles.create');
Route::post('/roles/guardar', [RolController::class, 'store'])->name('roles.store');
Route::get('/roles/{id}/modificar', [RolController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{id}', [RolController::class, 'update'])->name('roles.update');
Route::delete('/roles/eliminar/{id}', [RolController::class, 'destroy'])->name('roles.destroy');

/* rutas de usuarios */
Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/registro', [UserController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios/guardar', [UserController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{id}/modificar', [UserController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/eliminar/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');

//ruta de categorias
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/registro', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias/guardar', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{id}/modificar', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/eliminar/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
require __DIR__.'/auth.php';

//ruta de proveedores
Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
Route::get('/proveedores/registro', [ProveedorController::class, 'create'])->name('proveedores.create');
Route::post('/proveedores/guardar', [ProveedorController::class, 'store'])->name('proveedores.store');
Route::get('/proveedores/{id}/modificar', [ProveedorController::class, 'edit'])->name('proveedores.edit');
Route::put('/proveedores/{id}', [ProveedorController::class, 'update'])->name('proveedores.update');
Route::delete('/proveedores/eliminar/{id}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');

//ruta de productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/registro', [ProductoController::class, 'create'])->name('productos.create');
Route::get('/actualizar/producto/{id}', [ProductoController::class, 'actualizar'])->name('actualizar.producto');
Route::post('/productos/guardar', [ProductoController::class, 'store'])->name('productos.store');
Route::put('/producto/actualizado/{id}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/producto/eliminar/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::post('/productos/buscar', [ProductoController::class, 'buscarProducto'])->name('productos_buscar');
Route::post('/categoria/productos/buscar', [ProductoController::class, 'buscarPorCategoria'])->name('buscar_por_categoria');

// Carrito venta
Route::get('/carrito', [ProductoController::class, 'verCarrito'])->name('carrito');
Route::post('/carrito/agregar/{id}', [ProductoController::class, 'agregarAlCarrito'])->name('carrito.agregar');
Route::post('/carrito/quitar/{id}', [ProductoController::class, 'quitarDelCarrito'])->name('carrito.quitar');
Route::post('/Registrar/venta', [DetalleVentaController::class, 'registrarVenta'])->name('registrar.venta');

// Carrito compra
Route::get('/carrito/compra', [ProductoController::class, 'verCarritoCompra'])->name('carrito.compras');
Route::post('/carritoCompra/agregar/{id}', [ProductoController::class, 'agregarAlCarritoCompra'])->name('carritoCompra.agregar');
Route::post('/carritoCompra/quitar/{id}', [ProductoController::class, 'quitarDelCarritoCompra'])->name('carritoCompra.quitar');
Route::post('/Registrar/compra', [CompraController::class, 'store'])->name('registrar.compra');

