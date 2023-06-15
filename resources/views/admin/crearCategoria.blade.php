@extends('admin.adminLayout')

@section('main')

<div class="d-flex justify-content-center">
    <div class="w-full max-w-xs mx-auto">
        <h3 class="text-lg text-orange-500">Nueva Categoria</h3>

        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="/admin/guardarCategoria" enctype="multipart/form-data">
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

            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-cloud-upload"></i>

                </button>
            </div>
        </form>
    </div>
</div>



@endsection