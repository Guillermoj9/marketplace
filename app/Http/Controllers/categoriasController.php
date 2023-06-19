<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Tienda;

class categoriasController extends Controller
{

    /**
     * Ver producto por categoria para vista usuario
     */
    public function showProductByCategory(Categoria $categoria)
    {
        return view('web.productosCategoria', ['productos' => Producto::all(), 'categorias' => $categoria, 'tiendas' => Tienda::all()]);
    }
    /**
     * Buscar producto por nombre dentro de categoria
     */
    public function buscarProductoCategoria(Request $request, Categoria $categoria)
    {
        $buscarPro = Producto::where('name', 'like', '%' . $request->input('name') . '%')->get();
        return view('web.productosCategoria', ['productos' => $buscarPro, 'categorias' => $categoria, 'tiendas' => Tienda::all()]);
    }
    /**
     * ADMIN
     */
    /**
     * Vista de todas las categorias para admin
     */
    public function todasCategorias()
    {
        return view('admin.todasCategorias', ['productos' => Producto::all(), 'categorias' => Categoria::all(), 'tiendas' => Tienda::all()]);
    }
    public function index()
    {
        //
    }
    /**
     * Crear categoria
     */
    public function crearCategoria()
    {
        return view('admin.crearCategoria', ['productos' => Producto::all(), 'tiendas' => Tienda::all(), 'categorias' => Categoria::all()]);
    }
    /**
     * Guardar una nueva categoria 
     */
    public function store(Request $request)
    {
        //
        $request->flash();

        //Grabar un objeto evento en BBDD con los datos del $request
        $categoria = new Categoria();

        $categoria->name = $request->input('name');
        $path = $request->file('img')->store('public');
        // /public/nombreimagengenerado.jpg
        //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $categoria->img =  str_replace('public', 'storage', $path);      //file storage documentacion laravel
        $categoria->save();
        return view('admin.todasCategorias', ['productos' => Producto::all(), 'categorias' => Categoria::all(), 'tiendas' => Tienda::all()]);
    }
    /**
     * MODIFICAR CATEGORIA
     */
    public function modificarCategoria(Request $request, Categoria $categoria)
    {
        $Updatecateogria = Categoria::find($categoria->id);
        $Updatecateogria->name = $request->input('nombre');

        $Updatecateogria->save();

        return view('admin.todasCategorias', ['productos' => Producto::all(), 'categorias' => Categoria::all(), 'tiendas' => Tienda::all()]);
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function categoriaDestroy(Categoria $categoria)
    {
        //
        $categoria->delete();
        return view('admin.todasCategorias', ['productos' => Producto::all(), 'categorias' => Categoria::all(), 'tiendas' => Tienda::all()]);
    }
}
