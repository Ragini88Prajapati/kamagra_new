@php
use App\Models\Client\Product;

@endphp
@extends('layouts.client2')

@section('SEO_Part')

<title>{{ $static_seo->meta_title }}</title>
<meta name="title" content="{{$static_seo->meta_title}}" />
<meta name="description" content="{{ $static_seo->meta_description }}" />
<meta name="keywords" content="{{ $static_seo->meta_keyword }}" />
<meta name="robots" content="{{$static_seo->meta_robot}}" />
<link rel="canonical" href="{{$static_seo->canonical_url}}" />

<meta property="og:type" content="{{$static_seo->og_type}}" />
<meta property="og:title" content="{{$static_seo->og_title}}" />
<meta property="og:description" content="{{$static_seo->og_description}}" />
<meta property="og:url" content="{{$static_seo->og_url}}" />
<meta property="og:site_name" content="{{$static_seo->og_site_name}}" />

<meta name="twitter:card" content="{{$static_seo->twitter_card}}" />
<meta name="twitter:site" content="{{$static_seo->twitter_site}}" />
<meta name="twitter:title" content="{{$static_seo->twitter_title}}" />
<meta name="twitter:description" content="{{$static_seo->twitter_description}}" />

@endsection

@section('content')

<div class="container">
    <div class="menu_custom row">
        <!-- /.header_category -->
        <!-- /.header_slider -->
    </div>
</div>
<div class="container">
    <div class="menu_custom  row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="header_slider bannerslider-height nofloat mb-4 image-banner-height">
                <article class="boss_slider image-banner-height" >
                    <div class="tp-banner-container image-banner-height">
                        <div class="tp-banner tp-banner0 image-banner-height">
                            <ul class="image-banner-height">
                                <!-- SLIDE  -->
                                @forelse ($banners as $item)

                                <li class="image-banner-height" data-link="#" data-target="_self" data-transition="3dcurtain-horizontal" data-slotamount="7" data-masterspeed="500" data-saveperformance="on">
                                    <!-- MAIN IMAGE --><img src="{{$item->image_name!=''? asset('/assets/images/banner/').'/'.$item->image_name:''}}" alt="slidebg1" data-lazyload="{{$item->image_name!=''? asset('/assets/images/banner/').'/'.$item->image_name:''}}" data-bgposition="left center" data-kenburns="off" data-duration="14000" data-ease="Linear.easeNone" data-bgpositionend="right center" />
                                    <!-- LAYER NR. 1 -->
                                    <!-- <div class="tp-caption medium_white sft customout rs-parallaxlevel-0" data-x="379"
                                        data-y="56"
                                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                        data-speed="350" data-start="500" data-end="5000" data-endspeed="400"
                                        data-easing="easeInOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1"
                                        data-endelementdelay="0.1" style="z-index: 2;"> Believe in We </div> -->
                                    <!-- LAYER NR. 2 -->
                                    <!-- <div class="tp-caption bold_green_text sft customout rs-parallaxlevel-0"
                                        data-x="268" data-y="75"
                                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                        data-speed="400" data-start="1000" data-end="5000" data-endspeed="400"
                                        data-easing="easeInOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1"
                                        data-endelementdelay="0.1" style="z-index: 2;"> DrugStore </div> -->
                                    <!-- LAYER NR. 3 -->
                                    <!-- <div class="tp-caption large_white_text sft customout rs-parallaxlevel-0"
                                        data-x="361" data-y="213"
                                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                        data-speed="400" data-start="2000" data-end="5000" data-endspeed="400"
                                        data-easing="easeInOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1"
                                        data-endelementdelay="0.1" style="z-index: 2;"> shop now &#33; </div> -->
                                    <!-- LAYER NR. 4 -->
                                    <!-- <div class="tp-caption medium_white sft customout rs-parallaxlevel-0" data-x="283"
                                        data-y="168"
                                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                        data-speed="400" data-start="1500" data-end="5000" data-endspeed="400"
                                        data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1"
                                        data-endelementdelay="0.1" style="z-index: 2;"> Because Your Life Matters
                                        Microloans
                                    </div> -->
                                    <!-- LAYER NR. 5 -->
                                    <div class="tp-caption big_white sft customout rs-parallaxlevel-0" data-x="342" data-y="54" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="400" data-start="500" data-end="5000" data-endspeed="400" data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;"><img src="{{asset('/assets/client2/images/').'/dummy.png'}}" alt="" data-lazyload="{{asset('/assets/client2/images/slide/').'/line_caption.png'}}" />
                                    </div>
                                    <!-- LAYER NR. 6 -->
                                    <div class="tp-caption big_white sft customout rs-parallaxlevel-0" data-x="499" data-y="54" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="400" data-start="500" data-end="5000" data-endspeed="400" data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;"><img src="{{asset('/assets/client2/images/').'/dummy.png'}}" alt="" data-lazyload="{{asset('/assets/client2/images/slide/').'/line_caption.png'}}" />
                                    </div>
                                </li>
                                @empty

                                @endforelse

                                {{-- <li data-link="#" data-target="_self" data-transition="random-static"
                                    data-slotamount="7" data-masterspeed="500" data-saveperformance="on">
                                    <!-- MAIN IMAGE --><img src="images/banner2.jpg" alt="slidebg1"
                                        data-lazyload="images/banner2.jpg" data-bgposition="left center"
                                        data-kenburns="off" data-duration="14000" data-ease="Linear.easeNone"
                                        data-bgpositionend="right center" />
                                    <!-- LAYER NR. 1 -->
                                    <!-- <div class="tp-caption medium_black sfr customout rs-parallaxlevel-0" data-x="634"
                                        data-y="34"
                                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                        data-speed="400" data-start="500" data-end="5000" data-endspeed="400"
                                        data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1"
                                        data-endelementdelay="0.1" style="z-index: 2;"> Up to </div> -->
                                    <!-- LAYER NR. 2 -->
                                    <!-- <div class="tp-caption bold_green_text sfr customout rs-parallaxlevel-0"
                                        data-x="527" data-y="54"
                                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                        data-speed="400" data-start="1000" data-end="5000" data-endspeed="400"
                                        data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1"
                                        data-endelementdelay="0.1" style="z-index: 2;"> 15% off </div> -->
                                    <!-- LAYER NR. 3 -->
                                    <!-- <div class="tp-caption medium_text sfr customout rs-parallaxlevel-0" data-x="590"
                                        data-y="223"
                                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                        data-speed="400" data-start="2000" data-end="5000" data-endspeed="400"
                                        data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1"
                                        data-endelementdelay="0.1" style="z-index: 2;"> shop now &#33; </div> -->
                                    <!-- LAYER NR. 4 -->
                                    <!-- <div class="tp-caption big_black sfr customout rs-parallaxlevel-0" data-x="587"
                                        data-y="140"
                                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                        data-speed="400" data-start="1500" data-end="5000" data-endspeed="400"
                                        data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1"
                                        data-endelementdelay="0.1" style="z-index: 2;"> everything </div> -->
                                    <!-- LAYER NR. 5 -->
                                    <!-- <div class="tp-caption medium_black sfr customout rs-parallaxlevel-0" data-x="515"
                                        data-y="175"
                                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                        data-speed="400" data-start="1700" data-end="5000" data-endspeed="400"
                                        data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1"
                                        data-endelementdelay="0.1" style="z-index: 2;"> Amazing Things Are Happening
                                        Here
                                    </div> -->
                                    <!-- LAYER NR. 6 -->
                                    <div class="tp-caption big_white sfr customout rs-parallaxlevel-0" data-x="598"
                                        data-y="32"
                                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                        data-speed="400" data-start="500" data-end="5000" data-endspeed="400"
                                        data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1"
                                        data-endelementdelay="0.1" style="z-index: 2;"><img src="images/dummy.png"
                                            alt="" data-lazyload="images/slide/line_caption1.png" /> </div>
                                    <!-- LAYER NR. 7 -->
                                    <div class="tp-caption big_white sfr customout rs-parallaxlevel-0" data-x="683"
                                        data-y="32"
                                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                        data-speed="400" data-start="500" data-end="5000" data-endspeed="400"
                                        data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1"
                                        data-endelementdelay="0.1" style="z-index: 2;"><img src="images/dummy.png"
                                            alt="" data-lazyload="images/slide/line_caption1.png" /> </div>
                                </li> --}}
                            </ul>
                            <div class="slideshow_control"></div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div id="column-left" class="col-sm-3 col-md-3 col-lg-3  d-none ">
            <!-- <div class="header_category  nofloat ">
                <div id="boss-menu-category" class="box">
                    <div class="boss_heading">
                        <div class="box-heading medicine-heading-list">
                            <h1>Kategorien <br> </h1>
                        </div>
                    </div>
                    <div class="box-content">
                        <ul class="box-category boss-menu-cate new-iconarrow sidemenu-medicine">
                            @forelse ($product_list as $item)
                            <li>
                                <div class="nav_title"> <i class="fa-solid fa-capsules"></i> <a class="title" href="{{ route('client.product.product-preview', [$item->slug]) }}">{{ $item->name }}</a>
                                </div>
                            </li>
                            @empty

                            @endforelse


                        </ul>
                    </div>
                </div>
            </div> -->

            <div class="bt-staticblock-college d-none">
                <a href="#"><img src="images/banner/banner_home_left1.jpg" title="banner" alt="banner">
                </a>
                <div class="text-info"> <span class="small-text text-1">College bound?</span> <span class="large-text">Save 15%</span> <span class="small-text text-2">There are many
                        variations</span> <a href="#" class="btn-shopnow">Shop Now</a> </div>
            </div><!-- /.bt-staticblock-college -->
            <div class="boss-testimonial testimonial-left" id="boss_testimonial_min_height_0">
                <div class="box-heading title medicine-heading-list">
                    <h1>Testimonials</h1>
                </div>
                <div class="box-content">
                    <div class="testimonial-content" id="testimonial-content0">
                        <div id="boss_testimonial_0">
                            @forelse ($testimonial as $item)
                            <div class="testimonial-item">
                                <div class="testimonial-image"> <img alt="author" src="{{asset('/assets/images/blogs/').'/'.$item->image_name}}" /> </div>
                                <div class="testimonial-message">
                                    <p>{{ isset($item->short_description) &&  !empty($item->short_description) ? $item->short_description  :  '' }}<a href="#" title="More...">...</a>
                                    </p>
                                </div>
                                <div class="testimonial-name">
                                    {{ isset($item->name) &&  !empty($item->name) ? $item->name  :  '' }}
                                </div>
                            </div>
                            @empty

                            @endforelse

                            <!-- {{-- <div class="testimonial-item">
                                    <div class="testimonial-image"> <img alt="author"
                                        src="{{asset('/assets/client2/images/author_2.jpg')}}" />
                                    </div>
                                    <div class="testimonial-message">
                                        <p>
                                            On the other hand, we denounce with righteous indignation and dislike men who are
                                            so beguiled and demoralized by the charms of pleasure of the mome <a href="#"
                                            title="More...">...</a>
                                        </p>
                                    </div>
                                    <div class="testimonial-name"> John Doe </div>
                            </div> --}} -->
                        </div>
                    </div>
                </div>
            </div><!-- /.boss-testimonial -->

            <div class="bt-box box-special advertisment-div">
                <div class="box-heading title medicine-heading-list">
                    <h1>Advertisment</h1>
                </div>
                <div class="box-content">
                    <div class="list-product" id="product_special_0">
                        @if (isset($static) && $static->ad_image1!='')
                        <div class="item product-thumb">
                            <div class="image text-center">
                                <a href="">
                                    <img src="{{$static->ad_image1!=''? asset('/assets/images/static/').'/'.$static->ad_image1:''}}" alt="Kamagra">
                                </a>
                            </div>
                        </div><!-- /.item -->

                        @endif
                        @if (isset($static) && $static->ad_image2!='')
                        <div class="item product-thumb">
                            <div class="image text-center">
                                <a href="">
                                    <img src="{{$static->ad_image2!=''? asset('/assets/images/static/').'/'.$static->ad_image2:''}}" alt="Kamagra">
                                </a>
                            </div>
                        </div><!-- /.item -->

                        @endif
                        @if (isset($static) && $static->ad_image3!='')
                        <div class="item product-thumb">
                            <div class="image text-center">
                                <a href="">
                                    <img src="{{$static->ad_image3!=''? asset('/assets/images/static/').'/'.$static->ad_image3:''}}" alt="Kamagra">
                                </a>
                            </div>
                        </div><!-- /.item -->

                        @endif
                        {{-- <div class="item product-thumb">
                            <div class="image text-center">
                                <a href="">
                                    <img src="http://127.0.0.1:8000/assets/images/product/1642515546super-kamagra-200x200.jpg"
                                        alt="Kamagra">
                                </a>
                            </div>
                        </div><!-- /.item --> --}}

                    </div>
                    <div class="carousel-button"> <a id="prev_special_0" class="prev nav_thumb" href="javascript:void(0)" title="prev"><i class="fa fa-angle-left"></i></a> <a id="next_special_0" class="next nav_thumb" href="javascript:void(0)" title="next"><i class="fa fa-angle-right"></i></a> </div>
                </div><!-- /.box-content -->
            </div><!-- /.bt-box -->

            <div class="bt-box box-special advertisment-div">
                <div class="box-heading title medicine-heading-list">
                    <h1>Advertisment</h1>
                </div>
                <div class="box-content">
                    <div class="list-product">
                        @if (isset($static) && $static->ad_image1!='')
                        <div class="item product-thumb">
                            <div class="image text-center">
                                <a href="">
                                    <img src="{{$static->ad_image1!=''? asset('/assets/images/static/').'/'.$static->ad_image1:''}}" alt="Kamagra">
                                </a>
                            </div>
                        </div>

                        @endif
                        @if (isset($static) && $static->ad_image2!='')
                        <div class="item product-thumb">
                            <div class="image text-center">
                                <a href="">
                                    <img src="{{$static->ad_image2!=''? asset('/assets/images/static/').'/'.$static->ad_image2:''}}" alt="Kamagra">
                                </a>
                            </div>
                        </div>

                        @endif
                        @if (isset($static) && $static->ad_image3!='')
                        <div class="item product-thumb">
                            <div class="image text-center">
                                <a href="">
                                    <img src="{{$static->ad_image3!=''? asset('/assets/images/static/').'/'.$static->ad_image3:''}}" alt="Kamagra">
                                </a>
                            </div>
                        </div>

                        @endif


                        {{-- <div class="item product-thumb">
                            <div class="image text-center">
                                <a href="">
                                    <img src="http://127.0.0.1:8000/assets/images/product/16425144121-1-home-200x200.jpg"
                                        alt="Kamagra">
                                </a>
                            </div>
                        </div><!-- /.item --> --}}

                    </div>

                </div><!-- /.box-content -->
            </div><!-- /.bt-box -->

            <!--module boss - fillter product-->
            <div class="boss-filter-container d-none">
                <div id="boss_homefilter_tabs0" class="boss_homefilter_tabs">
                    <div id="tabs_container0" class="hide-on-mobile tabs_container"> </div>
                    <div id="tabs_content_container0" class="home_filter_content tabs_content_container">
                        <div class="box-heading title ">
                            <h1>Best Products</h1>
                        </div>
                        <div class="box-content">
                            <div id="content_tab00" class="content_tabs0 list_carousel responsive column-noimage" style="display:block">
                                <ul id="carousel_tab00" data-prev="#prev_tab00" data-next="#next_tab00" class="box-product">
                                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="product-thumb">
                                            <div class="image">
                                                <a class="" data-id="42" href="product-detail.php"><img src="images/product/p2-81x81.jpg" alt="Baby Bottle" title="Baby Bottle" />
                                                </a>
                                            </div>
                                            <div class="small_detail">
                                                <div class="name"><a href="product-detail.php">Baby Bottle</a>
                                                </div>
                                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack fa-hidden"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack fa-hidden"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                                <div class="price"> $122.00 </div>
                                                <div class="button-group">
                                                    <button class="btn-cart" type="button">Add to Cart</button>
                                                    <div class="wishlist-compare">
                                                        <button class="btn-wishlist" type="button" title="Add to Wish List"><i class="fa fa-heart"></i>
                                                        </button>
                                                        <button class="btn-compare" type="button" title="Compare this Product"><i class="fa fa-retweet"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box_btn_icon">
                                                <div class="description">
                                                    <p>Fusce ut pellentesque justo. Aliquam sit amet tincidunt orci.
                                                        Praesent mauris lorem, iaculis et blandit eget, tristique id
                                                        risus. Donec </p>
                                                </div>
                                                <div class="cart"> <a class="btn btn-cart" title="Add to Cart"><span>Add
                                                            to Cart</span></a> <a class="btn btn-shopping" title="Detail" href="product-detail.php"><span>Detail</span></a>
                                                </div>
                                                <div class="compare"><a class="action-button" title="Compare this Product"><span>Compare this
                                                            Product</span></a>
                                                </div>
                                                <div class="wishlist"><a class="action-button" title="Add to Wish List"><span>Add to Wish List</span></a>
                                                </div>
                                            </div>
                                        </div><!-- /.product-thumb -->
                                        <div class="product-thumb">
                                            <div class="image">
                                                <a class="" data-id="32" href="product-detail.php"><img src="images/product/p22-81x81.jpg" alt="OxyELITE pro" title="OxyELITE pro" />
                                                </a>
                                            </div>
                                            <div class="small_detail">
                                                <div class="name"><a href="product-detail.php">OxyELITE pro</a>
                                                </div>
                                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack fa-hidden"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                                <div class="price"> $122.00 </div>
                                                <div class="button-group">
                                                    <button class="btn-cart" type="button">Add to Cart</button>
                                                    <div class="wishlist-compare">
                                                        <button class="btn-wishlist" type="button" title="Add to Wish List"><i class="fa fa-heart"></i>
                                                        </button>
                                                        <button class="btn-compare" type="button" title="Compare this Product"><i class="fa fa-retweet"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box_btn_icon">
                                                <div class="description">
                                                    <p>Fusce ut pellentesque justo. Aliquam sit amet tincidunt orci.
                                                        Praesent mauris lorem, iaculis et blandit eget, tristique id
                                                        risus. Donec nibh</p>
                                                </div>
                                                <div class="cart"> <a class="btn btn-cart" title="Add to Cart"><span>Add
                                                            to Cart</span></a> <a class="btn btn-shopping" title="Detail" href="product-detail.php"><span>Detail</span></a>
                                                </div>
                                                <div class="compare"><a class="action-button" title="Compare this Product"><span>Compare this
                                                            Product</span></a>
                                                </div>
                                                <div class="wishlist"><a class="action-button" title="Add to Wish List"><span>Add to Wish List</span></a>
                                                </div>
                                            </div>
                                        </div><!-- /.product-thumb -->
                                        <div class="product-thumb">
                                            <div class="image">
                                                <a class="" data-id="35" href="product-detail.php"><img src="images/product/p12-81x81.jpg" alt="Emetrol" title="Emetrol" />
                                                </a>
                                            </div>
                                            <div class="small_detail">
                                                <div class="name"><a href="product-detail.php">Emetrol</a>
                                                </div>
                                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack fa-hidden"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                                <div class="price"> $122.00 </div>
                                                <div class="button-group">
                                                    <button class="btn-cart" type="button">Add to Cart</button>
                                                    <div class="wishlist-compare">
                                                        <button class="btn-wishlist" type="button" title="Add to Wish List"><i class="fa fa-heart"></i>
                                                        </button>
                                                        <button class="btn-compare" type="button" title="Compare this Product"><i class="fa fa-retweet"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box_btn_icon">
                                                <div class="description">
                                                    <p>Fusce ut pellentesque justo. Aliquam sit amet tincidunt orci.
                                                        Praesent mauris lorem, iaculis et blandit eget, tristique id
                                                        risus. Donec </p>
                                                </div>
                                                <div class="cart"> <a class="btn btn-cart" title="Add to Cart"><span>Add
                                                            to Cart</span></a> <a class="btn btn-shopping" title="Detail" href="product-detail.php"><span>Detail</span></a>
                                                </div>
                                                <div class="compare"><a class="action-button" title="Compare this Product"><span>Compare this
                                                            Product</span></a>
                                                </div>
                                                <div class="wishlist"><a class="action-button" title="Add to Wish List"><span>Add to Wish List</span></a>
                                                </div>
                                            </div>
                                        </div><!-- /.product-thumb -->
                                        <div class="product-thumb">
                                            <div class="image">
                                                <a class="" data-id="47" href="product-detail.php"><img src="images/product/p21-81x81.jpg" alt="duodart" title="duodart" />
                                                </a>
                                            </div>
                                            <div class="small_detail">
                                                <div class="name"><a href="product-detail.php">duodart</a>
                                                </div>
                                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack fa-hidden"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack fa-hidden"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                                <div class="price"> <span class="price-old">$122.00</span> <span class="price-new">$104.00</span> </div>
                                                <div class="button-group">
                                                    <button class="btn-cart" type="button">Add to Cart</button>
                                                    <div class="wishlist-compare">
                                                        <button class="btn-wishlist" type="button" title="Add to Wish List"><i class="fa fa-heart"></i>
                                                        </button>
                                                        <button class="btn-compare" type="button" title="Compare this Product"><i class="fa fa-retweet"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box_btn_icon">
                                                <div class="description">
                                                    <p>Fusce ut pellentesque justo. Aliquam sit amet tincidunt orci.
                                                        Praesent mauris lorem, iaculis et blandit eget, tristique id
                                                        risus. Donec </p>
                                                </div>
                                                <div class="cart"> <a class="btn btn-cart" title="Add to Cart"><span>Add
                                                            to Cart</span></a> <a class="btn btn-shopping" title="Detail" href="product-detail.php"><span>Detail</span></a>
                                                </div>
                                                <div class="compare"><a class="action-button" title="Compare this Product"><span>Compare this
                                                            Product</span></a>
                                                </div>
                                                <div class="wishlist"><a class="action-button" title="Add to Wish List"><span>Add to Wish List</span></a>
                                                </div>
                                            </div>
                                        </div><!-- /.product-thumb -->
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div><!-- /.box-content -->
                    </div>
                </div>
            </div><!-- /.boss-filter-container -->
            <div class="bt-staticblock-babyneeds d-none">
                <a href="#"><img src="images/banner/banner_home_left2.jpg" title="banner" alt="banner">
                </a>
                <div class="text-info"> <span class="small-text">25 Products</span> <span class="large-text">Baby
                        Needs</span> <a href="#" class="btn-shopnow">Shop Now</a> </div>
            </div><!-- /.bt-staticblock-babyneeds -->
            <div class="bt-staticblock-diet d-none">
                <a href="#"><img src="images/banner/banner_home_left3.jpg" title="banner" alt="banner">
                </a>
                <div class="text-info"> <span class="small-text">07 Products</span> <span class="large-text">Diet &amp;
                        Fitness</span> <a href="#" class="btn-shopnow">Shop Now</a> </div>
            </div><!-- /.bt-staticblock-diet -->
        </div><!-- /#column-left -->
        
        <div id="content" class="col-sm-12 col-md-12 col-lg-12">


            <!--<div class="banner-bottom">-->
            <!--    <img src="{{asset('/assets/client2/images/banner-bottom.png')}}" alt="">-->
            <!--</div>-->

            <div class="bt-product-category ">

                <div class="box-heading title">
                    <h1>Produkt</h1>
                </div>
                <div class="bt-featured-pro bt-nprolarge-tabs heightcard">
                    @forelse ($product_list as $item)
                    <div id="bt_procate_00" class="box htabs-content boss-category-pro bt-nprolarge-nslider col-xs-12 col-sm-4 col-lg-4">
                        <div class="product-categories-box prodheight">
                            <!-- <div class="box-heading title">
                                <h3>{{$item->name}}</h3>
                            </div> -->
                            <div class="box-content bt-product-content">
                                <div class="bt-items bt-product-grid">
                                    <div id="boss_procate_00">
                                        {{-- @php
                                                $getProduct=Product::where('product_type_id',$item->id)->take(3)->get();
                                            @endphp
                                            @forelse ($getProduct as $item2) --}}
                                        <div class="bt-item-extra product-layout">
                                            <section class="product-thumb bt-item transition">
                                                <div class="image">
                                                    <a href="{{ route('client.product.product-preview', [$item->slug]) }}">
                                                        <img src="{{asset('/assets/images/product/').'/'.$item->image}}" alt="{{$item->name}}" />
                                                        {{-- {{asset('/assets/client2/images/product/p5-100x100.jpg')}}
                                                        --}}

                                                    </a>
                                                </div>
                                                <div class="small_detail">
                                                    <div class="caption">
                                                        <div class="name"> <a href="{{ route('client.product.product-preview', [$item->slug]) }}">{{$item->name}}</a>
                                                        </div>
                                                        <p class="price color-red"> €{{$item->price}}</p>
                                                    </div>
                                                </div>
                                            </section>
                                        </div><!-- /.bt-item-extra -->


                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- /.box-content -->
                        </div>
                    </div><!-- /.htabs-content -->
                    @empty

                    @endforelse



                </div><!-- /."bt-featured-pro -->
            </div>

            <div class="bt-service mt-50">
                <div class="box-heading title ">
                    <h1> <i class="fa fa-star"></i> Dienstleistungen</h1>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="bt-service-items col-sm-4 col-xs-12">
                            <div class="bt-service-content">
                                <a class="bt-service-icon" href="#">
                                    <img src="{{asset('/assets/client2/images/dhl.jpg')}}" alt="">
                                </a>
                                <!--<h2>{{$static->title1}}</h2>-->
                                <h2>SCHNELLE &amp; KOSTENLOSE <br> LIEFERUNG </h2>
                                <p>{{$static->short_description1}}</p>
                                <!--<p>Rockefeller Jane Addams, bedeutungsvoller Kampf gegen Malaria. Rechtebasierter-->
                                <!--    Ansatz.</p> <a class="btn" href="#">Weiterlesen</a>-->
                            </div>
                        </div>
                        <div class="bt-service-items col-sm-4 col-xs-12">
                            <div class="bt-service-content"> <a class="bt-service-icon" href="#"><i class="fa fa-thumbs-o-up"></i></a>
                                <h2>HÖCHSTE <br> PRODUKTQUALITÄT</h2>
                                <!--<p>Behandlungskatalysator für menschliche Erfahrungen; Innovation Kampf gegen-->
                                <!--    Mangelernährung, Ausbau.</p> <a class="btn" href="#">Weiterlesen</a>-->
                                <!--<h2>{{$static->title2}}</h2>-->
                                <p>{{$static->short_description2}}</p>
                            </div>
                        </div>
                        <div class="bt-service-items col-sm-4 col-xs-12">
                            <div class="bt-service-content">
                                <a class="bt-service-icon" href="#">
                                    <img src="{{asset('/assets/client2/images/bank_transfer.jpg')}}" style="width:80px;" alt="Bank Transfer">
                                </a>
                                <h2>100% <br> GELD-ZURÜCK-GARANTIE</h2>
                                <!--<p>Inkubation, Gleichstellung der Geschlechter, Beteiligung an innovativen Erfahrungen-->
                                <!--    im Feldkampf.</p>-->
                                <!--<a class="btn" href="#">Weiterlesen</a>-->
                                <!--<h2>{{$static->title3}}</h2>-->
                                <p>{{$static->short_description3}}</p>
                            </div>
                        </div>

                                                
                    </div>

                    <div class="row">
                        <div class="service-new" style="margin-top:20px;">
                            <img src="{{asset('/assets/client_new/service_new.png')}}" alt="" srcset="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="banner-bottoms" style="margin-top:20px;">
                            <img src="{{asset('/assets/client_new/Kamagra_funktioniert.png')}}" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div><!-- /.bt-service -->

            <div class="prod-descrip-listdetail listhome">
                <!--<h2>-->
                <!--    <b>-->
                <!--KAMAGRA IM ONLINEKAMAGRASTORE BESTELLEN?-->
                <!--    Willst du Medizin für das Ed-Problem? Kamagra Kaufen Beste Tabelle, um Sie zu heilen.-->
                <!--    </b>-->
                <!--</h2>-->
                <h1 style="font-size:18px; line-height:20px; text-transform:uppercase;">
                    <b style="font-weight:700;">
                        <!--Willst du Medizin für das Ed-Problem? Kamagra Kaufen Beste Tabelle, um Sie zu heilen.-->
                        Kamagra bestellen Medizin für Ihre erektile Dysfunktion. jetzt bestellen!
                    </b>
                </h1>
                <!--<h5>Sildenafil Citrate Kamagra Makellose Präsenz jetzt in Deutschland</h5>-->

                <p>Sildenafil Citrate Kamagra Makellose Präsenz jetzt in Deutschland</p>

                <p>Erektionsstörungen sind in der heutigen Zeit am normalsten, die Sehnsucht nach fragmentiertem Sex geht verloren. Kamagra hilft sogar Diabetikern dabei, den Geschlechtsverkehr zu beenden. Sildenafil Citrat ist eine Hilfe für die Menschheit als angezeigte Lösung für Krankheiten im Zusammenhang mit pneumonischer Bluthochdruck (PAH).</p>

                <p>Es enthält Arterienwand und verringert die Spannung auf Lungenarterien. Es ist die Reaktion auf die Arbeit am rechten Ventrikel und die Verringerung der Möglichkeiten eines rechtsseitigen kardiovaskulären Zusammenbruchs. Es wurde gezeigt, dass Kamagra bei Männern und Frauen, die Antidepressiva einnehmen, auf die sexuelle Leistungsfähigkeit wirkt.</p>

                <p>Fordern Sie Kamagra beim onlinekamagrastore an, vorausgesetzt, Sie erwarten schnelle Lieferzeiten Fordern Sie Kamagra an - Ein Mann sollte sexuelle Festigkeit haben, um die Möglichkeit zu haben, seinen Komplizen zu erfüllen. Sexuelle Kraft kann durch verschiedene Variablen negativ beeinflusst werden, einschließlich sozialer Bedingungen, psychischer Probleme und zusätzlich tatsächlicher Bedingungen. Auch die Sexualität eines Mannes wirkt sich auf seine Kraft und sein Selbstbewusstsein aus. Es sollte nicht abgetan und übersehen werden, wenn der Mann irgendwelche sexuellen Probleme hat.</p>

                <p>Das vielleicht am weitesten verbreitete Problem bei Männern ist Schwäche, auch Erektionsstörung genannt. Dieses Problem tritt bei einem von zehn Männern auf und hängt mit pessimistischen Gefühlen, Unzufriedenheit, einem Gefühl der Unzulänglichkeit und fehlender Unterstützung zusammen. Diese große Anzahl von Empfindungen kann für den Mann eine Schande sein. Für den Fall, dass Sie in eine solche Situation geraten, ist es wichtig, eine geeignete Behandlung zu finden, um dieses Problem effektiv zu bekämpfen.</p>

                <p>Eine Konzentration auf Kamagra lieferte die begleitenden Ergebnisse</p>
                <ul>
                    <li>Über 60 % der Männer verlieren durch Unfruchtbarkeit ihr Selbstbewusstsein</li>
                    <li>Etwa 29 % haben aufgrund dieses Problems die Energie in ihrer Beziehung verloren</li>
                    <li>20 % konnten dieses Problem ihrem Komplizen nicht ausreichend vermitteln</li>
                </ul>

                <p>Aufgrund dieses Problems haben viele Männer auch soziale Verlegenheit erlebt und sollten anschließend Kamagra arrangieren.</p>

                <p>Suchen Sie die beste Behandlung von onlinekamagrastore, ohne Ihren Charakter zu enthüllen.</p>

                <p>Für den Fall, dass Sie von Schwäche oder Erektionsstörungen gequält werden, sollten Sie mit dem Stress aufhören, da onlinekamagrastore Ihnen die besten Behandlungsoptionen bieten kann, ohne Ihre Bedenken offenzulegen.</p>

                <p>OnlineKamagraStore kann den Personen helfen, die nicht die Möglichkeit haben, zu ihrem Hausarzt zu eilen, um eine Lösung zu finden, aber eine ähnliche Behandlung von zu Hause aus arrangieren müssen.</p>

                <p>Bereiten Sie sich mit Kamagra auf ein befriedigendes sexuelles Zusammenleben vor</p>

                <p>Besuchen Sie die königliche Residenz, Sie müssen nur zum Pillenschloss gehen und die gewünschten Gegenstände auswählen, während Sie sich zu Hause wohlfühlen. Sie sollten sich einfach auf der Website anmelden und einige grundlegende Daten im Zusammenhang mit dem Problem angeben und den von Ihnen ausgewählten Artikel vorzeigen.</p>

                <ul>
                    <li>Die Anmeldung auf der Seite ist denkbar einfach und sollte ohne großen Kraftaufwand möglich sein</li>
                    <li>Die im Kamagra-Shop erhältlichen Artikel sind 100 Prozent sicher und es ist alles in Ordnung, wenn Sie sie mitnehmen. Sie haben sich klinisch als überzeugend erwiesen und sollen dazu beitragen, Ihr geschäftiges Leben einfacher und vorteilhafter zu gestalten.</li>
                    <li>Sie können sich eine große Auswahl ansehen, zum Beispiel Generic Viagra, Kamagra Oral Jam, Kamagra Delicate, Zenegra-Tabletten, Kamagra Polo, Tadora-Tabletten, Lovegra-Tabletten, Suhagra-Tabletten, Caverta-Tabletten und viele andere. Alle im onlinekamagrastore präsentierten Gegenstände sind extrem geschützt. Ebenso helfen sie, das Problem der Unfruchtbarkeit anzugehen.</li>
                </ul>

                <p>Außerdem ist es ideal für Personen geeignet, die mysteriös bleiben und sicherstellen müssen, dass niemand mit ihrer Sorge vertraut ist, um zu versuchen, keine demütigenden Umstände mit Gefährten oder Familie zu erleiden. Mit der großen Bandbreite von Kamagra Marmelade und anderen gigantisch wirksamen Arzneimitteln werden Sie den Sorgen des unerfüllten sexuellen Zusammenlebens oder der Schwäche entfliehen.</p>

                <p>Diskretion ist unsere Priorität beim Kamagra kaufen</p>

                <p>Sie müssen sich keine Gedanken über ihre privaten Daten machen, da das Team vom onlinekamagrastore für höchste Datensicherheit und Diskretion steht. Bei Onlinekamagrastore können Sie sicher Kamagra bestellen. Wenn Sie bei uns Kamagra bestellen überweisen Sie bequem auf ein deutsches Bankkonto das Ihnen ebenfalls die Sicherheit gibt Ihre Ware schnellstens zu erhalten. Können Sie sich vorstellen kamagra in einem nicht EU Land zu bestellen. Wir liefern Kamagra direkt aus England zu Ihnen. Wenn Sie Kamagra bestellen sind unsere Lieferzeiten maximal 2-3 Tage damit die Ihre Sendung direkt entgegen nehmen können. Wenn Sie bei Onlinekamagrastore Ihr Kamagra bestellen können Sie sich direkt nach dem klicken des absenden Bottons bereits auf Ihre Lieferung freuen. Profitieren Sie von unserer Erfahrung wenn Sie bei onlinekamagrastore Ihr Kamagra bestellen.</p>

                <p>Kamagra ist die beste Alternative zu Viagra</p>

                <p>kamagra geliKamagra kann problemlos als Alternative zu Viagra Generika verwendet werden. Kamagra besitzt die gleichen Inhaltsstoffe wie Viagra und wirkt deshalb auch identisch. Da Kamagra eine in Deutschland nicht erhältlich ist oder nur mit Rezept können Sie handelsübliche Packungen Kamagra jetzt rezeptfrei in unserem Onlineshop bestellen wir liefern Ihre Bestellung innerhalb von 2-3 Tage zu Ihnen ins Haus. Verwenden Sie Kamagra wie jedes andere Medikament nach der Packungsbeilage. Kamagra wird Sie in Höchstform bringen. Wenn Sie Kamagra in großen Mengen bestellen sparen Sie auch die Versandkosten denn dann geht es ganz ohne Versandkosten oder Porto.</p>

                <P>Kamagra wird in Europa immer populärer</P>

                <p>Die Popularität von Kamagra in Europa steigt immer mehr an. Der Erfolg von Kamagra ist der Rezeptur zu verdanken. Kamagra ist mit Viagra fast völlig identisch und dennoch steigen die Verkaufszahlen von Kamagra stetig an. kamagra wird nämlich günstiger hergestellt als Viagra nicht vor allem weil die Entwicklung de Medikamentes in Deutschland auf das Produkt umgelegt werden muss. Diese Entwicklungskosten entfallen für Kamagra völlig. Das werden Sie feststellen wenn Sie Kamagra bestellen werden.Hier können Sie Kamagra ohne Versandkosten bestellen.</p>

                <p>OnlineKamagraStore ist die Welt der Generika günstige Medikamente ohne Rezept. Wenn Sie bei uns Kamagra bestellen können Sie nicht nur geld sparen sondern bekommen auch eine Garantie, dass Ihre Bestellung innerhalb von 2-3 Tage bei Ihnen angeliefert wird. Wenn Sie bei uns Kamagra bestellen können Sie zwischen unterschiedlicher Stärke und Packungsgröße wählen. Weil wir in Europa ansässig sind haben Sie auch so gut wie keine Versandkosten für Ihre Kamagra-Bestellung zu berücksichtigen.</p>

                <p>OnlineKamagraStore eine der erfolgreichsten Kamagra Lieferanten mit Onlinekamagrashop. Hier können Sie Kamagra bestellen und für private wie gewerbliche Zwecke verwenden. Hier bestellen Sie Kamagra und überweisen auf ein deutsches Bankkonto, so dass Sie Ihre Kamagra-Lieferung umgehend nach Zahlunsgeingang erhalten werden. Wenn Sie Kamagra bestellen achten Sie auf das Bild mit der originalen Kamagra-Verpackung. Onlinekamagrastore bedeutet Kamagralager und ist Ihr erster Lieferant wenn es heißt Kamagra zu bestellen. kamagra bestellen ist in erster Linie dazu da Ihnen den absoluten Service bieten damit Sie nicht mehr Wochenlang auf Ihre Kamagra Bestellung warten müssen. Wenn Sie hier kamagra bestellen könne Sie innerhalb von 4 Tage mit Ihrere Kamagra Lieferung rechnen. Wir Liefern Ihnen Ihr Kamagra per DHl direkt zu Ihnen nach hause ohne Umwege. Wählen Sie selber wo Sie Ihr kamagra bestellen den dieser Weg ist der kürzeste.</p>

                <p>Kamagra bestellen wir immer in großen Mengen</p>

                <p>Jetzt besonders günstig Kamagra bestellen durch unsere großen Bestellungen könne wir Ihnen besonders niedrige Preise anbieten die Sie sonst vergeblich im Internet suchen werden. weil wir immer soviel Kamagra bestellen bekommen wir von unseren Händlern sehr gute Konditionen die wir natürlich an Sie weitergeben möchten. Wenn Sie kamagra bestellen profitieren Sie natürlich davon und wenn Sie dann auch noch größere Mengen bestellen bekommen Sie Kamagra noch günstiger. Wir verbürgen usn dafür, dass wenn Sie Kamagra bestellen Ihre Bestellung schnellstens erhalten. Jede Kamagra Bestellung aus Deutschland wird von uns bevorzugt behandelt damit Sie bei uns auch in Zukunft Kamagra bestellen werden. Unsere Zahlungsarten sind Überweisung oder Kreditkarte leider funktuioniert Bestellen PayPal für Kamagra. Vorübergehend niedrige Kamagra-Preise sind die Auswirkungen des hohen Euro, von dem Sie natürlich profitieren, wenn Sie Kamagra im OnlineKamagraStore bestellen</p>

                <p>Auf Kamagra angewiesen</p>

                <p>Viele Männer sins auf Errektionshilfen wie Kamagra angewiesen. Wenn Sie Kamagra bestellen ist es für Sie als wenn Sie wieder zum Mann werden. Gerade im ehelichen Verhältnis spielt Sex eine wichtige Rolle und wenn es dann nur noch mit Kamagra geht sollten Sie dort kamagra bestellen wo es günstig ist um Ihre Haushaltskasse zu schonen. Deshalb bei onlinekamagrastore Kamagra bestellen und von den günstigen Preisen profitieren. Kamagra wirkt auf wundersamer Weise genau so wie Mann es haben möchte. Von allen Männern die bei uns Kamagra bestellen haben wir nur positive Nachrichten erhalten. Kamagra besticht durch seine leichte und dennoch langanhaltende Wirkung und durch seine Dosierungsmöglichkeiten sowie den geringen Nebenwirkungen. Kamagra bestellen Sie wenn Sie Anfangs leichte Probleme mit der Standhaftkeit haben. Wenn Sie Kamagra bestellen werden Sie schnell sehen das es eine dauerhafte Lösung sein kann. Da Sie Ihr Kamagra ja innerhalb der europäischen Union bestellen ist auch ein Umtausch bei Unzufriedenheit kein Problem doch davon hat bisher niemand unserer Kunden gebrauch gemacht wenn Sie Kamagra bestellen. Kamagra bestellen in den einzigartigsten Formen und auch als Geschenk verpacken lassen. Schenken Sie Ihrem Liebsten doch mal Kamagra ! Kamagra bestellen oder auch eine Gutschein bestellen wie Sie es möchten. Kamagra zu verwenden ist keine Schande sondern ein Erlösung wenn es mal mit dem kleinen Mann nicht mehr richtig funktioniert. Kamagra wird von vielen Männern verwendet und wenn Sie sich offen in Ihrem Freundeskreis über Kamagra unternhalten werden Sie sehen, dass es keine Schande ist Kamagra zu bestellen. Kamagra wird von Männern auch verwendet um sich noch stärker zu machen wobei wir Ihnen das nicht empfehlen. Gesunde Männern können zwar öfter mit Kamagra aber man sollte der natur in diesem Punkt nicht zu sehr herausfordern.</p>

                <p>Kamagra bestellen in unserem Onlineshop</p>

                <p>Neue Lieferzeiten für Ihre Kamagra Bestellung und alle anderen Generika. Wenn Sie heute Kamagra bestellen liefern wir Ihnen mit DHL bis an Ihre Haustür. Kamagra bestellen läuft bei uns 100% diekret und anonym ab. Niemand erfährt davon das Sie gerne Kamagra bestellen dafür bekommen Sie unser Ehrenwort. Ihr kamagra wird in einer neutralen Verpackung bei Ihnen angeliefert weil wir Sie als Kunden ja gerne öfters beliefern möchten wenn Sie weiterhin bei uns Kamagra bestellen. Kamagra bestellen hier mit Lieferzeiten zwischen 2-3 Tage wenn Sie noch heute Kamagra bestellen erhalten Sie bereits in kürze Ihre Bestellung mit DHL nach hause geliefert. Kamagra bestellen soll für Sie in Zukunft immer schneller gehen das ist es was uns anspornt unseren Service für ständig zu verbessern. Wenn Sie das nächste mal Kamagra bestellen sollte es schon wieder schneller gehen. Bei onlinekamagrastore bestellen Sie bereits ab einem Bestellwert von 100€ versandkostenfrei. Bestellen Sie bei Onlinekamagrastore und Ihre Bestellung wird von einem Deutschen Team bearbeitet das garantiert Ihnne Zuverlässigkeit und Termintreue. Immer wenn Sie bei OnlineKamagraStore</p>

                <p>Kamagra bestellen wird Ihre Bestellung direkt nach dem Zahlungseingang versendet.</p>

                <P>Kamagra bestellen günstig</P>

                <p>Nach viele Hinweise unserer Kunden wurde Kamagra bestellen auf OnlineKamagraStore günstiger. Wir haben die Kosten für den kostenfreien Versand und für den regulären Versand gesenkt. Wenn Sie jetzt Kamagra bestellen können Sie bereits ab 50€ den kostenfreien Versand wählen und schon ab 0.00€ den regulären Versand. Onlinekamagrastore sorgt dafür das Kamagra bestellen immer günstiger wird. Wir stehen dazu wenn Sie kamagra bestellen erhalten Sie den kosten freien Versand extra dazu. Wer kamagra bestellen möchte sollte es jetzt mach denn nie wieder wird Kamagra bestellen so günstig. Von Heute auf Morgen sind die Preise für Kamagra bestellen so günstig geworden, dass wir Sie wenn Sie Kamagra bestellen daran teilhaben lassen möchten.</p>

                <p>Kamagra Kaufen Online ist so bequem</p>

                <p>Sind Sie aufgeregt, jetzt zu wissen, wie diese Online-Apotheken sparen Sie Ihr Geld und Zeit? Sie müssen nicht zu reisen oder zu lokalisieren jede lokale Apotheke zu gehen und kaufen diese Medizin, die Spar ist Ihre Zeit, wenn Sie Kamagra bestellen online. Und wenn Sie von Kamagra Online-Apotheke kaufen sie das Medikament zu verkaufen für einen viel günstigeren Preis als die normalen Apotheken. So können Sie auch sparen eine Menge Geld. Diese Online-Apotheken das</p>

                <p>Erektile Dysfunktion ist kein Problem, das behandelt werden kann. Also, muss Ihr Partner nicht zu viel sorgen. Wenn Sie das Medikament Kamagra einnehmen, müssen Sie sehr vorsichtig sein und sicherstellen, dass nehmen Sie die richtige Dosis für anständige Wirkung auf Ihren Körper. Wenn Ihr Partner das Gefühl ist schüchtern und verlegen zu treffen den Arzt und Anweisungen dazu, wie Sie die Medizin verwenden, dann können Kamagra kaufen bei der Online-Drogerien. Es gibt viele Online-Drogerien erhältlich, wo Sie die Medikamente kaufen können. Sie sollten zumindest an den Online-Support-Team sprechen, die für Ihre Hilfe bei der Online-Drogerien vorhanden ist. Sie erhalten alle Informationen, die Sie benötigen über die Medizin, die stattfinden sollte, der Medizin, wie die Medizin ist zu achten, was sind die Vorsichtsmaßnahmen getroffen werden, wenn Sie dieses Arzneimittel einnehmen, was sind die häufigsten Nebenwirkungen, die bei vielen Menschen zu Beginn gesehen und auch wie man Kamagra bestellen online.</p>

                <p>Für ein sehr beängstigend Problem wie erektile Dysfunktion bei Männern, haben Sie eine sehr sichere und freundliche Lösung wie Kamagra kaufen Pillen. Ja, unter all den gesundheitlichen Problemen, die Männer Gesicht, sie sind wirklich Angst vor erektile Dysfunktion, und diese Angst ist mehr in den Männern, die vor diesem Problem der erektile Dysfunktion in einem frühen Alter sind. Es gibt viele Männer, die nicht einmal darüber sprechen, auch nicht an ihren Partner, an ihre Familie, ihre Freunde oder sogar an ihre Kollegen. Dies ist, weil sie das Gefühl, dass es das Problem ist, dass sie nicht konfrontiert sein sollte und es ist die Frage, ihre Männlichkeit. Aber das ist nicht wahr. Kamagra bestellen Pillen können von jedermann verwendet werden und Sie haben keine gefährliche Gesundheit Problem überhaupt. Es ist, dass das Typ-5-Enzym oder das PDE-5-Enzym die Produktion von Stickoxid im Körper stoppt und somit der Prozess, der für die Erektion erforderlich ist, nicht stattfindet. Also, Kamagra kaufen heute und Sie werden in der Lage, eine Erektion bekommen, sobald Sie es nehmen.</p>

                <p>Wenn Sie über Kamagra kaufen Pillen sprechen, dann sollten Sie darüber reden, wie es auch nehmen. Ja, es ist die wichtigste Information, die auch in den Online-Shops zur Verfügung gestellt wird, wenn Sie Kamagra kaufen. So müssen Sie nur sicherstellen, dass Sie Ihren Arzt treffen, bevor Sie diese Medizin starten. Sie sollten zunächst alle getesteten Tests, die vom Arzt verschrieben werden und auch alle Ihre bisherigen Gesundheitsakten. Auf diese Weise werden Sie in der Lage, die beste Medizin und die beste Dosis von Kamagra kaufen Pillen zu bekommen. Sie sollten Kamagra nur nach der Einnahme eines Arztes bestellen. Grundsätzlich werden Sie die Kamagra kaufen Pillen von 50 mg-Dosis verschrieben werden. Dies ist eine sichere Dosis und dies wird von den meisten Menschen eingenommen. Ja, in der Regel Männer Körper an diese Dosis gewöhnen und daher ist dies als Startdosis vorgeschrieben. Wenn Sie noch vorsichtig sein wollen, dann können Sie mit der niedrigsten Dosis möglich starten. Sie können die Dosis erhöhen, wenn Sie denken, dass dies nicht funktioniert, wie es sein muss. Dies muss unter der Aufsicht des Arztes erfolgen. Sie sollten auch sicherstellen, dass die Medizin Kamagra kaufen Pillen für Sie geeignet sind.</p>

                <p>Dieser Punkt ist etwas, dass Sie eine Menge Aufmerksamkeit zahlen müssen. Bevor Sie Kamagra OnlineKamagraStore bestellen, sollten Sie eine Menge von Schritten zu sichern, auch nach der Einnahme der Medizin Kamagra kaufen Pillen. Ja, das ist Medizin, die Sie verwenden, um eine kritische Erkrankung in Ihrem Körper zu behandeln und wenn Sie vernachlässigen die Art und Weise sind Sie die Einnahme dieses Medikaments Kamagra kaufen Pillen, dann müssen Sie möglicherweise viel schwerer Probleme als auch Gesicht. So ist es immer gut, sicher zu bleiben und es in der richtigen Weise zu benutzen. Also, um sicherzustellen, dass es für Sie geeignet ist, bevor Sie Kamagra kaufen, sollten Sie sicherstellen, dass die Zutaten der Medizin sicher für Sie sind. Das heißt, wenn Sie allergisch auf alle Zutaten sind, dann sollten Sie den Arzt informieren oder wenn Sie bereits wissen, welche Sie sind allergisch, dann können Sie den Arzt darüber sagen. So wird der Arzt entscheiden, welche Medizin für Sie gut ist. Sie sollten die inaktiven Bestandteile dieses Arzneimittels überprüfen, bevor Sie Kamagra bestellen.</p>

                <p>Wenn Sie die Medizin nehmen, vertrauen Sie nicht auf Mythen wie die Einnahme von Alkohol kann die Dauer, für die die Erektion stehen kann. Aber das ist überhaupt nicht wahr. Sie sollten nur Wasser für die Einnahme von Kamagrakaufen Pillen. Sie sind bereits mit erektile Dysfunktion und Sie werden in der Lage, eine Erektion nur wegen dieser Medizin zu bekommen und daher Sie Kamagra kaufen. Ob Sie das Problem der erektile Dysfunktion haben oder nicht, sehen Sie keine Wirkung von Alkohol auf Ihre Erektion. Vielmehr wird es Sie schläfrig machen und für diejenigen, die Kamagra kaufen Pillen nehmen, werden Sie nicht sehen, die Wirkung der Medizin auf Ihren Körper.</p>

                <p>Zusammen mit diesen beiden Sachen, sollten Sie auch darauf achten, dass Sie nicht unter Kamagra kaufen Pillen, wenn Sie mit den Gesundheitsproblemen wie Herzprobleme, Nierenprobleme, Leberprobleme, Blutdruck, ob niedriger Blutdruck oder hoher Blutdruck, sollten Sie Vermeiden Kamagra kaufen Pillen. Es gibt viele Gründe dafür und einer der wichtigsten und wichtigen Gründe ist, werden Sie sehen, dass die Zutaten der beiden Medikamente reagieren und geben Ihnen einige schädliche Nebenwirkungen. Das ist der Grund, warum Sie mit dem Arzt über alle Arzneimittel sprechen sollten, die Sie verwenden, bevor Sie Kamagra kaufen online.</p>

                <p>ARBEITSWEISE</p>

                <p>Kamagra ist sehr nützlich und zeigt schon kurze Zeitnach Einnahme desMedikamentspositive Veränderungen im Körper. Kamagra Tabletten online kaufen ist simpel, es ist in Online-Shops verfügbar und online Experten stehen für Fragen bezüglichIhrer Gesundheitsprobleme zurVerfügung. Das bestellte Medikament wird innerhalb von wenigen Stunden zugestellt und Sie können gleich beginnen, zu überprüfenob Kamagra auch IhrSexualleben vrrbessern kann. Die Wirkung einer Kamagra Tablette mit Wasser geschluckt kannetwa 4 – 6 Stunden anhalten. Planen Sie die sexuelle Aktivität und nehmen Sie die Kamagra Tablette mindestens 40-60 Minuten vorher ein. Für bessere Ergebnisse sollte die Tablette nach dem Essen genommen werden. Sobald Sie die Tablette mit Wasser genommen haben, dauert es einige Zeit, bissie im Körper absorbiert wird. Die Wirkungbeginnt mit einem Gefühl von Stärkeund zunehmender Energie, derPenis wird stimuliert und empfindlich. Die Erektion stellt sich ganz natürlich ein und hält längere Zeit an. Der Benutzer genießt seine sexuelle Aktivität, weil er mit Hilfe des Medikaments seine Angst vor sexuellem Versagenüberwunden hat. Die Wirkung desMedikamentshält mehr als 4 Stundenan, in denen der Benutzer die lang vermisste Intimität genießen und sexuelle Befriedigung erlangen kann.</p>
            </div>
        </div>
    </div><!-- /#content -->

    <div class="row">
        <div class="banner-bottoms" style="margin-top:20px;">
            <img src="{{asset('/assets/client_new/fdooter_bottom.png')}}" alt="" srcset="">
        </div>
    </div>

</div>



@endsection

@section('scripts')

@endsection