@extends('web.layout')


@section('main')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset($productos->img) }}" alt="Product Image" class="img-fluid">
        </div>
        <div class="col-md-6">
            <div class="product-details">
                <h2 class="product-title">{{ $productos->name }}</h2>
                <p class="product-description">{{ $productos->description }}</p>
                <div class="product-info">
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">{{ $productos->price }}</span>
                    </div>
                </div>
                <p class="btn-holder"><a href="{{ route('addProduct.to.cart', $productos->id) }}" class="btn btn-outline-warning mr-2 mt-5">Add to cart</a>
            </div>
        </div>
    </div>
    @foreach($tiendas as $tienda)
    @if ($productos->tienda_id == $tienda->id)
    <p><strong>Vendido por:</strong><a href="/tienda/{{$tienda->id}}">{{ $tienda->name }}</a></p>
    @endif
    @endforeach
    @foreach($categorias as $categoria)
    @if ($productos->categoria_id == $categoria->id)
    <p><strong>Categoria:</strong>{{ $categoria->name }}</p>
    @endif
    @endforeach
</div>


@endsection