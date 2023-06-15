@extends('admin.adminLayout')

@section('main')

<div class="d-flex justify-content-center">
    <div class="w-full max-w-xs mx-auto">
        <h3 class="text-lg text-orange-500 mb-4">Nuevo Producto</h3>

        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="/admin/guardarProducto" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Nombre
                </label>
                <input class="form-control" id="name" name="name" type="text" value="{{ old('nombre') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="img">
                    Imagen
                </label>
                <input class="form-control" id="img" name="img" type="file" value="{{ old('img') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                    Precio
                </label>
                <input class="form-control" id="price" name="price" value="{{ old('price') }}" type="number">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Descripción
                </label>
                <input class="form-control" id="description" name="description" value="{{ old('description') }}" type="text">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria_id">
                    Tienda
                </label>
                <select class="form-select" name="tienda_id">
                    @foreach($tiendas as $tienda)
                    <option value="{{$tienda->id}}">{{$tienda->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria_id">
                    Categoría
                </label>
                <select class="form-select" name="categoria_id">
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit"> <i class="bi bi-cloud-upload"></i>
                </button>
            </div>
        </form>
    </div>
</div>



@endsection