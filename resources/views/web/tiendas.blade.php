@extends('web.layout')

@section('main')

<div class="container-fluid">
  <div class="row">
    <h1 class="mt-5 mb-3 text-center">
      <a href="/categoria/{{$tiendas->id}}" class="text-warning ">{{$tiendas->name}}</a>
    </h1>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <img src="{{ asset($tiendas->logo) }}" class="img-fluid" alt="Logo de la tienda">
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 offset-md-2 mt-3">
        <p>{{$tiendas->description}}</p>
      </div>
    </div>
    <!-- BUSCAR Producto  -->
    <div class="container-fluid d-flex justify-content-center align-items-center mb-3">
      <form class="form-inline mt-3" action="/tienda/buscarProductoTienda/{{$tiendas->id}}" method="post">
        @csrf
        <input name="name" class="form-control mr-sm-2" type="text" placeholder="Buscar producto" aria-label="Search">
        <button class="btn btn-primary" type="submit">Buscar</button>
      </form>
    </div>
    @foreach($productos as $producto)
    @if($producto->tienda_id == $tiendas->id)
    <div class="col-md-3 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <img class="card-img-top" src="{{ asset($producto->img) }}" alt="Card image cap">
          <h4 class="card-title">{{ $producto->name }}</h4>
          <p>{{ $producto->description }}</p>
          @foreach($categorias as $categoria)
          @if ($producto->categoria_id == $categoria->id)
          <p class="cart-text"><strong>Categoria: </strong><a href="/categoria/{{$categoria->id}}" class="text-warning">{{ $categoria->name }}</a></p>
          @endif
          @endforeach
          <p class="card-text"><strong>Price: </strong> {{ $producto->price }}€</p>
          <p class="btn-holder"><a href="{{ route('addProduct.to.cart', $producto->id) }}" class="btn btn-outline-warning mr-2">Add to cart</a>
            <a href="/productoD/{{$producto->id}}" class="btn btn-outline-success">Ver</a>
          </p>
        </div>
      </div>
    </div>
    @endif

    @endforeach
  </div>
</div>

@endsection