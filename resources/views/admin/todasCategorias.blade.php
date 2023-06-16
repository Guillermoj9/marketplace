@extends('admin.adminLayout')

@section('main')
<div class="container-fluid">
  <p class="btn-holder"><a href="/admin/crearCategoria" class="btn btn-success mt-3">Crear categoria</a></p>
</div>

<!--CATEGORIAS -->
<div class="container-fluid">
  <div class="row">
    <h1>Categorías</h1>
    @foreach($categorias as $categoria)
    <div class="col-md-3 col-6 mb-4">

      <div class="card">
        <form class="form-inblock mb-3" action="/admin/{{$categoria->id}}/modificarCategoria" method="post">
          @csrf
          <a> <img class="card-img-top" src="{{ asset($categoria->img) }}" alt="Card image cap"> </a>
          <div class="card-body">
            <div class="d-flex align-items-center">
              <strong class="me-2">Nombre:</strong>
              <input class="form-control mt-2" type="text" name="nombre" value="{{ $categoria->name }}">
            </div>
          </div>

          <p class="btn-holder mt-3">
            <button class="btn btn-outline-warning d-inline-block mr-3" type="submit"> <i class="bi bi-arrow-clockwise"></i></button>
          <a href="/admin/{{ $categoria ->id }}/categoriaDestroy"" class=" btn btn-outline-danger"><i class="bi bi-trash"></i></a></p>
      </div>
      </form>

    </div>

 

@endforeach

</div>
</div>

@endsection