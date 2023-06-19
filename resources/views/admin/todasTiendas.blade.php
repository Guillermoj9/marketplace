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
    <form class="form-inblock mb-3" action="/admin/{{$tienda->id}}/modificarTienda" method="post">
        @csrf
        <div class="card">
          <div class="card-body">
            <a><img class="card-img-top" src="{{ asset($tienda->logo) }}" alt="Card image cap"></a>
            <!-- Nombre  -->
            <div class="d-flex align-items-center">
              <strong class="me-2">Nombre:</strong>
              <input class="form-control mt-2" type="text" name="nombre" value="{{ $tienda->name }}">
            </div>
            <!-- Tienda  -->
            <div class="d-flex align-items-center">
              <strong class="me-2">TLF:</strong>
              <input class="form-control mt-2" type="text" name="tlf" value="{{ $tienda->phone }}">
            </div>
            <div class="d-flex align-items-center">
              <strong class="me-2">EMAIL:</strong>
              <input class="form-control mt-2" type="text" name="email" value="{{ $tienda->email }}">
            </div>
            <div class="d-flex align-items-center">
              <strong class="me-2">Direccion:</strong>
              <input class="form-control mt-2" type="text" name="address" value="{{ $tienda->address }}">
            </div>
            <div class="d-flex align-items-center">
              <strong class="me-2">Descripcion:</strong>
              <input class="form-control mt-2" type="text" name="description" value="{{ $tienda->description }}">
            </div>
            <p class="btn-holder mt-3">
      <button class="btn btn-outline-warning d-inline-block mr-3" type="submit"> <i class="bi bi-arrow-clockwise"></i></button>
      <a href="/admin/{{ $tienda ->id }}/tiendaDestroy"" class=" btn btn-outline-danger"><i class="bi bi-trash"></i></a>
    </p>
          </div>
      </div>
      
    </form>
    </div>
    @endforeach
  </div>
</div>

@endsection