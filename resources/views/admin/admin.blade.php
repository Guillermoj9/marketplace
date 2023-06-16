@extends('admin.adminLayout')

@section('main')
<div class="container-fluid">
  <p class="btn-holder mt-3"><a href="/admin/crearProducto" class="btn btn-success">Crear producto</a></p>

  <!-- BUSCAR Producto  -->
  <form class="form-inline mb-3" action="/admin/buscarProducto" method="post">
    @csrf
    <input name="name" class="form-control mr-sm-2" type="text" placeholder="Buscar producto " aria-label="Search">

    <button class="btn btn-primary" type="submit">Buscar</button>
  </form>
</div>

<div class="container-fluid">
  <div class="row">

    @foreach($productos as $producto)

    <div class="col-md-3 col-6 mb-4">
      <form class="form-inblock mb-3" action="/admin/{{$producto->id}}/modificarProducto" method="post">
        @csrf
        <div class="card">
          <div class="card-body">
            <a><img class="card-img-top" src="{{ asset($producto->img) }}" alt="Card image cap"></a>
            <!-- Nombre  -->
            <div class="d-flex align-items-center">
              <strong class="me-2">Nombre:</strong>
              <input class="form-control mt-2" type="text" name="nombre" value="{{ $producto->name }}">
            </div>
            <!-- Tienda  -->

            <div class="d-flex align-items-center">
              <strong class="me-2">Tienda:</strong>
              <select class="form-control mt-3" name="tienda">
                @foreach($tiendas as $tienda)
                <option value="{{ $tienda->id }}" {{ $producto->tienda_id == $tienda->id ? 'selected' : '' }}>{{ $tienda->name }}</option>
                @endforeach
              </select>
            </div>
            <!-- Categoria  -->
            <div class="d-flex align-items-center">
              <strong class="me-2">Categoría:</strong>
              <select class="form-control mt-3" name="categoria">
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->name }}</option>
                @endforeach
              </select>
            </div>

            <!-- Precio  -->
            <div class="d-flex align-items-center">
              <strong class="me-2">Price:</strong>
              <input class="form-control mt-2" type="text" name="precio" value="{{ $producto->price }}€">
            </div>


            <!-- ACCIONES  -->
            <p class="btn-holder mt-3">
              <button class="btn btn-outline-warning d-inline-block" type="submit"> <i class="bi bi-arrow-clockwise"></i></button>
              <a href="/admin/{{ $producto->id }}/destroy" class="btn btn-outline-danger d-inline-block"><i class="bi bi-trash"></i></a>
            </p>



          </div>
        </div>
        </form>
    </div>
    
    @endforeach
  </div>
</div>


@endsection