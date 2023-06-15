@extends('admin.adminLayout')

@section('main')

<div class="d-flex justify-content-center">
    <div class="w-full max-w-xs mx-auto">
        <h3 class="text-lg text-orange-500">Nueva Tienda</h3>
        
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="/admin/guardarTienda" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Nombre
                </label>
                <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                    TLF
                </label>
                <input class="form-control" id="phone" name="phone" type="text" value="{{ old('phone') }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="form-control" id="email" name="email" type="text" value="{{ old('email') }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                    Direccion
                </label>
                <input class="form-control" id="address" name="address" type="text" value="{{ old('address') }}" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Descripción
                </label>
                <input class="form-control" id="description" name="description" value="{{ old('description') }}" type="text">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="logo">
                    Logo
                </label>
                <input class="form-control" id="logo" name="logo" type="file" value="{{ old('logo') }}" required>
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
