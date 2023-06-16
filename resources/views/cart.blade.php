@extends('web.layout')
@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mt-4">
            <table id="cart" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                @php
                $total = 0;
                @endphp

                @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                @php
                $subtotal = $details['price']*$details['quantity'];
                $total += $subtotal;
                @endphp
                <tr rowId="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ $details['price'] }}€</td>
                    <td data-th="Price">{{ $details['quantity'] }}</td>

                    <td data-th="Subtotal">{{$subtotal}} €</td>
                    <td class="actions">
                        <a class="btn btn-outline-danger  btn-sm delete-product"><i class="fa-solid fa-trash"></i></a>
                        <a class="btn btn-outline-success  btn-sm update-product"><i class="bi bi-arrow-up"></i></a>
                    </td>
                </tr>
                @endforeach
                @endif

                <tfoot>
                    <tr>
                        <td colspan="5" class="text-right">
                            <span class="total-label">Total:</span>
                            <span class="font-weight-bold total-amount">{{ $total }}€</span>
                        </td>
                    </tr>



                    <tr>
                        <td colspan="5" class="text-right">
                            <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>



                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-md-6 mt-4">
            <div id="paypal-button-container"></div>
        </div>


    </div>
</div>

@endsection
@section('scripts')

<script type="text/javascript">
  $(".update-product").click(function(e) {
    e.preventDefault();

    var ele = $(this);

    if (confirm("¿Agregar producto?")) {
        var productId = ele.parents("tr").attr("rowId");
        var cartUrl = '{{ route("update.cart.product") }}';
        
        $.ajax({
            url: cartUrl,
            method: "PUT",
            data: {
                _token: '{{ csrf_token() }}',
                id: productId
            },
            success: function(response) {
                // Actualiza la cantidad en el carrito en la interfaz
                var quantityElement = ele.parents("tr").find(".quantity");
                var quantity = parseInt(quantityElement.text());
                quantity++;
                quantityElement.text(quantity);
            },
            error: function(response) {
                // Maneja el error de la solicitud AJAX si es necesario
            },
            complete: function(response) {
                window.location.reload();
            }
        });
    }
});

    //FUNCION CARRITO PARA BORRAR PRODUCTO CARRITO

    $(".delete-product").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Do you really want to delete?")) {
            var productId = ele.parents("tr").attr("rowId");
            var cartUrl = '{{ route("delete.cart.product") }}';

            $.ajax({
                url: cartUrl,
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: productId
                },
                success: function(response) {
                    // Actualiza la cantidad en el carrito en la interfaz
                    var quantityElement = ele.parents("tr").find(".quantity");
                    var quantity = parseInt(quantityElement.text());
                    quantity--;
                    quantityElement.text(quantity);

                    // Si la cantidad es 0, elimina la fila de la tabla
                    if (quantity === 0) {
                        ele.parents("tr").remove();
                    }
                },
                success: function(response) {
                    window.location.reload();
                }
            });

        }
    });
    paypal.Buttons({
        style:{
            label: 'pay'
        }, createOrder: function(data, actions){
            return actions.order.create({
                purchase_units: [{
                    amount:{
                        value: <?php echo $total; ?> // Imprime el valor de $total dentro del código JavaScript
                    }
                }]
            })
        },

        onApprove:  function (data, actions){
            actions.order.capture().then(function(detalles){
                console.log(detalles);
            });
        },

        onCancel:function(data){
            alert("pago cancelado");
            console.log(data);
        }
    }).render('#paypal-button-container');
</script>
   

@endsection