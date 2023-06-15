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
        <a> <img class="card-img-top" src="{{ asset($categoria->img) }}" alt="Card image cap"> </a>
        <div class="card-body">
          <h5 class="card-title">{{$categoria->name}}</h5>
         
        </div>
        <p class="btn-holder"><a href="/admin/{{ $categoria ->id }}/categoriaDestroy"" class=" btn btn-outline-danger"><i class="bi bi-trash"></i></a></p>
      </div>
    </div>
    @endforeach

  </div>
</div>

@endsection