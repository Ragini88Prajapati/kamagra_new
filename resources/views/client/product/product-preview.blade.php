@extends('layouts.client')

@section('content')
<div class="container" style="margin-top:60px">
    <div class="row mobile-view-row" style="width: 100%">
        <div class="col-lg-12 col-xl-12">
            <div class="row">
                <div class="preview col-12 col-sm-12 col-md-5 col-xl-4 col-lg-4">
                    <div class="row">
                        <?php 
                            $image  = isset($product_data->image) && !empty($product_data->image) ? $product_data->image : "";;
                            $image_path  = isset($product_data->image_path) && !empty($product_data->image_path) ? $product_data->image_path : "";;
                        ?>
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active">
                                    <a data-target="#pic-1" data-toggle="tab">
                                        <img src="{{ Storage::url($image_path.$image) }}">
                                    </a>
                                </li>
                                <?php
                                    $img_count = 2;
                                    if(isset($product_data->product_image) && is_object($product_data->product_image) && $product_data->product_image->count() > 0){
                                      foreach($product_data->product_image as $value){
                                        $product_image  = isset($value->image) && !empty($value->image) ? $value->image : "";;
                                        $product_image_path  = isset($value->image_path) && !empty($value->image_path) ? $value->image_path : "";;
                                        ?>
                                <li class="">
                                    <a data-target="#pic-{{ $img_count }}" data-toggle="tab">
                                        <img src="{{ Storage::url($product_image_path.$product_image) }}">
                                    </a>
                                </li>
                                <?php
                                        $img_count++;
                                      }
                                    }
                                    ?>
                            </ul>
                        </div>
                        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img
                                        src="{{ Storage::url($image_path.$image) }}">
                                </div>
                                <?php
                                    $img_count = 2;
                                    if(isset($product_data->product_image) && is_object($product_data->product_image) && $product_data->product_image->count() > 0){
                                      foreach($product_data->product_image as $value){
                                        $product_image  = isset($value->image) && !empty($value->image) ? $value->image : "";;
                                        $product_image_path  = isset($value->image_path) && !empty($value->image_path) ? $value->image_path : "";;
                                        ?>
                                <div class="tab-pane " id="pic-{{ $img_count }}"><img
                                        src="{{ Storage::url($image_path.$image) }}">
                                </div>
                                <?php
                                        $img_count++;
                                      }
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="medicine-details">
                        <div class="medicine-heading">
                            <h5>{{ $product_data->name }}</h5>
                        </div>
                        <div class="medicine-bottom-heading">
                            <p>{{ isset($product_data->brand->name) && !empty($product_data->brand->name) ? $product_data->brand->name : "" }}
                            </p>
                        </div>
                        <div class="product-heightlight">
                            <p>Product Highlights</p>
                        </div>
                        <div class="product-underlist">
                            {!! isset($product_data->highlights) && !empty($product_data->highlights) ?
                            $product_data->highlights : "" !!}
                        </div>
                        <div class="product-heightlight">
                            <p>Combo packs for this product</p>
                        </div>

                        <div class="combopack-item">
                            <div class="row pack-row-padding">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left">
                                    <div class="item-heading">Pack of 2</div>
                                    <div class="pack-combo-image">
                                        <img src="{{ Storage::url($image_path.$image) }}">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right">
                                    <div class="mrp-price">
                                        <div class="mrp-exact-price">
                                            <p>MRP
                                                <span class="price-span">
                                                    ₹ {{ $product_data->price * 2 }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ComboPackitem-price">
                                        <div class="combo-mrp">
                                            <div class="buy-pack-btn product-buy-now" data-quantity="2">Buy Pack</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="combopack-item">
                            <div class="row pack-row-padding">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left">
                                    <div class="item-heading">Pack of 4</div>
                                    <div class="pack-combo-image">
                                        <img src="{{ Storage::url($image_path.$image) }}">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right">
                                    <div class="mrp-price">
                                        <div class="mrp-exact-price">
                                            <p>MRP
                                                <span class="price-span">
                                                    ₹ {{ $product_data->price * 4 }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ComboPackitem-price">
                                        <div class="combo-mrp">
                                            <div class="buy-pack-btn product-buy-now" data-quantity="4">Buy Pack</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="cart-buy-main">
                        <div class="people-bought">
                            <p>
                                Call us on
                                <span
                                    style="font-weight: bold;font-size: small;">{{ $product_data->number_text }}</span>
                            </p>
                        </div>
                        <div class="buy-price">
                            <p>MRP <span>₹{{ $product_data->price }}</span></p>
                        </div>
                        <div class="select-size">
                            <div class="row">
                                <div class=" col-6 col-sm-6 col-md-5 col-lg-5 col-xl-5">
                                    <select class="select-option" name="quantity" id="quantity">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>

                                    </select>
                                </div>
                                <div class="col-6 col-sm-6 col-md-7 col-lg-7 col-xl-7">
                                    <div class="class.of-sanitizer">
                                        <p>{{ $product_data->subtitle }}</p>
                                    </div>


                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <a href="javascript:void(0);">
                                        <div class="cart-addto-btn">
                                            <button type="button" class="buy-cart-btn product-add-to-cart">Add To
                                                Cart</button>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="estimated-delivery-main  d-none">
                        <div class="delivery-heading">
                            <p>Estimated delivery between <span>Apr 9 - 11 </span></p>
                        </div>

                        <div class="estimated-delivery-description">
                            <p>1mg is committed to delivering goods on time in your city, despite the current lockdown.
                            </p>

                        </div>
                        <!-- <div class="delivery-location">
                            <div class="row">
                                <div class="col-2 col-sm-2 col-md-2 col-lg-1 col-xl-1">
                                    <p><span><i class="fa fa-map-marker"></i></span></p>


                                </div>
                                <div class="col-7 col-sm-7 col-md-7 col-lg-8 col-xl-8">
                                    <p>Delivering to <span class="location-names">New Delhi</span></p>
                                </div>
                                <div class="col-3 col-sm-3 col-md-2 col-lg-2 col-xl-2s">
                                    <div class="location-changed">
                                        <p>Change</p>

                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

<div class="description-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 description-card">
                <div class="product-information-heading-main">
                    <div class="information-heading">
                        <h2>Information about {{ $product_data->name }}</h2>
                    </div>

                    <div class="information-description">
                        {!! isset($product_data->description) && !empty($product_data->description) ?
                        $product_data->description : "" !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {
            $('.product-add-to-cart').on('click',function(){
                quantity = $("#quantity").val();
                $.ajax({
                    url:"{{ route('product.add-to-cart') }}",
                    type:"POST",
                    data:{
                        product: "{{ $product_data->slug }}",
                        quantity: quantity,
                        _token: "{{ csrf_token() }}"
                    },
                    success:function(data){
                        response_data = JSON.parse(data)
                        $(".cart-total-quantity").html("");
                        $(".cart-total-quantity").html(response_data.cart_total_quantity);
                        alert('Product is added to cart successfully');
                    },
                    error:function(data){
                        alert('Something went wrong please try again');
                    }
                });            
                
            });

            $('.product-buy-now').on('click',function(){
                var quantity = $(this).data('quantity');
                $.ajax({
                    url:"{{ route('product.add-to-cart') }}",
                    type:"POST",
                    data:{
                        product: "{{ $product_data->slug }}",
                        quantity: quantity,
                        _token: "{{ csrf_token() }}"
                    },
                    success:function(data){
                        // response_data = JSON.parse(data)
                        // $(".cart-total-quantity").html("");
                        // $(".cart-total-quantity").html(response_data.cart_total_quantity);
                        // alert('Product is added to cart successfully');
                        window.location.href ="{{ route('product.show-cart') }}";
                    },
                    error:function(data){
                        alert('Something went wrong please try again');
                    }
                });            
                
            });
    });
</script>

@endsection