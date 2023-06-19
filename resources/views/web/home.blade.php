@extends('web.layout')

@section('main')
<div class="container-fluid">
  <!--SLIDER DE 3 IMAGENES -->
  <div class="d-none d-md-block">
  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('img/slider-1.jpg')}}" class="d-block w-100" alt="" width="550px" height="500px">
        Image by <a href="https://pixabay.com/users/tumisu-148124/?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=4275963">Tumisu</a> from <a href="https://pixabay.com//?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=4275963">Pixabay</a>
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/slider-2.jpg')}}" class="d-block w-100" alt="250px" width="550px" height="500px">
        <a href="https://www.freepik.com/free-photo/purchasing-shop-buying-selling-teade_18138201.htm#query=slider%20market&position=6&from_view=search&track=ais">Image by rawpixel.com</a> on Freepik      </div>
      <div class="carousel-item">
        <img src="{{asset('img/slider-3.jpg')}}" class="d-block w-100" alt="250px" width="550px" height="500px">
        Image by <a href="https://pixabay.com/users/anncapictures-1564471/?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=1426008">annca</a> from <a href="https://pixabay.com//?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=1426008">Pixabay</a>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
</div>
</div>
<!--CATEGORIAS -->
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="text-center mt-4 mb-4">
        <h1>Categorías</h1>
      </div>
    </div>
    <!-- USA LAS 8 PRIMERAS CATEGORIAS NADA MAS -->
    @foreach($categorias->take(8) as $categoria)
    <div class="col-md-3 col-6 mb-4">
      <div class="card">
        <a href="/categoria/{{$categoria->id}}">
          <img class="card-img-top img-fluid" src="{{ asset($categoria->img) }}" alt="Card image cap" style="height: 200px; object-fit: cover;">
        </a>
        <div class="card-body">
          <h5 class="card-title">{{$categoria->name}}</h5>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<!--seccion -->
<div class="text-center mt-4 mb-4">
      <h1>Apostamos por ti</h1>
    </div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="text-center">
        <img src="{{ asset('img/imagen1seccion.jpg') }}" alt="" class="rounded-circle img-fluid">
        <h4>Envío gratuito</h4>
        <p>Envíos gratuitos en pedidos superiores a 50€.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="text-center">
        <img src="{{ asset('img/imagen2seccion.jpg') }}" alt="Imagen 2" class="rounded-circle img-fluid">
        <h4>Comercio seguro</h4>
        <p>Haz tus compras sin miedos.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="text-center">
        <img src="{{ asset('img/imagen3seccion.jpg') }}" alt="Imagen 3" class="rounded-circle img-fluid">
        <h4>Compra en casa</h4>
        <p>Todos los productos son de comercios locales.</p>
      </div>
    </div>
  </div>
</div>

<!--PRODUCTOS recoge 4 y cada vez que recargas salen 4 diferentes -->
<div class="container-fluid">
  <div class="row">
    <div class="text-center mt-4 mb-4">
      <h1>Destacados</h1>
    </div>
    @php
    $randomProductos = $productos->shuffle()->take(4);
    @endphp

    @foreach($randomProductos as $producto)
    <div class="col-md-3 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <a href="/productoD/{{$producto->id}}">
            <img class="card-img-top imag-fluid" src="{{ asset($producto->img) }}" alt="Card image cap"></a>
          <h4 class="card-title">{{ $producto->name }}</h4>
          <p>{{ $producto->description }}</p>
          <p class="card-text"><strong>Price: </strong> {{ $producto->price }}€</p>
          <p class="btn-holder"><a href="{{ route('addProduct.to.cart', $producto->id) }}" class="btn btn-outline-warning mr-2">Add to cart</a>
            <a href="/productoD/{{$producto->id}}" class="btn btn-outline-success">Ver</a>
          </p>
        </div>
      </div>
    </div>
    @endforeach

    <!--Recoge 1 producto aleatorio y lo pinta-->
    @php
    $randomProductos = $productos->shuffle()->take(1);
    @endphp

    @foreach($randomProductos as $producto)
    <section class="py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h2 class="display-4 mb-4">Oferta Especial</h2>
            <p class="lead mb-4">Aprovecha nuestra oferta especial en productos seleccionados. ¡No te lo pierdas!</p>
            <a href="/productoD/{{$producto->id}}" class="btn btn-outline-dark">
              <span class="badge text-warning fw-bold fs-5">Ver oferta</span>
              <i class="bi bi-arrow-through-heart mr-1"></i>
            </a>
          </div>
          <div class="col-lg-6">
            <img src="{{ asset($producto->img) }}" class="img-fluid" alt="Oferta Especial">
          </div>
        </div>
      </div>
    </section>
    @endforeach


    <!--Tiendas -->
    <div class="container-fluid">
  <div class="row">
    <div class="text-center mt-4 mb-4">
      <h1>Tiendas</h1>
    </div>
    @foreach($tiendas->take(4) as $tienda)
    <div class="col-md-3 col-6 mb-4">
      <div class="card">
        <a href="/tienda/{{$tienda->id}}">
          <img class="card-img-top img-fluid" src="{{ asset($tienda->logo) }}" alt="Card image cap" style="height: 200px; object-fit: cover;">
        </a>
        <div class="card-body">
          <h5 class="card-title">{{$tienda->name}}</h5>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

    <style>
      .company-slide {
        text-align: center;
        padding: 20px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
      }
    </style>
    </head>

    <body>

      <!-- Resto del contenido de la página -->

      <section class="py-5">
        <div class="container-fluid">
          <h2 class="mb-4">Empresas asociadas</h2>
          <div id="companySlider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="company-slide">
                      <img src="{{asset('img/ayuntamiento.png')}}" class="img-fluid" alt="Empresa 1" width="200px" height="200px">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="company-slide">
                      <img src="{{asset('img/ayuntamiento.png')}}" class="img-fluid" alt="Empresa 2"  width="200px" height="200px">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="company-slide">
                      <img src="{{asset('img/ayuntamiento.png')}}" class="img-fluid" alt="Empresa 3" width="200px" height="200px">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="company-slide">
                      <img src="{{asset('img/ayuntamiento.png')}}" class="img-fluid" alt="Empresa 4" width="200px" height="200px">
                    </div>
                  </div>
                </div>
              </div>
              <!-- Agrega más elementos de carousel-item aquí -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#companySlider" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#companySlider" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Siguiente</span>
            </button>
          </div>
        </div>
      </section>
      @endsection