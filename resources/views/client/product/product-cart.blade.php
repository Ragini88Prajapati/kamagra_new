@extends('layouts.client')

@section('content')
<div class="categories-tab" style="background: #f8f8f8">
    <div class="container ">
        <div class="row card-cart-row-padding">
            <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-7">
                <div class="medicine-cart-desc">
                    <?php
                    $totalprice  = 0;
                    ?>
                    @if(isset($cart_product_list) && is_array($cart_product_list) && count($cart_product_list) >
                    0)
                    @foreach ($cart_product_list as $key => $value)
                    <?php
                        $price  = $value['total_price'];
                        $totalprice += $price;
                    ?>
                    <div class="cart-medicine-border-bottom">
                        <div class="medicine-cart-padding">
                            <div class="row">
                                <div class="col-8 col-sm-8 col-md-8 col-lg-6 col-xl-6">
                                    <div class="medicine-name-cart float-left">
                                        <p>{{ isset($value['name']) && !empty($value['name']) ? $value['name'] : "" }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <div class="medicine-price-cart float-right">
                                        <p><span> MRP
                                            </span>₹{{ $price }}
                                        </p>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="medicine-bottle-cart">
                                        <p>{{ isset($value['subtitle']) && !empty($value['subtitle']) ? $value['subtitle'] : "" }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-5 col-sm-5 col-md-7 col-lg-8 col-xl-8">
                                    <div class="medicine-select-delete">
                                        <p class=" delete-product"
                                            data-product="{{ isset($value['slug']) && !empty($value['slug']) ?  $value['slug'] : "" }}">
                                            <i class="fa fa-trash" style="font-size: 16px"
                                                aria-hidden="true"></i><span>Remove</span></p>
                                    </div>
                                </div>
                                <div class="col-7 col-sm-7 col-md-5 col-lg-4 col-xl-4">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn  btn-number" data-type="minus"
                                                data-field="quant[1]">
                                                {{-- <img src="images/minus-cart.svg" width="20px"> --}}
                                            </button>
                                        </span>
                                        <input type="text" name="quant[1]"
                                            class="form-control input-number select-quantity"
                                            value="{{ isset($value['quantity']) && !empty($value['quantity']) ? $value['quantity'] : 0 }}"
                                            min="1" max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn  btn-number" data-type="plus"
                                                data-field="quant[1]">
                                                {{-- <img src="images/plus-cart.svg" width="20px"> --}}
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    There is nothing in your cart
                    @endif
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5">
                <div class="row">
                 
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="customer-slip-cart">
                            <div class="customer-slip">
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp">
                                            <p>MRP Total</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp text-right">
                                            <p>₹ {{ $totalprice }}</p>

                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="price-slip-discount-heading">
                                            <p>Price Discount</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="price-slip-discount-price text-right">
                                            <p>- ₹ 0</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp">
                                            <p>Shipping Charges</p>

                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp text-right">
                                            <p>As per delivery address</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp-paid-heading">
                                            <p>To be paid</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp-paid text-right">
                                            <p>₹{{ $totalprice }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="slip-mrp-footer">
                                        <p>Total Savings <span>₹0</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="delivery-card-location">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="cutomer-delivery-location-heading">
                                        <p>
                                            Your delivery location
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="cutomer-delivery-location-location text-right">
                                        {{-- <p>
                                            <i class="fa fa-map-marker"></i><span>New Delhi</span>
                                        </p> --}}
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="cart-addto-btn">
                                        <a style="color:white" href="{{ route('user.select-address') }}" type="button"
                                            class="buy-cart-btn chk-out-btn">CHECKOUT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.btn-number').click(function(e) {
        e.preventDefault();
        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }

    });
    $(".input-number").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>
@endsection

@section('scripts')
<script>
    $('.delete-product').on('click',function(){
        var product = $(this).data('product');
        $.ajax({
            url: "{{ route('product.delete-from-cart') }}",
            type:"POST",
            data:{
                product : product,
                _token: "{{ csrf_token() }}"
            },
            success:function(data){
                window.location.reload();   
            },
            error:function(data){
                window.location.reload();   
            }
        });
    });
</script>

@endsection