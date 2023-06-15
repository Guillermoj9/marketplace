<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Tienda;

class tiendasController extends Controller
{
    /**
     * Vista todas las tiendas
     */
    public function todasTiendas(){
        return view('admin.todasTiendas',['productos'=>Producto::all(), 'categorias'=> Categoria::all(), 'tiendas' => Tienda::all()]);

    }
    /**
     * Vista para crear tienda
     */
    public function crearTienda()
    {
        return view('admin.crearTienda', ['productos' => Producto::all(), 'tiendas' => Tienda::all(), 'categorias' => Categoria::all()]);
    }
   /**
     * Crear una nueva tienda
     */
    public function store(Request $request)
    {
      //
      $request->flash();

      //Grabar un objeto evento en BBDD con los datos del $request
      $tienda = new Tienda();

      $tienda->name = $request->input('name');
      $tienda->phone = $request->input('phone');
      $tienda->email = $request->input('email');
      $tienda->address = $request->input('address');
      $tienda->description = $request->input('description');
      $path = $request->file('logo')->store('public');
      // /public/nombreimagengenerado.jpg
      //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
      $tienda->logo =  str_replace('public', 'storage', $path);
      $tienda->save();
      return view('admin.todasTiendas', ['productos' => Producto::all(), 'tiendas' => Tienda::all(), 'categorias' => Categoria::all()]);
  
    }

    /**
     * Display a listing of the resource.
     */
    public function verTienda(Tienda  $tienda)
    {
        //
        return view('web.tiendas',['productos'=>Producto::all(), 'categorias'=> Categoria::all(), 'tiendas' => $tienda]);

    }
    public function buscarProductoTienda(Request $request, Tienda $tienda)
    {
        $buscarPro = Producto::where('name','like','%'.$request->input('name').'%')->get();
        return view('web.tiendas', ['productos' => $buscarPro, 'tiendas' => $tienda,'categorias'=> Categoria::all() ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function tiendaDestroy(Tienda $tienda)
    {
        //
        $tienda -> delete();
        return view('admin.todasTiendas',['productos'=>Producto::all(), 'categorias'=> Categoria::all(), 'tiendas' => Tienda::all()]);

    }
}
