@extends('layouts.client')

@section('content')
<div class="container-flex banner-slider">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 banner-slider remove-banner-padding">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 banner-slider remove-banner-padding">


                    <div id="demo" class="carousel slide banner-slider" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner banner-slider">
                            <div class="carousel-item banner-slider active">
                                <img src="{{ asset('assets/client/images/banner/04.jpg') }}"
                                    alt="Always Healthy Pharma">
                            </div>
                            <div class="carousel-item banner-slider">
                                <img src="{{ asset('assets/client/images/banner/05.jpg') }}" alt="Chicago">
                            </div>
                            <div class="carousel-item banner-slider">
                                <img src="{{ asset('assets/client/images/me6.jpg') }}" alt="New York">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
                <div class=" col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 banner-slider remove-banner-padding">
                    <a
                        href="{{ isset($banner_img_product->slug)  ? route('client.product.product-preview',[$banner_img_product->slug]) : 'javascript:void(0);' }}"><img
                            class="banner-slider"
                            src="{{ asset('assets/client/images/banner/right-banner-02.jpg') }}"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-flex section-main-heading">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="header-section">
                <h4 class="text-center">Always healty pharma: India’s Leading Online Pharmacy & Healthcare Platform</h4>
            </div>
        </div>
    </div>
    <div class="row health-product-row">
        <div class="col-8 col-sm-8 col-md-9 col-lg-10 col-xl-10">
            <div class="Health-product">
                <h4>For Men | Always healty pharma Health Products

                </h4>
            </div>
        </div>
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2">
            <div class="sell-all-btn">
                <?php
                    $product_first = $product_list->first();
                    $gender_name = isset($product_first->gender->name) && !empty($product_first->gender->name) ? $product_first->gender->name : "";
                    ?>
                <a href="{{ route('product.product-list', ['gender' => $gender_name ]) }}">SEE ALL</a>

            </div>
        </div>
    </div>
</div>


{{-- <section class="regular slider">
    @if(isset($product_list) && is_object($product_list))
    @foreach ($product_list as $value)
    <?php 
    $image  = isset($value->image) && !empty($value->image) ? $value->image : "";;
    $image_path  = isset($value->image_path) && !empty($value->image_path) ? $value->image_path : "";;
    ?>
    <div class="product-card-hover">
        <a href="{{ route('client.product.product-preview', [$value->slug]) }}">
<div class="product-img">
    <img class="img-fluid" src="{{ Storage::url($image_path.$image) }}">
</div>
<div class="medicine-name">
    <p>{{ $value->name }}</p>

</div>
<div class="medicine-description">
    <p>{{ $value->subtitle }}</p>

</div>
<div class="off-rate">
    <p>MRP <del>{{ $value->mrp }}</del><span>{{ $value->discount }}% off</span></p>
</div>
<div class="exact-rate">
    <p>₹ {{ $value->price }}</p>
</div>
</a>
</div>

@endforeach
@endif
</section> --}}

{{-- <div class="container-flex section-main-heading">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="header-section">
                <h4 class="text-center">Always healty pharma: India’s Leading Online Pharmacy & Healthcare Platform</h4>
            </div>
        </div>
    </div>
    <div class="row health-product-row">
        <div class="col-8 col-sm-8 col-md-9 col-lg-10 col-xl-10">
            <div class="Health-product">
                <h4>
                    For Women | Always healty pharma Health Products
                </h4>
            </div>
        </div>

        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2">
            <div class="sell-all-btn">
                <?php
                    $women_product_first = $women_product_list->first();
                    $women_gender_name = isset($women_product_first->gender->name) && !empty($women_product_first->gender->name) ? $women_product_first->gender->name : "";
                    ?>
                <a href="{{ route('product.product-list',['gender' => $women_gender_name]) }}">SEE ALL</a>

</div>
</div>
</div>

</div>

<section class="regular slider">
    @if(isset($women_product_list) && is_object($women_product_list))
    @foreach ($women_product_list as $value)
    <?php 
    $image  = isset($value->image) && !empty($value->image) ? $value->image : "";;
    $image_path  = isset($value->image_path) && !empty($value->image_path) ? $value->image_path : "";;
    ?>
    <div class="product-card-hover">
        <a href="{{ route('client.product.product-preview', [$value->slug]) }}">
            <div class="product-img">
                <img class="img-fluid" src="{{ Storage::url($image_path.$image) }}">
            </div>
            <div class="medicine-name">
                <p>{{ $value->name }}</p>

            </div>
            <div class="medicine-description">
                <p>{{ $value->subtitle }}</p>

            </div>
            <div class="off-rate">
                <p>MRP <del>{{ $value->mrp }}</del><span>{{ $value->discount }}% off</span></p>
            </div>
            <div class="exact-rate">
                <p>{{ $value->price }}</p>
            </div>
        </a>
    </div>
    @endforeach
    @endif
</section> --}}

<div class="container">
    <div class="row">
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
                        <div class="card-rating-bg"><span class="CardRatingDetail__weight-700___27w9q">3.6</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 51 48">
                                <path fill="#ffffff" stroke="none"
                                    d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z">
                                </path>
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
    <div class="row text-center d-none">
        <h2>Health Tips</h2>
    </div>
    <div class="row d-none">
        @if(isset($youtube_link_list) && is_object($youtube_link_list))
        @foreach ($youtube_link_list as $value)
        <div class="col-md-4 mt-4 mb-4">
            <iframe width="560" height="315"
                src="https://www.youtube.com/embed/{{ isset($value['youtube_link']) && !empty($value['youtube_link']) ? $value['youtube_link'] : '' }}"
                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
        @endforeach
        @endif
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).on('ready', function() {

    $(".regular").slick({
      dots: false,
      infinite: true,
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [{
          breakpoint: 768,
          settings: {
            arrows: false,
            centerMode: true,
            
            slidesToShow: 3
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            
            // centerPadding: '40px',
            slidesToShow: 1
          }
        }
      ]
    });

  });
</script>
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