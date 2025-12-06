@php
use App\Models\Client\Product;

@endphp
@extends('layouts.client2')

@section('content')

<div class="bt-breadcrumb">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i></a>
                </li>
                <li><a href="cart.php">Einkaufswagen</a>
                </li>
            </ul>
        </div>
    </div>
</div><!-- /.bt-breadcrumb -->
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12 col-md-12 col-lg-12 min-height-content">
            <h1>Einkaufswagen </h1>
            <form method="post" enctype="multipart/form-data">
                <div class="table-responsive cart-info">
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="image" colspan="2">PRODUKTNAME</td>
                                <td class="product-price">STÜCKPREIS</td>
                                <td class="quantity">MENGE</td>
                                <td class="total">GESAMT</td>
                                <td class="remove"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($cart_product_list) && !empty($cart_product_list))
                            @foreach ($cart_product_list as $item)
                            @php
                            $prod_data=Product::where('id',$item['product_id'])->first();
                            @endphp
                            <tr>
                                <td class="image cart-product-images">
                                    <a href="product-detail.php"><img
                                            src="{{asset('/assets/images/product/').'/'.$prod_data->image}}"
                                            alt="{{$prod_data->name}}" title="{{$prod_data->name}}" />
                                    </a>
                                </td>
                                <td class="name"><a href="product-detail.php">{{$prod_data->name}}</a>
                                    {{-- <br /> <small>Color: Pink</small> --}}
                                </td>
                                <td class="product-price">€{{$item['price']}}</td>
                                <td class="quantity">
                                    <div class="input-group btn-block" style="max-width: 100px;">
                                        <button onclick="changeQty('{{$item['id']}}',0); return false;"
                                            class="decrease"><i class="fa fa-minus"></i>
                                        </button>
                                        <input id="select-number{{$item['id']}}" type="text" name="quantity[]"
                                            data-product="{{$item['id']}}" value="{{$item['quantity']}}" size="1"
                                            class="form-control" />
                                        <button onclick="changeQty('{{$item['id']}}',1); return false;"
                                            class="increase"><i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="total">€{{$item['total_price']}}</td>
                                <td class="remove">
                                    {{-- <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-update"><i
                                                    class="fa fa-refresh"></i>
                                            </button> --}}
                                    <button type="button" data-toggle="tooltip" title="Remove"
                                        data-product="{{$item['id']}}" class="btn btn-remove delete-product"><i
                                            class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            Cart is Empty!
                            @endif

                            {{-- <tr>
                                <td class="image cart-product-images">
                                    <a href="product-detail.php"><img src="images/product/p11-268x268.jpg"
                                            alt="{{$prod_data->name}}"
                            title="Cashmere cuff vintage Levi maxi" />
                            </a>
                            </td>
                            <td class="name"><a href="product-detail.php">Cashmere cuff vintage Levi maxi</a>
                                <br /> <small>Color: Pink</small>
                            </td>
                            <td class="product-price">$158.00</td>
                            <td class="quantity">
                                <div class="input-group btn-block" style="max-width: 100px;">
                                    <button onclick="changeQty('0',0); return false;" class="decrease"><i
                                            class="fa fa-minus"></i>
                                    </button>
                                    <input id="select-number0" type="text" name="quantity[]" value="2" size="1"
                                        class="form-control" />
                                    <button onclick="changeQty('0',1); return false;" class="increase"><i
                                            class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="total">$316.00</td>
                            <td class="remove">
                                <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-update"><i
                                        class="fa fa-refresh"></i>
                                </button>
                                <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-remove"><i
                                        class="fa fa-times"></i>
                                </button>
                            </td>
                            </tr>
                            <tr>
                                <td class="image cart-product-images">
                                    <a href="product-detail.php"><img src="images/product/p11-268x268.jpg"
                                            alt="Cashmere cuff vintage Levi maxi"
                                            title="Cashmere cuff vintage Levi maxi" />
                                    </a>
                                </td>
                                <td class="name"><a href="product-detail.php">Cashmere cuff vintage Levi maxi</a>
                                    <br /> <small>Color: Pink</small>
                                </td>
                                <td class="product-price">$158.00</td>
                                <td class="quantity">
                                    <div class="input-group btn-block" style="max-width: 100px;">
                                        <button onclick="changeQty('0',0); return false;" class="decrease"><i
                                                class="fa fa-minus"></i>
                                        </button>
                                        <input id="select-number0" type="text" name="quantity[]" value="2" size="1"
                                            class="form-control" />
                                        <button onclick="changeQty('0',1); return false;" class="increase"><i
                                                class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="total">$316.00</td>
                                <td class="remove">
                                    <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-update"><i
                                            class="fa fa-refresh"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-remove"><i
                                            class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </form>


        </div><!-- /#content -->
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="cart-total">
                <table>
                    <tr>
                        <td class="left">Zwischensumme:</td>
                        <td class="right">€{{$cart_total_price}}</td>
                    </tr>
                    {{-- <tr>
                        <td class="left">Eco Tax (-2.00):</td>
                        <td class="right">$4.00</td>
                    </tr> --}}
                    {{-- <tr>
                        <td class="left">VAT (20%):</td>
                        <td class="right">$52.00</td>
                    </tr> --}}
                    <tr>
                        <td class="left">Gesamt:</td>
                        <td class="right">€{{$cart_total_price}}</td>
                    </tr>
                </table>
            </div><!-- /.cart-total -->
            <div class="buttons btn-mr0">
                <div class="pull-left"><a href="{{route('home.index')}}" class="btn btn-gray">Mit dem Einkaufen
                        fortfahren</a>
                </div>
                <div class="pull-right"><a href="{{route('home.checkout_form')}}" class="btn btn-blue">Kasse</a>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /.container -->

@endsection

@section('scripts')
<script>
function changeQty(position, increase) {
    var qty = parseInt($('#select-number' + position + '').val());
    if (!isNaN(qty)) {
        qty = increase ? qty + 1 : (qty - 1 > 1 ? qty - 1 : 1);
        $('#select-number' + position + '').val(qty);
        product = $('#select-number' + position + '').data('product');
        // console.log(qty+" "+product);
        $.ajax({
            url: "{{ route('product.update-cart') }}",
            type: "POST",
            data: {
                product: product,
                quantity: qty,
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                window.location.reload();
            },
            error: function(data) {
                window.location.reload();
            }
        });
    } else {
        $('#select-number' + position + '').val(1);
        product = $('#select-number' + position + '').data('product');
        $.ajax({
            url: "{{ route('product.update-cart') }}",
            type: "POST",
            data: {
                product: product,
                quantity: 1,
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                window.location.reload();
            },
            error: function(data) {
                window.location.reload();
            }
        });
    }
    position = '';
}
$(document).on("change", "#input_country", function() {
    var country_id = $(this).val();
    $.ajax({
        url: '{{route("user.getState")}}',
        method: 'post',
        data: {
            "_token": "{{csrf_token()}}",
            country_id: country_id
        },
        success: function(res) {
            $("#input_zone").html(res);
        }
    });
});
</script>
@endsection