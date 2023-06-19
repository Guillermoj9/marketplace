@extends('web.layout')

@section('main')



<div class="container-fluid">
  <div class="row">
    <div class="text-center">
      <h1 class="mt-5 mb-3">
        <a href="/categoria/{{$categorias->id}}" class="text-warning">{{$categorias->name}}</a>
      </h1>


    </div>

    <!-- BUSCAR Producto  -->
    <div class="container-fluid d-flex justify-content-center align-items-center mb-3">
      <form class="form-inline mt-3" action="/categoria/buscarProductoCategoria/{{$categorias->id}}" method="post">
        @csrf
        <input name="name" class="form-control mr-sm-2" type="text" placeholder="Buscar producto" aria-label="Search">
        <button class="btn btn-primary" type="submit">Buscar</button>
      </form>
    </div>


    @foreach($productos as $producto)
    @if($producto->categoria_id == $categorias->id)
    <div class="col-md-3 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <img class="card-img-top" src="{{ asset($producto->img) }}" alt="Card image cap">
          <h4 class="card-title">{{ $producto->name }}</h4>
          <p>{{ $producto->description }}</p>
          @foreach($tiendas as $tienda)
          @if ($producto->tienda_id == $tienda->id)
          <p><strong>Vendido por: </strong><a href="/tienda/{{$tienda->id}}" class="text-warning">{{ $tienda->name }}</a></p>
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