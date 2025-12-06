@extends('layouts.client')

@section('content')
<div class="container-flex categories-tab">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2">
            <div class="content-tab" style="background:white">
                <form id="product-filter-form" action="{{ route('product.product-list-filter') }}" method="get">
                    <div id="jquery-accordion-menu" class="jquery-accordion-menu" style="background: white">
                        {{-- <div class="jquery-accordion-menu-header">Gender </div>
                        <ul>
                            @if(isset($gender_list) && is_object($gender_list))
                            @foreach ($gender_list as $value)
                            <?php
                            $gender_name = isset($value['name']) && !empty($value['name']) ? $value['name'] : ""
                            ?>
                            <li>
                                <a href="javascript:void(0);">
                                    <label for="gender-{{ $gender_name }}">
                                        <input type="checkbox" name="gender[]"
                                            class="filter-form-checkbox gender-filter" value="{{ $gender_name }}"
                                            {{ isset($getdata['gender']) && is_array($getdata['gender']) && in_array($gender_name,$getdata['gender']) ? 'checked' :'' }}
                                            id="gender-{{ $gender_name }}">
                                        {{ isset($value['name']) && !empty($value['name']) ? $value['name'] : "" }}
                                    </label>
                                </a>
                            </li>
                            @endforeach
                            @endif
                        </ul>

                        <br>
                        <br> --}}

                        
                        <div class="jquery-accordion-menu-header">Product Type</div>
                        <ul>
                            @if(isset($product_type_list) && is_object($product_type_list))
                            @foreach ($product_type_list as $value)
                            <?php
                            $product_type_name = isset($value['name']) && !empty($value['name']) ? $value['name'] : ""
                            ?>
                            <li>
                                <a href="javascript:void(0);">
                                    <label for="product_type-{{ $product_type_name }}">
                                        <input type="checkbox" name="product_type[]"
                                            class="filter-form-checkbox product_type-filter"
                                            value="{{ $product_type_name }}"
                                            {{ isset($getdata['product_type']) && is_array($getdata['product_type']) && in_array($product_type_name,$getdata['product_type']) ? 'checked' :'' }}
                                            id="product_type-{{ $product_type_name }}">
                                        {{ isset($value['name']) && !empty($value['name']) ? $value['name'] : "" }}
                                    </label>
                                </a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-8 col-lg-10 col-xl-10">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="ayurveda-heading">
                        <h5>Ayurveda</h5>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="ayurveda-top-deals">
                        <h5>All Products
                        </h5>
                    </div>
                </div>
                @if(isset($product_list) && is_object($product_list))
                @foreach ($product_list as $value)
                <?php 
                $image  = isset($value->image) && !empty($value->image) ? $value->image : "";;
                $image_path  = isset($value->image_path) && !empty($value->image_path) ? $value->image_path : "";;
                ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="product-card-hover-inner ">
                        <a href="{{ route('client.product.product-preview', [$value->slug]) }}">
                            <div class="product-img-inner product-card-categories">
                                <img class="img-fluid" src="{{ Storage::url($image_path.$image) }}">
                            </div>
                            <div class="medicine-name-inner">
                                <p>{{ $value->name }}</p>

                            </div>
                            <div class="medicine-description-inner">
                                <p>{{ $value->subtitle }}</p>

                            </div>
                            <div class="cardrating-details">
                                <div class="card-rating-bg"><span
                                        class="CardRatingDetail__weight-700___27w9q">3.6</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 51 48">
                                        <path fill="#ffffff" stroke="none"
                                            d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"></path>
                                    </svg>
                                </div>
                                <span class="number-rating">811 ratings</span>
                            </div>
                        </a>
                        <div class="row">   
                            <div class="col-9 col-sm-9 col-md-8 col-lg-9 col-xl-9">
                                <div class="exact-rate-inner">
                                    <p>Price ₹ {{ $value->price }}</p>
                                </div>
                            </div>
                            <div class="col-3 col-sm-3 col-md-4 col-lg-3 col-xl-3">
                                <div class="add-product-inner">
                                    <a href="javascript:void(0);" class="add-to-product-cart"
                                        data-product="{{ $value->slug }}">ADD</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
            $('.filter-form-checkbox').on('change',function(){
                $("#product-filter-form").submit();
            });

            $('.add-to-product-cart').on('click',function(){
                product = $(this).data('product');
                $.ajax({
                    url:"{{ route('product.add-to-cart') }}",
                    type:"POST",
                    data:{
                        product: product,
                        quantity: 1,
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
    });
</script>
@endsection