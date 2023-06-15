@extends('admin.adminLayout')

@section('main')
<div class="container-fluid">
  <p class="btn-holder"><a href="/admin/crearTienda" class="btn btn-success mt-3">Crear tienda</a></p>
</div>

<!--CATEGORIAS -->
<div class="container-fluid">
  <div class="row">
    <h1>Tiendas</h1>
    @foreach($tiendas as $tienda)
    <div class="col-md-3 col-6 mb-4">
      <div class="card">
        <a > <img class="card-img-top" src="{{ asset($tienda->logo) }}" alt="Card image cap"> </a>
        <div class="card-body">
          <h5 class="card-title">{{$tienda->name}}</h5>
          <h5 class="card-title">{{$tienda->phone}}</h5>
          <h5 class="card-title">{{$tienda->email}}</h5>
          <h5 class="card-title">{{$tienda->address}}</h5>
          <h5 class="card-title">{{$tienda->description}}</h5>
        </div>
      </div>
      <p class="btn-holder"><a href="/admin/{{ $tienda ->id }}/tiendaDestroy"" class=" btn btn-outline-danger"><i class="bi bi-trash"></i></a></p>
    </div>
    @endforeach
  </div>
</div>

@endsection