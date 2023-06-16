<?php

use App\Http\Controllers\categoriasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;
use App\Http\Controllers\tiendasController;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Tienda;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('web.home', ['productos' => Producto::all(), 'categorias' => Categoria::all(), 'tiendas' => Tienda::all()]);
});
/*---------------CATEGORIA PRODUCTO ---------------*/
Route::get('/categoria/{categoria}', [categoriasController::class, 'showProductByCategory'])->name('show.product.by.category');
/*---------------TIENDAS PRODUCTOS ---------------*/
Route::get('/tienda/{tienda}', [tiendasController::class, 'verTienda'])->name('verTienda');
/*--------------- PRODUCTO DETALLE ---------------*/
Route::get('/productoD/{producto}', [productosController::class, 'productoDetalle'])->name('producto.detalle');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//TODAS LAS VISTAS PARA CUANDO ESTAS LOGUEADO 
Route::middleware('auth')->group(function () {
    Route::get('/home', [productosController::class, 'mostrarHome']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /*-----------------Carrito----------------*/
    Route::get('/shopping-cart', [productosController::class, 'productCart'])->name('shopping.cart');
    Route::get('/producto/{id}', [productosController::class, 'addProducttoCart'])->name('addProduct.to.cart');
    Route::patch('/update-shopping-cart', [productosController::class, 'updateCart'])->name('update.shopping.cart');
    Route::delete('/delete-cart-product', [productosController::class, 'deleteProduct'])->name('delete.cart.product');
    Route::put('/update-cart-product', [productosController::class, 'updateProduct'])->name('update.cart.product');
    /*-----------------FIN Carrito----------------*/
    /*-----------------BUSCADORES----------------*/
    Route::post('/categoria/buscarProductoCategoria/{categoria}', [categoriasController::class, 'buscarProductoCategoria']);

    Route::post('/tienda/buscarProductoTienda/{tienda}', [tiendasController::class, 'buscarProductoTienda']);
    /*-----------------FIN BUSCADORES----------------*/

});
/*-----------------ROLE ADMIN----------------*/
Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/admin', [productosController::class, 'mostrarTodos']);
    /*-----------------VISTA CREAR PRODUCTO Y GUARDAR,BORRAR----------------*/
    Route::get('admin/crearProducto/', [productosController::class, 'crearProducto']);
    Route::post('admin/guardarProducto/', [productosController::class, 'store']);
    Route::get('/admin/{producto}/destroy', [productosController::class, 'destroy']);
    Route::post('/admin/buscarProducto', [productosController::class, 'buscarProductoAdmin']);
    Route::post('/admin/{producto}/modificarProducto', [productosController::class, 'modificarProducto']);

    /*-----------------FIN VISTA CREAR PRODUCTO Y GUARDAR----------------*/
    /*-----------------VISTA CREAR CATEGORIAS Y GUARDAR, BORRAR----------------*/
    Route::get('admin/todasCategorias/', [categoriasController::class, 'todasCategorias']);
    Route::get('admin/crearCategoria/', [categoriasController::class, 'crearCategoria']);
    Route::post('admin/guardarCategoria/', [categoriasController::class, 'store']);
    Route::get('/admin/{categoria}/categoriaDestroy', [categoriasController::class, 'categoriaDestroy']);
    Route::post('/admin/{categoria}/modificarCategoria', [categoriasController::class, 'modificarCategoria']);

    /*-----------------FIN CREAR CATEGORIAS Y GUARDAR----------------*/
    /*-----------------VISTA CREAR TIENDAS Y GUARDAR, BORRAR----------------*/
    Route::get('admin/todasTiendas/', [tiendasController::class, 'todasTiendas']);
    Route::get('admin/crearTienda/', [tiendasController::class, 'crearTienda']);
    Route::post('admin/guardarTienda/', [tiendasController::class, 'store']);
    Route::get('/admin/{tienda}/tiendaDestroy', [tiendasController::class, 'tiendaDestroy']);
    Route::post('/admin/{tienda}/modificarTienda', [tiendasController::class, 'modificarTienda']);
    /*-----------------FIN CREAR CATEGORIAS Y GUARDAR----------------*/
});




require __DIR__ . '/auth.php';
