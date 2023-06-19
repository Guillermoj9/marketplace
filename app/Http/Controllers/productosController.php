<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Tienda;
use Illuminate\Support\Facades\DB;

class productosController extends Controller
{
    /**
     * Sacar todos los productos
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos', compact('productos'));
    }

    /**
     * Ver la vista carrito
     */
    public function productCart()
    {
        return view('cart');
    }
    /**
     * Añadir producto al carrito almacenando el producto en la sesion 
     */
    public function addProducttoCart($id)
    {
        $producto = Producto::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $producto->name,
                "quantity" => 1,
                "price" => $producto->price,
                "description" => $producto->description
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product has been added to cart!');
    }
    /*
    public function updateCart(Request $request)
{
    if ($request->id) {
        $cart = session()->get('cart');
        
        if (isset($cart[$request->id])) {
            // Incrementa la cantidad del producto en 1
            $cart[$request->id]['quantity']++;

            session()->put('cart', $cart);
        }
        
        session()->flash('success', 'Producto añadido');
    }
}
*/
    /**
     * Añadir un producto mas del que ya tenemos en el carrito
     */
    public function updateProduct(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {
                // Incrementa la cantidad del producto en 1
                $cart[$request->id]['quantity']++;

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Producto agregado.');
        }
    }
    /**
     * Borra productos que ya tengamos en el carrito de 1 en 1 y si solo tenemos 1 lo elimina del carrito
     */
    public function deleteProduct(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {
                // Disminuye la cantidad del producto en 1
                $cart[$request->id]['quantity']--;

                // Si la cantidad llega a 0, elimina el producto del carrito
                if ($cart[$request->id]['quantity'] <= 0) {
                    unset($cart[$request->id]);
                }

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product quantity updated.');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index1()
    {
        //
        //return view('web.producto');
    }
    /**
     * Ver producto en detalle
     */
    public function productoDetalle(Producto $producto)
    {
        return view('web.productoDetalle', ['productos' => $producto, 'categorias' => Categoria::all(), 'tiendas' => Tienda::all()]);
    }

    //VISTA PRINCIPAL DEL ADMIN
    /**
     * Ver tods los productos en admin
     */
    public function mostrarTodos()
    {
        return view('admin.admin', ['productos' => Producto::all(), 'tiendas' => Tienda::all(), 'categorias' => Categoria::all()]);
    }
    /**
     * Crear producto nuevo 
     */
    public function crearProducto()
    {
        return view('admin.crearProducto', ['productos' => Producto::all(), 'tiendas' => Tienda::all(), 'categorias' => Categoria::all()]);
    }
    /**
     * Buscar producto por nombre en admin
     */
    public function buscarProductoAdmin(Request $request)
    {
        $buscarPro = Producto::where('name', 'like', '%' . $request->input('name') . '%')->get();
        return view('admin.admin', ['productos' => $buscarPro, 'categorias' => categoria::all(), 'tiendas' => Tienda::all()]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->flash();

        //Grabar un objeto evento en BBDD con los datos del $request
        $producto = new Producto();

        $producto->name = $request->input('name');

        $path = $request->file('img')->store('public');
        // /public/nombreimagengenerado.jpg
        //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $producto->img =  str_replace('public', 'storage', $path);

        $producto->description = $request->input('description');
        $producto->price = $request->input('price');
        $producto->tienda_id = $request->input('tienda_id');
        $producto->categoria_id = $request->input('categoria_id');
        $producto->save();
        return view('admin.admin', ['productos' => Producto::all(), 'tiendas' => Tienda::all(), 'categorias' => Categoria::all()]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    //VISTA SI HACES LOGIN COMO USUARIO
    public function mostrarHome()
    {
        return view('web.home', ['productos' => Producto::all(), 'categorias' => Categoria::all(), 'tiendas' => Tienda::all()]);
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
        //
    }
    /**
     * Modificar producto en la vista de admin
     */
    public function modificarProducto(Request $request, Producto $producto)
    {
        $Updateproducto = Producto::find($producto->id);
        $Updateproducto->name = $request->input('nombre');
        $Updateproducto->tienda_id = $request->input('tienda');
        $Updateproducto->categoria_id = $request->input('categoria');
        $Updateproducto->price = $request->input('precio');


        $Updateproducto->save();

        return view('admin.admin', ['productos' => Producto::all(), 'tiendas' => Tienda::all(), 'categorias' => Categoria::all()]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
        $producto->delete();
        return view('admin.admin', ['productos' => Producto::all(), 'tiendas' => Tienda::all(), 'categorias' => Categoria::all()]);
    }
}
