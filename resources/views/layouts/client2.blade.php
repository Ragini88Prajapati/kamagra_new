@php
use App\Models\Client\Product;

@endphp

<!doctype html>
<html class="no-js" lang="de">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!-- /Added by HTTrack -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('SEO_Part')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Webstrot">
    <link rel="alternate" href="https://www.onlinekamagrastore.com/" hreflang="en-in" />

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="https://onlinekamagrastore.com/assets/client2/images/new-latest-logo.png">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="https://onlinekamagrastore.com/assets/client2/images/new-latest-logo.png">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="https://onlinekamagrastore.com/assets/client2/images/new-latest-logo.png">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="https://onlinekamagrastore.com/assets/client2/images/new-latest-logo.png">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="https://onlinekamagrastore.com/assets/client2/images/new-latest-logo.png">

    <!-- ================= Google Fonts ================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet" type="text/css" />


    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Great+Vibes&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Great+Vibes&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/bootstrap.min.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/stylesheet1.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/menu_default.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/boss_megamenu.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/jquery.jgrowl.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/boss_alphabet.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/responsive.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/boss_facecomments.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/loading.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/cs.animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/boss_special.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/boss_filterproduct.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/custom2.12.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/revolutionslider_settings.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/resolution.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client2/css/bossblog.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sevillana&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--<meta name="description" content="kamagra bestellen bei onlinekamagrastore  günstigen und schnellen Lieferzeiten. Kamagra kaufen in Europa - Kamagra online bestellen und günstig kaufen.">-->
    <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
    <!-- <script src='../../../../google_analytics_auto.js'></script> -->
    @yield('css')
    <style>
        .error {
            color: red !important;
        }

        .btn.btn-gray,
        #cart>.btn,
        .jGrowl-button .buttons .btn,
        .compare-info .btn-wishlist,
        #cart .dropdown-menu .cart_bottom .buttons .btn {
            border-color: #7F447A !important;
            background: #7F447A !important;
        }

        .mega-menu>ul.nav>li>a {
            font-weight: bold !important;
            letter-spacing: 0.5px !important;

        }
    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FFEPCPXM1X"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-FFEPCPXM1X');
    </script>

</head>

<body class="bt-home-page">
    <!-- <div id="bt_loading">
        <div class="bt-loading">
            <div id="circularG">
                <div id="circularG_1" class="circularG"> </div>
                <div id="circularG_2" class="circularG"> </div>
                <div id="circularG_3" class="circularG"> </div>
                <div id="circularG_4" class="circularG"> </div>
                <div id="circularG_5" class="circularG"> </div>
                <div id="circularG_6" class="circularG"> </div>
                <div id="circularG_7" class="circularG"> </div>
                <div id="circularG_8" class="circularG"> </div>
            </div>
        </div>
    </div> -->
    <!-- /#bt_loading -->

    <div id="bt_container" class="bt-wide ">
        <div id="bt_header" class="">
            <div class="marque-row">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-12">
                            <div class="header-top-laguage-section">
                                <div class="top-lefts">
                                    <div id="right_top_links left-cards" class="nav ">
                                        <div class="bt-language">
                                            <form method="post" enctype="multipart/form-data" class="language">
                                                <div class="btn-group">
                                                    <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                                        <span>Sprache</span>
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#googtrans(en|en)" class="lang-select" data-lang="en"><span class="text-left">Englisch</span><span class="text-right"><img src="{{ asset('assets/client2/images/flags/gb.png')}}" alt="English" title="English" /></span></a>
                                                        </li>
                                                        <li><a href="#googtrans(en|de)" class="lang-select" data-lang="de"><span class="text-left">Deutsch</span><span class="text-right"><img src="{{ asset('assets/client2/images/german-flag.png')}}" alt="German" title="German" /></span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <input type="hidden" name="code" value="" />
                                                <input type="hidden" name="redirect" value="" />
                                            </form>
                                        </div>
                                        <!-- /.bt-language -->

                                        <!-- /.bt-currency -->



                                    </div>
                                    <div class="right-cards">
                                        <div class="">
                                            <ul>
                                                {{-- <li>
                                                        <a title="Visa" href="#" class="visa"><img alt="Visa"
                                                                src="{{asset('/assets/client2/images/visa.jpg')}}">
                                                </a>
                                                </li>
                                                <li>
                                                    <a title="MasterCard" href="#" class="masterCard"><img alt="MasterCard" src="{{asset('/assets/client2/images/master_card.jpg')}}" />
                                                    </a>
                                                </li>
                                                <li>
                                                    <a title="Paypal" href="#" class="paypal"><img alt="Paypal" src="{{asset('/assets/client2/images/paypal.jpg')}}">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a title="Merican" href="#" class="merican"><img alt="Merican" src="{{asset('/assets/client2/images/american.jpg')}}" />
                                                    </a>
                                                </li> --}}
                                                <li>
                                                    <a title="DHL" href="#" class="dhl"><img alt="DHL" src="{{asset('/assets/client2/images/dhl.jpg')}}">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a title="DHL" href="#" class="dhl"><img alt="DHL" src="{{asset('/assets/client2/images/bank_transfer.jpg')}}" style="
                                                                width: 38px;
                                                                object-fit: contain;
                                                            ">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="right-tops">
                                    <ul class="list-inline">

                                        @if(Auth::check())
                                        <li class="dropdown "><a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-user"></i></span><span class="name-accounts">{{Auth::user()->name}}</span><i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="{{route('client.user.address.list')}}"><span>Adressbuch</span><span><i class="fa fa-unlock-alt"></i></span></a>
                                                </li>
                                                <li><a href="{{route('logout')}}"><span>Ausloggen</span><span><i class="fa fa-user"></i></span></a>
                                                </li>
                                            </ul>
                                        </li>
                                        @else
                                        <li class="dropdown display-none-account"><a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-user"></i></span><span class="username">KONTO</span> </span><i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="{{route('home.signup')}}"><span>Registrieren</span><span><i class="fa fa-unlock-alt"></i></span></a>
                                                </li>
                                                <li><a href="{{route('login')}}"><span>Anmeldung</span><span><i class="fa fa-user"></i></span></a>
                                                </li>
                                            </ul>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <header class="d-none d-md-block">
                <div class="container">
                    <div class="row d-flex align-items-center mob-header-rowdblock">
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-4">
                            <div id="logo " class="desktop-logo">
                                <a href="{{route('home.index')}}" >
                                    <!-- <img src="images/logo.png" title="Drug Store" alt="Drug Store" class="img-responsive" />  -->
                                        <!-- <img src="{{asset('/assets/client2/images/new_logo.jpeg')}}"
                                        alt="OnlineKamagraStore" style="width: 100px;">       -->
                                        kamagrakaufenstore
                                </a>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
                            <div id="boss-search" class="fourteen columns omega">
                                <div class="choose-select">
                                    {{-- <div class="input_cat">
                                        <select name="filter_category_id" id="boss_filter_search">
                                            <option value="0" selected="selected">All Categories</option>
                                            <option value="34">Medicine &amp; Health</option>
                                            <option value="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personal Care
                                            </option>
                                            <option value="57">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                hair regrowth</option>
                                            <option value="26">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ear
                                                care</option>
                                            <option value="17">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foot
                                                care</option>
                                            <option value="18">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;oral
                                                care</option>
                                            <option value="33">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sun
                                                care</option>
                                            <option value="59">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;medicine</option>
                                            <option value="51">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;allergy
                                                &amp; sinus</option>
                                            <option value="52">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;eye
                                                care</option>
                                            <option value="53">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;first
                                                aid</option>
                                            <option value="50">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pharmacy
                                            </option>
                                            <option value="54">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sleep
                                                &amp; snoring aids</option>
                                            <option value="27">household</option>
                                            <option value="42">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; appliances</option>
                                            <option value="60">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;electronics</option>
                                            <option value="25">Beauty</option>
                                            <option value="46">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;bath &amp; spa
                                            </option>
                                            <option value="29">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cosmetics</option>
                                            <option value="66">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;fragrance
                                            </option>
                                            <option value="67">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hair
                                                care</option>
                                            <option value="68">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;skin
                                                care</option>
                                            <option value="28">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diet &amp; Fitness
                                            </option>
                                            <option value="65">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;nutritional
                                                bars</option>
                                            <option value="64">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sports
                                                nutrition</option>
                                            <option value="63">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;weight
                                                loss</option>
                                            <option value="62">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;yoga
                                                &amp; pilates</option>
                                            <option value="32">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;international beauty
                                            </option>
                                            <option value="45">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;natural &amp; organic
                                            </option>
                                            <option value="69">Baby Needs</option>
                                            <option value="71">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Children's Healthcare
                                            </option>
                                            <option value="70">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;vitamins</option>
                                            <option value="24">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; natural baby
                                            </option>
                                            <option value="72">Women's</option>
                                            <option value="31">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;feminine care
                                            </option>
                                            <option value="73">Vaccines</option>
                                        </select>
                                    </div> --}}
                                    <div class="search-form">
                                        <form action="{{route('product.product-list-filter')}}" method="get">
                                            <div id="search" class="input-group">
                                                <input type="text" name="search" value="" placeholder="Suche hier..." class="form-control input-lg" />
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 cart-column">
                            <div id="cart" class="btn-group btn-block cart-icons header-cartbtn <?php if ($cart_data['cart_total_price'] > 0) {
                                                                                                    echo 'product-found';
                                                                                                } ?>">
                                <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="btn btn-inverse btn-block btn-lg dropdown-toggle cart-mobile-view"><i class="fa fa-shopping-cart "></i> <span id="cart-total" class="cart-total">{{$cart_data['cart_total_quantity']}} Artikel -
                                        €{{$cart_data['cart_total_price']}}</span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    @if (isset($cart_data['cart_product_list']) &&
                                    !empty($cart_data['cart_product_list']))
                                    @foreach ($cart_data['cart_product_list'] as $item)
                                    @php
                                    $prod_data=Product::where('id',$item['product_id'])->first();
                                    @endphp
                                    <li>
                                        <table class="table table-striped">
                                            <tr>
                                                <td class="text-left image">
                                                    <div class="image">
                                                        <a href="product-detail.php"><img src="{{asset('/assets/images/product/').'/'.$prod_data->image}}" alt="{{$prod_data->name}}" title="{{$prod_data->name}}" class="img-thumbnail" />
                                                        </a>
                                                        <div class="remove delete-product" data-product="{{$item['id']}}">
                                                            <button type="button" title="Remove" class="btn-danger "><i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-left name">
                                                    <a href="product-detail.php">{{$prod_data->name}}</a>
                                                    {{-- <br /> - <small>Color Pink</small> --}}
                                                    <div class="color-red">{{$item['quantity']}} x <span class="price color-red">€{{$item['price']}}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                    @endforeach
                                    <li>
                                        <div class="cart_bottom">
                                            <table class="minicart_total">
                                                <tr>
                                                    <td class="text-left"><span class="color-red">Zwischensumme</span>
                                                    </td>
                                                    <td class="text-right color-red">€{{$cart_data['cart_total_price']}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left"><span class="color-red">Gesamt</span>
                                                    </td>
                                                    <td class="text-right color-red">€{{$cart_data['cart_total_price']}}
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="buttons">
                                                <span class="cart_bt"><a href="{{route('product.show-cart')}}" class="btn">Warenkorb ansehen</a></span>
                                                <span class="checkout_bt"><a class="btn btn-shopping" href="{{route('home.checkout_form')}}">Kasse</a></span>
                                            </div>
                                        </div>
                                    </li>
                                    @else
                                    Einkaufswagen ist leer!
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>


                    <!-- /#cart -->

                    <!-- /#boss-search -->
                </div>

            </header>


            <nav id="top" class="reviews-mobile">
                <div class="container">
                    <div class="row">
                        <div class="reviews-section">
                            <div class="rev-card">
                                <i class="fa-solid fa-check"></i><span>VOR 16:00 UHR BESTELLT, HEUTE VERSENDET!</span>
                            </div>
                            <div class="rev-card">
                                <i class="fa-solid fa-check"></i><span><b>KOSTENLOSE LIEFERUNG</b>BEI JEDER BESTELLUNG AB 75 €!</span>
                            </div>
                            <div class="rev-card">
                                <i class="fa-solid fa-check"></i><span>Mehr als 30 Produkte</span>
                            </div>
                            <div class="rev-card star-rating-section">
                                <span>9.8
                                </span>
                                <span>
                                    <img src="{{asset('/assets/client2/images/star.png')}}" alt="star" title="star">

                                    <img src="{{asset('/assets/client2/images/star.png')}}" alt="star" title="star">
                                    <img src="{{asset('/assets/client2/images/star.png')}}" alt="star" title="star">
                                    <img src="{{asset('/assets/client2/images/star.png')}}" alt="star" title="star">
                                    <img src="{{asset('/assets/client2/images/star.png')}}" alt="star" title="star">
                                </span>
                            </div>
                            <!-- <div class="rev-card">
                                <i class="fa-solid fa-check"></i><span>Ordered before 16:00, shipped today!</span>
                            </div> -->
                        </div>

                    </div>
                </div>
            </nav>
            <nav id="top" class="reviews-mobile">
                <div class="container">
                    <div class="row">
                        <div class="reviews-section">
                            <div class="rev-card">
                                <i class="fa-solid fa-house"></i><span>AB 75,00 € ERHALTEN SIE 1 COMIC-Strip als Geschenk</span>
                            </div>
                            <div class="rev-card">
                                <i class="fa-solid fa-house"></i><span>AB 100,00 € ERHALTEN SIE 2 STREIFEN ALS GESCHENK</span>
                            </div>
                            <div class="rev-card">
                                <i class="fa-solid fa-house"></i><span>AB 150,00 € ERHALTEN SIE 3 STREIFEN ALS GESCHENK
                                </span>
                            </div>
                            <div class="rev-card">
                                <i class="fa-solid fa-house"></i><span>AB 250,00 € ERHALTEN SIE 5 STREIFEN ALS GESCHENK</span>
                            </div>
                            <!-- <div class="rev-card">
                                <i class="fa-solid fa-check"></i><span>Ordered before 16:00, shipped today!</span>
                            </div> -->
                        </div>

                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="bt-content-menu" style="float: left; width: 100%; clear: both; height: 1px;"></div>
                </div>
            </div>

            <div class="bt-mobile">
                <div class="menu_mobile"> <a class="close-panel"><i class="fa fa-times-circle"></i></a>
                    <div class="bt-language">
                        <form method="post" enctype="multipart/form-data" class="language">
                            <div class="btn-group">
                                <button class="btn btn-link dropdown-toggle" data-toggle="dropdown"> <span><img src="{{asset('/assets/client2/images/flags/gb.png')}}" alt="English" title="English"></span>
                                    <span>en</span><i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#googtrans(en|de)" class="lang-select" data-lang="de"><span class="text-left">German</span><span class="text-right"><img src="{{ asset('assets/client2/images/german-flag.png')}}" alt="German" title="German" /></span></a>
                                    </li>
                                    <li><a href="#googtrans(en|en)" class="lang-select" data-lang="en"><span class="text-left">English</span><span class="text-right"><img src="{{ asset('assets/client2/images/flags/gb.png')}}" alt="English" title="English" /></span></a>
                                    </li>
                                </ul>
                            </div>
                            <input type="hidden" name="code" value="" />
                            <input type="hidden" name="redirect" value="" />
                        </form>
                    </div>
                    <!-- /.bt-language -->
                    <div class="bt-currency">
                        <form method="post" enctype="multipart/form-data" class="currency">
                            <div class="btn-group">
                                <button class="btn btn-link dropdown-toggle" data-toggle="dropdown"> <strong>$</strong>
                                    <span>USD</span> <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button class="currency-select btn btn-link" type="button" name="EUR"><span>Euro</span> <span>€</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button class="currency-select btn btn-link" type="button" name="GBP"><span>Pound Sterling</span> <span>£</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button class="currency-select btn btn-link" type="button" name="USD"><span>US
                                                Dollar</span> <span>$</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <input type="hidden" name="code" value="" />
                            <input type="hidden" name="redirect" value="" />
                        </form>
                    </div>
                    <!-- /.bt-currency -->
                    <div class="logged-link"> <a href="{{route('home.signup')}}"><i class="fa fa-sign-in"></i><span>Sign
                                In</span></a>
                        <a href="{{route('login')}}"><i class="fa fa-sign-in"></i><span>Log In</span></a>
                    </div>
                    <div class="menubar">
                        <div class="container">
                            <div class="bt_mainmenu">
                                <div class="row">
                                    <div class="nav-heading"> <a class="open-panel"><b>MENU</b><span><i class="fa fa-bars"></i></span></a> </div>
                                    <nav class="mega-menu"> <a class="close-panel"><i class="fa fa-times-circle"></i></a>
                                        <ul class="nav nav-pills">
                                            <li class="parent">
                                                <a href="{{route('home.index')}}"><span class="menu-title">Home
                                                        Page</span></a>

                                            </li>
                                            <li> <a href="{{route('home.user-profile')}}"><span class="menu-title">My
                                                        Account</span></a> </li>
                                            <li> <a href="{{route('home.partner')}}"><span class="menu-title">partner</span></a>
                                            </li>
                                            <li> <a href="{{route('home.about_us')}}"><span class="menu-title">About
                                                        us</span></a>
                                            </li>
                                            <li> <a href="{{route('home.contact_us')}}"><span class="menu-title">Contact</span></a>
                                            </li>
                                            <li class="parent">
                                                <p class="plus visible-xs">+</p> <a href="#"><span class="menu-title">Service</span><i class="fa fa-angle-down"></i></a>
                                                <div class="dropdown drop-grid-6-1">
                                                    <div class="menu-row row-col-1">
                                                        <div class="menu-column row-grid-1">
                                                            <!-- <a href="#" class="parent">Personal Care</a> -->
                                                            <ul class="column category">
                                                                <li class="col-grid-1 "> <a href="{{route('home.free-shipping')}}">Kostenloser
                                                                        Versand</a>
                                                                </li>
                                                                <li class="col-grid-1 "> <a href="{{route('home.satisfaction')}}">100%
                                                                        Zufriedenheit</a> </li>
                                                                <li class="col-grid-1 "> <a href="{{route('home.delivery-information')}}">Informationen
                                                                        zum Versand</a> </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li> <a href="{{route('home.kamagra-glossary')}}"><span class="menu-title">Kamagra Glossary</span></a>
                                            </li>
                                            <li> <a href="{{route('home.sexual-enhance')}}"><span class="menu-title">Potenzmittel</span></a>
                                            </li>

                                            <li> <a href="{{route('home.blog')}}"><span class="menu-title">bloggen</span></a>
                                            </li>


                                            {{-- <li> <a href="#"><span class="menu-title">Kamagra-Glossar</span></a> </li> --}}
                                            {{-- <li> <a href="#"><span class="menu-title">Potenzmittel</span></a> </li> --}}
                                            {{-- <li> <a href="#"><span class="menu-title">Blog</span></a> </li> --}}
                                        </ul>
                                    </nav>
                                    <!-- /.mega-menu -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.menubar -->
                </div>
            </div>

            <header class="d-block d-md-none mobile-header">
                <div class="container">
                    <div class="row d-flex align-items-center mob-header-rowdblock">
                        <div class="col-xs-7  col-sm-6 pdding-00">
                            <div id="logo " class="desktop-logo">
                                <a href="{{route('home.index')}}">
                                    <!-- <img src="images/logo.png" title="Drug Store" alt="Drug Store" class="img-responsive" /> -->
                                    {{-- <span>OKS</span> --}}
                                    <!-- <img src="{{asset('/assets/client2/images/new-latest-logo.png')}}"
                                        alt="OnlineKamagraStore" style="
                                    width: 80px;
                                "> -->
                                    <p>kamagrakaufenstore</p>

                                </a>
                            </div>

                        </div>

                        <div class="col-xs-3  col-sm-4 cart-column text-end-carts">
                            <div id="cart" class="btn-group btn-block cart-icons header-cartbtn ">
                                <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="btn btn-inverse btn-block btn-lg dropdown-toggle cart-mobile-view"><i class="fa fa-shopping-cart"></i>
                                    <span id="cart-total" class="cart-total">
                                        {{$cart_data['cart_total_quantity']}} Artikel -
                                        €{{$cart_data['cart_total_price']}}</span>
                                </button>
                                <ul class="dropdown-menu pull-right carts-latest">
                                    @if (isset($cart_data['cart_product_list']) &&
                                    !empty($cart_data['cart_product_list']))
                                    @foreach ($cart_data['cart_product_list'] as $item)
                                    @php
                                    $prod_data=Product::where('id',$item['product_id'])->first();
                                    @endphp
                                    <li>
                                        <table class="table table-striped">
                                            <tr>
                                                <td class="text-left image">
                                                    <div class="image">
                                                        <a href="product-detail.php"><img src="{{asset('/assets/images/product/').'/'.$prod_data->image}}" alt="{{$prod_data->name}}" title="{{$prod_data->name}}" class="img-thumbnail" />
                                                        </a>
                                                        <div class="remove delete-product" data-product="{{$item['id']}}">
                                                            <button type="button" title="Remove" class="btn-danger"><i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-left name">
                                                    <a href="product-detail.php">{{$prod_data->name}}</a>
                                                    {{-- <br /> - <small>Color Pink</small> --}}
                                                    <div class="color-red">{{$item['quantity']}} x <span class="price color-red">€{{$item['price']}}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                    @endforeach
                                    <li>
                                        <div class="cart_bottom">
                                            <table class="minicart_total">
                                                <tr>
                                                    <td class="text-left"><span class="color-red">Zwischensumme</span>
                                                    </td>
                                                    <td class="text-right color-red">€{{$cart_data['cart_total_price']}}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-left"><span class="color-red">Gesamt</span>
                                                    </td>
                                                    <td class="text-right color-red">€{{$cart_data['cart_total_price']}}
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="buttons">
                                                <span class="cart_bt"><a href="{{route('product.show-cart')}}" class="btn">Warenkorb ansehen</a></span>
                                                <span class="checkout_bt"><a class="btn btn-shopping" href="{{route('home.checkout_form')}}">Kasse</a></span>
                                            </div>
                                        </div>
                                    </li>
                                    @else
                                    Einkaufswagen ist leer!
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 pdding-00">
                            <div class="open-menu">
                                <a class="open-bt-mobile"><i class="fa fa-bars"></i></a>
                            </div>

                        </div>


                    </div>


                    <!-- /#cart -->

                    <!-- /#boss-search -->
                </div>

            </header>
            <!-- /.bt-mobile -->

            <div class="boss-new-position">
                <div class="boss_header header-bggreen">
                    <div class="container">
                        <div class="row">
                            <div class="menu">
                                <!-- Load menu -->
                                <div class="menubar">
                                    <div class="container">
                                        <div class="bt_mainmenu">
                                            <div class="row">
                                                <div class="nav-heading"> <a class="open-panel"><b>MENU</b><span><i class="fa fa-bars"></i></span></a> </div>
                                                <nav class="mega-menu menuhover-white"> <a class="close-panel"><i class="fa fa-times-circle"></i></a>
                                                    <ul class="nav nav-pills">
                                                        <li class="parent">
                                                            <a href="{{route('home.index')}}"><span class="menu-title">Startseite</span></a>

                                                        </li>
                                                        <li> <a href="{{route('home.user-profile')}}"><span class="menu-title">Mein Konto</span></a>
                                                        </li>
                                                        <li> <a href="{{route('home.partner')}}"><span class="menu-title">Partner</span></a>
                                                        </li>
                                                        <li> <a href="{{route('home.about_us')}}"><span class="menu-title">Über uns</span></a>
                                                        </li>
                                                        <!-- ragini -->

                                                        
                                                        <li class="parent">
                                                        <p class="plus visible-xs">+</p> <a href="#"><span class="menu-title">Category</span><i class="fa fa-angle-down"></i></a>
                                                        <div class="dropdown drop-grid-6-1">
                                                            <div class="menu-row row-col-1">
                                                                <div class="menu-column row-grid-1">
                                                                    <ul class="column category">
                                                                        @forelse ($categories as $category)
                                                                            <li class="col-grid-1 ">
                                                                                 <a class="title" href="{{ route('client2.category-product', $category->id) }}">{{ $category->name }}</a>
                                                                                <!-- <div class="nav_title">
                                                                                    <i class="" aria-hidden="true"></i>
                                                                                    <a class="title" href="{{ route('client2.category-product', $category->id) }}">{{ $category->name }}</a>
                                                                                </div> -->
                                                                            </li>
                                                                        @empty
                                                                            <li>
                                                                                <p>No categories found.</p>
                                                                            </li>
                                                                        @endforelse
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </li>
                                                         
                                                        

                        
                                                        <!-- <li> <a href="{{route('home.contact_us')}}"><span class="menu-title">Kontakt</span></a>
                                                        </li> -->
                                                        <li class="parent">
                                                            <p class="plus visible-xs">+</p> <a href="#"><span class="menu-title">Service</span><i class="fa fa-angle-down"></i></a>
                                                            <div class="dropdown drop-grid-6-1">
                                                                <div class="menu-row row-col-1">
                                                                    <div class="menu-column row-grid-1">
                                                                        <!-- <a href="#" class="parent">Personal Care</a> -->
                                                                        <ul class="column category">
                                                                            <li class="col-grid-1 "> <a href="{{route('home.free-shipping')}}">Kostenloser
                                                                                    Versand</a>
                                                                            </li>
                                                                            <li class="col-grid-1 "> <a href="{{route('home.satisfaction')}}">100%
                                                                                    Zufriedenheit</a> </li>
                                                                            <li class="col-grid-1 "> <a href="{{route('home.delivery-information')}}">Informationen
                                                                                    zum Versand</a> </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li> <a href="{{route('home.kamagra-glossary')}}"><span class="menu-title">Kamagra Glossary</span></a>
                                                        </li>
                                                        <li> <a href="{{route('home.sexual-enhance')}}"><span class="menu-title">Potenzmittel</span></a>
                                                        </li>
                                                        <!-- <li> <a href="{{route('home.blog')}}"><span class="menu-title">bloggen</span></a>
                                                        </li> -->


                                                        {{-- <li> <a href="#"><span
                                                                    class="menu-title">Kamagra-Glossar</span></a>
                                                        </li>
                                                        <li> <a href="#"><span
                                                                    class="menu-title">Potenzmittel</span></a>
                                                        </li>
                                                        <li> <a href="#"><span class="menu-title">Blog</span></a> </li> --}}
                                                    </ul>
                                                </nav>
                                                <!-- /.mega-menu -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.menubar -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.boss_header -->





                @yield('content')



                <div id="bt_footer" class="">
                    <footer>
                        <div class="bt-footer-middle">
                            <div class="container">
                                <div class="row footer-row-mobile">
                                    <div class="col-md-12">
                                        <div id="logo " class="desktop-logo">
                                            <a href="{{route('home.index')}}">
                                                <!-- <img src="images/logo.png" title="Drug Store" alt="Drug Store" class="img-responsive" /> -->
                                                <!--<span>OKS</span> -->
                                                <!-- <img src="{{asset('/assets/client2/images/new-latest-logo.png')}}"
                                                    alt="OnlineKamagraStore" style="width: 80px;"> -->
                                                kamagrakaufenstore
                                            </a>
                                        </div>
                                        <div class="col-sm-4 col-xs-12 col-lg-3">
                                            <!--Load modules in position footer middle-->
                                            <div class="bt-contact-me">
                                                <div class="box-heading">
                                                    <h3>SCHNELLER KONTAKT</h3>
                                                </div>
                                                <div class="box-content">
                                                    <form id="quick_contact" method="post" action="{{route('home.save_contactus')}}" class="frm_contact">
                                                        @csrf
                                                        <div class="input-name">
                                                            <input class="form-control " size="25" type="text" value="" placeholder="Dein Name" name="contact_name" id="contact_name" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue" required />
                                                        </div>
                                                        <div class="input-email">
                                                            <input class="form-control" size="25" type="text" value="" placeholder="Deine E-Mail" name="contact_mail" id="contact_mail" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue" required>
                                                        </div>
                                                        <div class="input-message">
                                                            <textarea class="form-control" name="contact_msg" placeholder="Deine Nachricht" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue" required></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary" id="b_button_contact" style="border-color: #7F447A!important;    background: #7F447A!important;">Senden</button>
                                                        <div id="contact_result"></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- /.col-sm-4 -->
                                        <div class="col-sm-4 col-xs-12 col-lg-3">
                                            <!--Load modules in position footer middle-->
                                            <div class="bt-contact-me">
                                                <div class="box-heading">
                                                    <h3>schnelle Links</h3>
                                                </div>
                                                <div class="box-content footer-quicklinks">
                                                    <ul>
                                                        <li class="parent">
                                                            <a href="{{route('home.index')}}"><span class="menu-title">Startseite</span></a>

                                                        </li>
                                                        <li> <a href="{{route('home.user-profile')}}"><span class="menu-title">Mein Konto</span></a>
                                                        </li>
                                                        <li> <a href="{{route('home.partner')}}"><span class="menu-title">Partner</span></a>
                                                        </li>
                                                        <li> <a href="{{route('home.about_us')}}"><span class="menu-title">Über uns</span></a>
                                                        </li>
                                                        <li> <a href="{{route('home.contact_us')}}"><span class="menu-title">Kontakt</span></a>
                                                        </li>
                                                        <li> <a href="{{route('home.kamagra-glossary')}}"><span class="menu-title">Kamagra Glossary</span></a>
                                                        </li>
                                                        <li> <a href="{{route('home.sexual-enhance')}}"><span class="menu-title">Potenzmittel</span></a>
                                                        </li>
                                                        <li> <a href="{{route('home.blog')}}"><span class="menu-title">bloggen</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- /.col-sm-4 -->
                                        <div class="col-sm-4 col-xs-12 col-lg-3">
                                            <!--Load modules in position footer newsletter-->
                                            <div class="bt-newsletter">
                                                <div class="footer-newsletter">
                                                    <div class="title">
                                                        <h3>NEWSLETTER ABONNIEREN</h3>
                                                        <p>Geben Sie Ihre E-Mail-Adresse ein und wir senden Ihnen einen
                                                            Gutschein mit 10 % Rabatt auf Ihre nächste Bestellung. Fügen
                                                            Sie hier Ihren Text hinzu</p>
                                                    </div>
                                                    <div>
                                                        <div class="newsletter-content">
                                                            <div id="frm_subscribe">
                                                                <form action="{{route('home.save_newsletter')}}" method="POST" enctype="multipart/form-data" id="newslettter_form">
                                                                    @csrf
                                                                    <table>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="boss-newsletter">
                                                                                    {{-- <form > --}}

                                                                                    <input class="form-control input-new" size="50" type="text" placeholder="Geben Sie hier Ihre E-Mail-Adresse ein" name="subscribe_email" id="subscribe_email" style="border-color: #7F447A!important;">
                                                                                    <button class="btn btn-new" type="submit" style="border-color: #7F447A!important;    background: #7F447A!important;"><i class="fa fa-paper-plane"></i></button>
                                                                                    {{-- </form> --}}
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        {{-- <tr style="display:none;">
                                                                            <td>
                                                                                <input class="form-control input-new" size="50"
                                                                                    type="text" value="Geben Sie hier Ihre E-Mail-Adresse ein"
                                                                                    name="subscribe_name" id="subscribe_name">
                                                                            </td>
                                                                        </tr> --}}
                                                                        <tr>
                                                                            <td id="subscribe_result"></td>
                                                                        </tr>
                                                                    </table>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.col-sm-4 -->
                                        <!-- <div class="footer-social col-xs-4">
                                            <h3>Follow us</h3>
                                            <ul>
                                                <li><a class="facebook" href="https://www.facebook.com/" title="Facebook"><i
                                                            class="fa fa-facebook"></i></a>
                                                </li>
                                                <li><a class="pinterest" href="https://www.pinterest.com/" title="Pinterest"><i
                                                            class="fa fa-pinterest"></i></a>
                                                </li>
                                                <li><a class="twitter" href="https://twitter.com/" title="Twiter"><i
                                                            class="fa fa-twitter"></i></a>
                                                </li>
                                                <li><a class="google" href="https://plus.google.com/" title="Google plus"><i
                                                            class="fa fa-google-plus"></i></a>
                                                </li>
                                                <li><a class="rss" href="https://www.rss.com/" title="RSS"><i class="fa fa-rss"></i></a>
                                                </li>
                                                <li><a class="youtube" href="https://www.youtube.com/" title="YouTube"><i
                                                            class="fa fa-youtube"></i></a>
                                                </li>
                                            </ul>
                                        </div>/.col-sm-4 -->
                                        <div class="footer-email col-xs-12 col-lg-3">
                                            <h3>SCHREIBEN SIE UNS EINE E-MAIL</h3>
                                            <p>
                                                <a href="mailto:support@onlinekamagrastore.com" class="w-100">support@onlinekamagrastore.com</a>
                                            </p>
                                            <a href="//www.dmca.com/Protection/Status.aspx?ID=58f44135-ceda-40d3-95bd-8c84e1d8798a" title="DMCA.com Protection Status" class="dmca-badge"> <img src="https://images.dmca.com/Badges/DMCA_badge_grn_60w.png?ID=58f44135-ceda-40d3-95bd-8c84e1d8798a" alt="DMCA.com Protection Status" /></a>
                                            <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.bt-footer-middle -->
                        <div class="bt-footer-bottom bggreen-footer">
                            <div class="container">
                                <div class="row">
                                    <div class="link">
                                        <ul class="list-unstyled">
                                            <li><a href="">KONTAKTIERE UNS</a></li>
                                            <li><a href="#">Seitenverzeichnis</a></li>
                                            <li><a href="#">Marken</a></li>
                                            <li><a href="#">Mitgliedsorganisationen</a></li>
                                            <li><a href="#">Sonderangebote</a></li>
                                            <li><a href="#">Newsletter</a></li>
                                        </ul>
                                    </div>
                                    <div class="powered-payment">
                                        <div class="row">
                                            <div class="powered col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div id="powered">
                                                    <p>© {{date('Y')}}kamagra kaufen store.
                                                    .
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="payment col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <ul>
                                                    {{-- <li>
                                                        <a title="Visa" href="#" class="visa"><img alt="Visa"
                                                                src="{{asset('/assets/client2/images/visa.jpg')}}">
                                                    </a>
                                                    </li>
                                                    <li>
                                                        <a title="MasterCard" href="#" class="masterCard"><img alt="MasterCard" src="{{asset('/assets/client2/images/master_card.jpg')}}" />
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a title="Paypal" href="#" class="paypal"><img alt="Paypal" src="{{asset('/assets/client2/images/paypal.jpg')}}">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a title="Merican" href="#" class="merican"><img alt="Merican" src="{{asset('/assets/client2/images/american.jpg')}}" />
                                                        </a>
                                                    </li> --}}
                                                    <li>
                                                        <a title="DHL" href="#" class="dhl"><img alt="DHL" src="{{asset('/assets/client2/images/dhl.jpg')}}">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a title="DHL" href="#" class="dhl"><img alt="DHL" src="{{asset('/assets/client2/images/bank_transfer.jpg')}}" style="
                                                                width: 38px;
                                                                object-fit: contain;
                                                            ">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- /.powered-payment -->
                                </div>
                            </div>
                        </div><!-- /.bt-footer-bottom -->
                    </footer>
                </div><!-- /#bt_footer -->
                <div id="back_top" class="back_top" title="Back To Top"><span><i class="fa fa-angle-up"></i></span>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/client2/js/jquery-2.1.1.min.js') }}"></script>
        <script src="{{ asset('assets/client2/js/additional-methods.js') }}"></script>
        <script src="{{ asset('assets/client2/js/jquery.validate.js') }}"></script>
        <script src="{{ asset('assets/client2/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/client2/js/getwidthbrowser.js') }}"></script>
        <script src="{{ asset('assets/client2/js/cs.bossthemes.js') }}"></script>
        <script src="{{ asset('assets/client2/js/jquery.jgrowl.js') }}"></script>
        <script src="{{ asset('assets/client2/js/jquery.appear.js') }}"></script>
        <script src="{{ asset('assets/client2/js/jquery.smoothscroll.js') }}"></script>
        <script src="{{ asset('assets/client2/js/carouFredSel-6.2.1.js') }}"></script>
        <script src="{{ asset('assets/client2/js/boss_filterproduct.js') }}"></script>
        <script src="{{ asset('assets/client2/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/client2/js/jquery.tools.min.js') }}"></script>
        <script src="{{ asset('assets/client2/js/jquery.revolution.min.js') }}"></script>
        <script src="{{ asset('assets/client2/js/jquery.selectbox-0.2.min.js') }}"></script>
        <script src="{{ asset('assets/client2/js/cloud-zoom.1.0.3.js') }}"></script>
        <script src="{{ asset('assets/client2/js/custom.js') }}"></script>
        <script src="{{ asset('assets/client2/js/jquery.fancybox.js') }}"></script>
        <!--Start of Tawk.to Script-->
        <!-- <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/620640439bd1f31184dc1f3f/1frk6m2u8';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script> -->
        <!--End of Tawk.to Script-->
        @yield('scripts')
        @if(session()->has('msg'))
        <script>
            alert('{{ session()->get("msg") }}')
        </script>
        @endif
        @if(Auth::check())
        <script>
            $(document).on('click', '.add-to-wishlist', function() {
                var product = $(this).data('product');
                $.ajax({
                    url: "{{ route('home.addToWishlist') }}",
                    type: "POST",
                    data: {
                        id: product,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        if (res == '1') {
                            alert("Product Added to wishlist")
                            window.location.reload();
                        }
                        if (res == '2') {
                            alert("Something went wrong")
                        }
                    }

                });
            });
        </script>
        @else
        <script>
            $(document).on('click', '.add-to-wishlist', function() {
                alert("Please Login");
            });
        </script>
        @endif

        @if(Auth::check())
        <script>
            $(document).on('click', '.remove-from-wishlist', function() {
                var product = $(this).data('product');
                $.ajax({
                    url: "{{ route('home.removeFromWishlist') }}",
                    type: "POST",
                    data: {
                        id: product,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        if (res == '1') {
                            alert("Product Removed from wishlist")
                            window.location.reload();
                        }
                        if (res == '2') {
                            alert("Something went wrong")
                        }
                    }

                });
            });
        </script>
        @endif
        <script>
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'de',
                    layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT
                }, 'google_translate_element');
            }

            function triggerHtmlEvent(element, eventName) {
                var event;
                if (document.createEvent) {
                    event = document.createEvent('HTMLEvents');
                    event.initEvent(eventName, true, true);
                    element.dispatchEvent(event);
                } else {
                    event = document.createEventObject();
                    event.eventType = eventName;
                    element.fireEvent('on' + event.eventType, event);
                }
            }
            $(document).ready(function() {
                $('.delete-product').on('click', function() {
                    var product = $(this).data('product');
                    $.ajax({
                        url: "{{ route('product.delete-from-cart') }}",
                        type: "POST",
                        data: {
                            product: product,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            window.location.reload();
                        },
                        error: function(data) {
                            window.location.reload();
                        }
                    });
                });
                // alert($('.goog-te-combo').val());
                $('.lang-select').click(function() {
                    var theLang = $(this).attr('data-lang');
                    $('.goog-te-combo').val(theLang);

                    window.location = $(this).attr('href');
                    location.reload();

                });
            });
        </script>
        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <script>
            $(document).ready(function() {

                $("#quick_contact").validate({
                    ignore: [],
                    rules: {

                        contact_name: {
                            required: true,
                        },
                        contact_mail: {
                            required: true,
                        },
                        contact_msg: {
                            required: true,
                        },

                    },
                    messages: {


                    }
                });
                $.validator.addMethod("pwcheck",
                    function(value, element) {
                        return /^[A-Za-z0-9]+$/.test(value);
                    });
                $("#newslettter_form").validate({
                    ignore: [],
                    rules: {
                        subscribe_email: {
                            required: true,
                        },
                    },
                    messages: {}
                });
                $.validator.addMethod("pwcheck",
                    function(value, element) {
                        return /^[A-Za-z0-9]+$/.test(value);
                    });
            });
        </script>
        <script>
            jQuery(document).ready(function() {
                /* bosszoomtoolbox */
                $.fn.CloudZoom.defaults = {
                    adjustX: 0,
                    adjustY: 0,
                    tint: '#FFF',
                    tintOpacity: 0.5,
                    softFocus: 0,
                    lensOpacity: 0.7,
                    zoomWidth: '450',
                    zoomHeight: '512',
                    position: 'inside',
                    showTitle: 0,
                    titleOpacity: 0.5,
                    smoothMove: '3'
                };
                $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();

                //pass the images to Fancybox           
                var gallerylist = [];
                gallerylist.push({
                    href: "images/product/p21-600x683.jpg",
                    title: "Cashmere cuff vintage Levi maxi"
                });
                gallerylist.push({
                    href: "images/product/p18-600x683.jpg",
                    title: "Cashmere cuff vintage Levi maxi"
                });
                gallerylist.push({
                    href: "images/product/p1-600x683.jpg",
                    title: "Cashmere cuff vintage Levi maxi"
                });
                gallerylist.push({
                    href: "images/product/p16-600x683.jpg",
                    title: "Cashmere cuff vintage Levi maxi"
                });
                gallerylist.push({
                    href: "images/product/p11-600x683.jpg",
                    title: "Cashmere cuff vintage Levi maxi"
                });
                gallerylist.push({
                    href: "images/product/p10-600x683.jpg",
                    title: "Cashmere cuff vintage Levi maxi"
                });
                $("#wrap").bind('click', function() {
                    $.fancybox.open(gallerylist);
                    return false;
                });

                $("#boss-image-additional li a").on('click', function() {
                    $("#boss_large").attr("href", this)
                });

                /* Color Option */
                $('.bt-image-option').on('click', function() {
                    $('.bt-image-option').each(function() {
                        $(this).removeClass('active');
                    });
                    $(this).addClass('active');
                });

                /* boss-image-additional slider */
                $('#boss-image-additional').carouFredSel({
                    auto: false,
                    responsive: true,
                    width: '100%',
                    prev: '#prev_image_additional',
                    next: '#next_image_additional',
                    swipe: {
                        onTouch: true
                    },
                    items: {
                        width: 120,
                        height: 'auto',
                        visible: {
                            min: 1,
                            max: 3
                        }
                    },
                    scroll: {
                        direction: 'left', //  The direction of the transition.
                        duration: 500, //  The duration of the transition.
                    }
                });

            });

            // function changeQty(increase) {
            //     var qty = parseInt($('.select_number').find("input").val());
            //     if (!isNaN(qty)) {
            //         qty = increase ? qty + 1 : (qty > 1 ? qty - 1 : 1);
            //         $('.select_number').find("input").val(qty);
            //     } else {
            //         $('.select_number').find("input").val(1);
            //     }
            // }

            function goToByScroll(id) {
                $('html,body').animate({
                    scrollTop: $("#" + id).offset().top
                }, 'slow');
            }
        </script>
        <script>
            jQuery(document).ready(function() {
                /* Related Product Slider */
                $('#product_related').carouFredSel({
                    auto: false,
                    responsive: true,
                    width: '100%',
                    prev: '#prev_related',
                    next: '#next_related',
                    swipe: {
                        onTouch: true
                    },
                    items: {
                        width: 370,
                        height: 470,
                        visible: {
                            min: 1,
                            max: 3
                        }
                    },
                    scroll: {
                        direction: 'left', //  The direction of the transition.
                        duration: 1000 //  The duration of the transition.
                    }
                });
                /* Related Article Slider */
                $('#article_related').carouFredSel({
                    auto: false,
                    responsive: true,
                    width: '100%',
                    prev: '#prev_art_related',
                    next: '#next_art_related',
                    swipe: {
                        onTouch: true
                    },
                    items: {
                        width: 272,
                        height: 'auto',
                        visible: {
                            min: 1,
                            max: 3
                        }
                    },
                    scroll: {
                        direction: 'left', //  The direction of the transition.
                        duration: 1000 //  The duration of the transition.
                    }
                });
            });
        </script>
        <script>
            jQuery(document).ready(function() {

                boss_quick_shop();
                dataAnimate();

                /* View Mode */
                // Product List
                $('#list-view').on('click', function() {
                    $('#content .product-layout').attr('class', 'product-layout product-list col-xs-12');
                    localStorage.setItem('display', 'list');
                });
                // Product Grid
                $('#grid-view').on('click', function() {
                    // What a shame bootstrap does not take into account dynamically loaded columns
                    cols = $('#column-right, #column-left').length;
                    if (cols == 2) {
                        $('#content .product-layout').attr('class',
                            'product-layout product-grid col-lg-6 col-md-6 col-sm-6 col-xs-12');
                    } else if (cols == 1) {
                        $('#content .product-layout').attr('class',
                            'product-layout product-grid col-lg-4 col-md-4 col-sm-4 col-xs-12');
                    } else {
                        $('#content .product-layout').attr('class',
                            'product-layout product-grid col-lg-3 col-md-3 col-sm-3 col-xs-12');
                    }
                    localStorage.setItem('display', 'grid');
                });
                if (localStorage.getItem('display') == 'list') {
                    $('#list-view').trigger('click');
                } else {
                    $('#grid-view').trigger('click');
                }
            });
            /* Modal Quick Shop */
            $('#myModal').on('shown.bs.modal', function(e) {
                $.fn.CloudZoom.defaults = {
                    adjustX: 0,
                    adjustY: 0,
                    tint: '#FFF',
                    tintOpacity: 0.5,
                    softFocus: 0,
                    lensOpacity: 0.7,
                    zoomWidth: '450',
                    zoomHeight: '552',
                    position: 'inside',
                    showTitle: 0,
                    titleOpacity: 0.5,
                    smoothMove: '3'
                };
                $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
            })
            /* Quick Shop */
            function boss_quick_shop() {
                $('.product-thumb').each(function(index, value) {
                    var _qsHref =
                        '<button class=\"btn-quickshop\" title =\"Quick Shop\" class=\"sft_quickshop_icon \" data-toggle=\"modal\" data-target=\"#myModal\">Quick Shop</button>';
                    $('.image', this).append(_qsHref);
                });
            }
        </script>
        <script>
            /* Today Deal */
            var myVar = setInterval(function() {
                Deal0()
            }, 1000);

            function Deal0() {
                var i = 0;
                var today = new Date();
                var dateStr = "0000-00-00";
                //alert(dateStr);
                if (dateStr != "0000-00-00") {
                    var date = dateStr.split("-");
                    var date_end = new Date(date[0], (date[1] - 1), date[2]);
                    var deal = new Date();
                    deal.setTime(date_end - today);
                    //alert(deal);
                    if (date_end >= today) {
                        var month = new Date(deal.getMonth(), deal.getMonth(), 0).getDate();
                        var d = deal.getDate() + (month * deal.getMonth());
                        var h = deal.getHours() + (d * 24);
                        var m = deal.getMinutes();
                        var s = deal.getSeconds();
                        h = checkTime(h);
                        m = checkTime(m);
                        s = checkTime(s);
                        $(".datetime00").html('<div class="sep"></div><div><span class="number">' + h +
                            '</span><span>Hours</span></div><div class="sep"></div><div><span class="number">' + m +
                            '</span><span>Mins</span></div><div class="sep"></div><div><span class="number">' + s +
                            '</span><span>Secs</span></div>');
                    }
                }
                var today = new Date();
                var dateStr = "2016-02-01";
                //alert(dateStr);
                if (dateStr != "0000-00-00") {
                    var date = dateStr.split("-");
                    var date_end = new Date(date[0], (date[1] - 1), date[2]);
                    var deal = new Date();
                    deal.setTime(date_end - today);
                    //alert(deal);
                    if (date_end >= today) {
                        var month = new Date(deal.getMonth(), deal.getMonth(), 0).getDate();
                        var d = deal.getDate() + (month * deal.getMonth());
                        var h = deal.getHours() + (d * 24);
                        var m = deal.getMinutes();
                        var s = deal.getSeconds();
                        h = checkTime(h);
                        m = checkTime(m);
                        s = checkTime(s);
                        $(".datetime01").html('<div class="sep"></div><div><span class="number">' + h +
                            '</span><span>Hours</span></div><div class="sep"></div><div><span class="number">' + m +
                            '</span><span>Mins</span></div><div class="sep"></div><div><span class="number">' + s +
                            '</span><span>Secs</span></div>');
                    }
                }
                var today = new Date();
                var dateStr = "0000-00-00";
                //alert(dateStr);
                if (dateStr != "0000-00-00") {
                    var date = dateStr.split("-");
                    var date_end = new Date(date[0], (date[1] - 1), date[2]);
                    var deal = new Date();
                    deal.setTime(date_end - today);
                    //alert(deal);
                    if (date_end >= today) {
                        var month = new Date(deal.getMonth(), deal.getMonth(), 0).getDate();
                        var d = deal.getDate() + (month * deal.getMonth());
                        var h = deal.getHours() + (d * 24);
                        var m = deal.getMinutes();
                        var s = deal.getSeconds();
                        h = checkTime(h);
                        m = checkTime(m);
                        s = checkTime(s);
                        $(".datetime02").html('<div class="sep"></div><div><span class="number">' + h +
                            '</span><span>Hours</span></div><div class="sep"></div><div><span class="number">' + m +
                            '</span><span>Mins</span></div><div class="sep"></div><div><span class="number">' + s +
                            '</span><span>Secs</span></div>');
                    }
                }
                var today = new Date();
                var dateStr = "0000-00-00";
                //alert(dateStr);
                if (dateStr != "0000-00-00") {
                    var date = dateStr.split("-");
                    var date_end = new Date(date[0], (date[1] - 1), date[2]);
                    var deal = new Date();
                    deal.setTime(date_end - today);
                    //alert(deal);
                    if (date_end >= today) {
                        var month = new Date(deal.getMonth(), deal.getMonth(), 0).getDate();
                        var d = deal.getDate() + (month * deal.getMonth());
                        var h = deal.getHours() + (d * 24);
                        var m = deal.getMinutes();
                        var s = deal.getSeconds();
                        h = checkTime(h);
                        m = checkTime(m);
                        s = checkTime(s);
                        $(".datetime03").html('<div class="sep"></div><div><span class="number">' + h +
                            '</span><span>Hours</span></div><div class="sep"></div><div><span class="number">' + m +
                            '</span><span>Mins</span></div><div class="sep"></div><div><span class="number">' + s +
                            '</span><span>Secs</span></div>');
                    }
                }
                var today = new Date();
                var dateStr = "0000-00-00";
                //alert(dateStr);
                if (dateStr != "0000-00-00") {
                    var date = dateStr.split("-");
                    var date_end = new Date(date[0], (date[1] - 1), date[2]);
                    var deal = new Date();
                    deal.setTime(date_end - today);
                    //alert(deal);
                    if (date_end >= today) {
                        var month = new Date(deal.getMonth(), deal.getMonth(), 0).getDate();
                        var d = deal.getDate() + (month * deal.getMonth());
                        var h = deal.getHours() + (d * 24);
                        var m = deal.getMinutes();
                        var s = deal.getSeconds();
                        h = checkTime(h);
                        m = checkTime(m);
                        s = checkTime(s);
                        $(".datetime04").html('<div class="sep"></div><div><span class="number">' + h +
                            '</span><span>Hours</span></div><div class="sep"></div><div><span class="number">' + m +
                            '</span><span>Mins</span></div><div class="sep"></div><div><span class="number">' + s +
                            '</span><span>Secs</span></div>');
                    }
                }
            }

            function checkTime(j) {
                if (j < 10) {
                    j = "0" + j;
                }
                return j;
            }

            jQuery(document).ready(function() {
                /* Main Slider */
                $('.tp-banner0').show().revolution({
                    dottedOverlay: "none",
                    delay: 5000,
                    startWithSlide: 0,
                    startwidth: 870,
                    startheight: 450,
                    hideThumbs: 10,
                    hideTimerBar: "on",
                    thumbWidth: 50,
                    thumbHeight: 50,
                    thumbAmount: 4,
                    navigationType: "none",
                    navigationArrows: "solo",
                    navigationStyle: "round",
                    touchenabled: "on",
                    onHoverStop: "on",
                    swipe_velocity: 0.7,
                    swipe_min_touches: 1,
                    swipe_max_touches: 1,
                    drag_block_vertical: false,
                    parallax: "mouse",
                    parallaxBgFreeze: "on",
                    parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],
                    keyboardNavigation: "off",
                    navigationHAlign: "center",
                    navigationVAlign: "bottom",
                    navigationHOffset: 0,
                    navigationVOffset: 20,
                    soloArrowLeftHalign: "left",
                    soloArrowLeftValign: "center",
                    soloArrowLeftHOffset: 50,
                    soloArrowLeftVOffset: 8,
                    soloArrowRightHalign: "right",
                    soloArrowRightValign: "center",
                    soloArrowRightHOffset: 50,
                    soloArrowRightVOffset: 8,
                    shadow: 0,
                    fullWidth: "on",
                    fullScreen: "off",
                    spinner: "spinner4",
                    stopLoop: "on",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    forceFullWidth: "off",
                    hideThumbsOnMobile: "off",
                    hideNavDelayOnMobile: 1500,
                    hideBulletsOnMobile: "off",
                    hideArrowsOnMobile: "off",
                    hideThumbsUnderResolution: 0,
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 500,
                    hideAllCaptionAtLilmit: 500,
                    videoJsPath: "rs-plugin/videojs/",
                    fullScreenOffsetContainer: ""
                });


                loadtopmenu();
                $("#boss-menu-category .boss_heading").on('click', function() {
                    $('#boss-menu-category').toggleClass('opencate');
                    loadtopmenu();
                });

                function loadtopmenu() {
                    var menuheight = $('#boss-menu-category .box-content').outerHeight();
                    var topcate = $('#boss-menu-category').offset().top;
                    $('#boss-menu-category .boss-menu-cate .nav_title').each(function(index, element) {
                        var liheight = $(this).outerHeight();
                        var subheight = $(this).next('.nav_submenu').outerHeight();
                        var topheight = $(this).offset().top - topcate - 55;
                    });
                }
                $('#boss-menu-category .b_menucategory_hidde,#boss-menu-category  .menu_loadmore_hidden').hide();
                $('#boss-menu-category .menu_loadmore').on('click', function() {
                    $('#boss-menu-category .b_menucategory_hidde').slideToggle("normal", function() {
                        $('#boss-menu-category .menu_loadmore').hide();
                        $('#boss-menu-category .menu_loadmore_hidden').show();
                    });
                });
                $('#boss-menu-category .menu_loadmore_hidden').on('click', function() {
                    $('#boss-menu-category .b_menucategory_hidde').slideToggle("normal", function() {
                        $('#boss-menu-category .menu_loadmore').show();
                        $('#boss-menu-category .menu_loadmore_hidden').hide();
                    });
                });


                /* Today Deal */
                setTimeout(function() {
                    $('#product_special_0').carouFredSel({
                        auto: {
                            play: false,
                            timeoutDuration: 4000,
                        },
                        responsive: true,
                        width: '100%',
                        height: 'variable',
                        prev: '#prev_special_0',
                        next: '#next_special_0',
                        swipe: {
                            onTouch: true
                        },
                        items: {
                            width: 230,
                            height: 'variable',
                            visible: {
                                min: 1,
                                max: 1,
                            }
                        },
                        scroll: {
                            direction: 'left', //  The direction of the transition.
                            duration: 1200, //  The duration of the transition.
                            items: 1,
                        },

                    });
                }, 200);

                /* Testimonial */
                $('#boss_testimonial_0').carouFredSel({
                    auto: {
                        play: false,
                        timeoutDuration: 4500,
                    },
                    responsive: true,
                    width: '100%',
                    height: 'variable',
                    prev: '#prev_testimonial_0',
                    next: '#next_testimonial_0',
                    swipe: {
                        onTouch: false
                    },
                    items: {
                        /*width: image_width,*/
                        height: 'variable',
                        visible: {
                            min: 1,
                            max: 1
                        }
                    },
                    scroll: {
                        direction: 'left', //  The direction of the transition.
                        duration: 1000 //  The duration of the transition.
                    },
                    onCreate: function() {
                        $(window).smartresize(function() {
                            $('#boss_testimonial_0 div.testimonial-item').css("height",
                                getMaxHeight(
                                    '#boss_testimonial_0 div.testimonial-item'));
                            $('#boss_testimonial_min_height_0 div.caroufredsel_wrapper').css(
                                "width",
                                '100%');
                            $('#boss_testimonial_min_height_0 div.caroufredsel_wrapper #boss_testimonial_0')
                                .css("width", '100%');
                        });
                    }
                });
                $('#boss_testimonial_0 div.testimonial-item').css("height", getMaxHeight(
                    '#boss_testimonial_0 div.testimonial-item'));
                $('#boss_testimonial_min_height_0 div.caroufredsel_wrapper').css("min-height", getMaxHeight(
                    '#boss_testimonial_0 div.testimonial-item'));

                /* Best Product */
                initCarousel(0, 0, 0, 1, 81);
                checkDevices(0);
                $("a.head_tabs0").on('click', function() {
                    if (getWidthBrowser() > 767) {
                        return false;
                    }
                    if (!$(this).parent().hasClass('active')) {
                        $(".head_tabs0").parent().removeClass("active");
                        var $src_tab = $(this).attr("data-src");
                        $($src_tab).parent().addClass("active");
                        $(".content_tabs0").hide();
                        var $selected_tab = $(this).attr("href");
                        $($selected_tab).fadeIn();
                    }
                    return false;
                });
                $(window).resize(function() {
                    checkDevices(0);
                });

                /* vaccines */
                if ($(window).width() > 768) {
                    var image_width = 268;
                    var per_row = 3;
                    if ($(window).width() <= 1023) {
                        per_row = 3;
                    }
                } else {
                    if ($(window).width() < 480) {
                        per_row = 1;
                    } else {
                        per_row = 2;
                    }
                    var image_width = 200;
                }
                $('#boss_featured_0').carouFredSel({
                    auto: false,
                    responsive: true,
                    width: '100%',
                    height: 'auto',
                    prev: '#prev_featured_0',
                    next: '#next_featured_0',
                    pagination: '#bt_pag_0',
                    swipe: {
                        onTouch: true
                    },
                    items: {
                        width: image_width,
                        height: 'auto',
                        visible: {
                            min: 1,
                            max: per_row,
                        }
                    },
                    scroll: {
                        direction: 'left', //  The direction of the transition.
                        duration: 1000 //  The duration of the transition.
                    },
                    onCreate: function() {
                        $(window).smartresize(function() {
                            if ($(window).width() > 768) {
                                var image_width = 268;
                                var per_row = 3;
                                if ($(window).width() <= 1023) {
                                    per_row = 3;
                                }
                            } else {
                                if ($(window).width() < 480) {
                                    per_row = 1;
                                } else {
                                    per_row = 2;
                                }
                                var image_width = 200;
                            }
                            $('#boss_featured_0').carouFredSel({
                                auto: false,
                                responsive: true,
                                width: '100%',
                                height: 'auto',
                                prev: '#prev_featured_0',
                                next: '#next_featured_0',
                                pagination: '#bt_pag_0',
                                swipe: {
                                    onTouch: true
                                },
                                items: {
                                    width: image_width,
                                    height: 'auto',
                                    visible: {
                                        min: 1,
                                        max: per_row,
                                    }
                                },
                                scroll: {
                                    direction: 'left', //  The direction of the transition.
                                    duration: 1000 //  The duration of the transition.
                                },
                            });
                            $('#bt_fea_pro_0 .box-content .caroufredsel_wrapper').css("height",
                                getMaxHeight('#boss_featured_0 section.bt-item') + 10);
                        });
                    },
                });
                $('#bt_fea_pro_0 .box-content .caroufredsel_wrapper').css("height", getMaxHeight(
                    '#boss_featured_0 section.bt-item') + 10);

                /* cosmetics */
                if ($(window).width() > 768) {
                    var image_width = 268;
                    var per_row = 3;
                    if ($(window).width() <= 1023) {
                        per_row = 3;
                    }
                } else {
                    if ($(window).width() < 480) {
                        per_row = 1;
                    } else {
                        per_row = 2;
                    }
                    var image_width = 200;
                }
                $('#boss_featured_1').carouFredSel({
                    auto: false,
                    responsive: true,
                    width: '100%',
                    height: 'auto',
                    prev: '#prev_featured_1',
                    next: '#next_featured_1',
                    pagination: '#bt_pag_1',
                    swipe: {
                        onTouch: true
                    },
                    items: {
                        width: image_width,
                        height: 'auto',
                        visible: {
                            min: 1,
                            max: per_row,
                        }
                    },
                    scroll: {
                        direction: 'left', //  The direction of the transition.
                        duration: 1000 //  The duration of the transition.
                    },
                    onCreate: function() {
                        $(window).smartresize(function() {
                            if ($(window).width() > 768) {
                                var image_width = 268;
                                var per_row = 3;
                                if ($(window).width() <= 1023) {
                                    per_row = 3;
                                }
                            } else {
                                if ($(window).width() < 480) {
                                    per_row = 1;
                                } else {
                                    per_row = 2;
                                }
                                var image_width = 200;
                            }
                            $('#boss_featured_1').carouFredSel({
                                auto: false,
                                responsive: true,
                                width: '100%',
                                height: 'auto',
                                prev: '#prev_featured_1',
                                next: '#next_featured_1',
                                pagination: '#bt_pag_1',
                                swipe: {
                                    onTouch: true
                                },
                                items: {
                                    width: image_width,
                                    height: 'auto',
                                    visible: {
                                        min: 1,
                                        max: per_row,
                                    }
                                },
                                scroll: {
                                    direction: 'left', //  The direction of the transition.
                                    duration: 1000 //  The duration of the transition.
                                },
                            });
                            $('#bt_fea_pro_1 .box-content .caroufredsel_wrapper').css("height",
                                getMaxHeight('#boss_featured_1 section.bt-item') + 10);
                        });
                    },
                });
                $('#bt_fea_pro_1 .box-content .caroufredsel_wrapper').css("height", getMaxHeight(
                    '#boss_featured_1 section.bt-item') + 10);

                /* vitamins */
                if ($(window).width() > 768) {
                    var image_width = 268;
                    var per_row = 3;
                    if ($(window).width() <= 1023) {
                        per_row = 3;
                    }
                } else {
                    if ($(window).width() < 480) {
                        per_row = 1;
                    } else {
                        per_row = 2;
                    }
                    var image_width = 200;
                }
                $('#boss_featured_2').carouFredSel({
                    auto: false,
                    responsive: true,
                    width: '100%',
                    height: 'auto',
                    prev: '#prev_featured_2',
                    next: '#next_featured_2',
                    pagination: '#bt_pag_2',
                    swipe: {
                        onTouch: true
                    },
                    items: {
                        width: image_width,
                        height: 'auto',
                        visible: {
                            min: 1,
                            max: per_row,
                        }
                    },
                    scroll: {
                        direction: 'left', //  The direction of the transition.
                        duration: 1000 //  The duration of the transition.
                    },
                    onCreate: function() {
                        $(window).smartresize(function() {
                            if ($(window).width() > 768) {
                                var image_width = 268;
                                var per_row = 3;
                                if ($(window).width() <= 1023) {
                                    per_row = 3;
                                }
                            } else {
                                if ($(window).width() < 480) {
                                    per_row = 1;
                                } else {
                                    per_row = 2;
                                }
                                var image_width = 200;
                            }
                            $('#boss_featured_2').carouFredSel({
                                auto: false,
                                responsive: true,
                                width: '100%',
                                height: 'auto',
                                prev: '#prev_featured_2',
                                next: '#next_featured_2',
                                pagination: '#bt_pag_2',
                                swipe: {
                                    onTouch: true
                                },
                                items: {
                                    width: image_width,
                                    height: 'auto',
                                    visible: {
                                        min: 1,
                                        max: per_row,
                                    }
                                },
                                scroll: {
                                    direction: 'left', //  The direction of the transition.
                                    duration: 1000 //  The duration of the transition.
                                },
                            });
                            $('#bt_fea_pro_2 .box-content .caroufredsel_wrapper').css("height",
                                getMaxHeight('#boss_featured_2 section.bt-item') + 10);
                        });
                    },
                });
                $('#bt_fea_pro_2 .box-content .caroufredsel_wrapper').css("height", getMaxHeight(
                    '#boss_featured_2 section.bt-item') + 10);

                /* Product */
                function loadslider($tabmodule) {
                    if ($(window).width() > 768) {
                        var image_width = 100;
                    } else {
                        var image_width = 300;
                    }
                    $('#boss_procate_' + $tabmodule).carouFredSel({
                        auto: false,
                        responsive: true,
                        width: '100%',
                        height: 'variable',
                        prev: '#bt_next_pro_' + $tabmodule,
                        next: '#bt_prev_pro_' + $tabmodule,
                        pagination: '#bt_pag_pro_' + $tabmodule,
                        swipe: {
                            onTouch: true
                        },
                        items: {
                            width: image_width,
                            height: 'variable',
                            visible: {
                                min: 1,
                                max: 1
                            }
                        },
                        scroll: {
                            direction: 'left', //  The direction of the transition.
                            duration: 1000 //  The duration of the transition.
                        }
                    });
                };

                boss_quick_shop();
            });

            /* Modal Quick Shop */
            $('#myModal').on('shown.bs.modal', function(e) {
                $.fn.CloudZoom.defaults = {
                    adjustX: 0,
                    adjustY: 0,
                    tint: '#FFF',
                    tintOpacity: 0.5,
                    softFocus: 0,
                    lensOpacity: 0.7,
                    zoomWidth: '450',
                    zoomHeight: '552',
                    position: 'inside',
                    showTitle: 0,
                    titleOpacity: 0.5,
                    smoothMove: '3'
                };
                $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
            })
            /* Quick Shop */
            // function boss_quick_shop() {
            //     $('.product-thumb').each(function(index, value) {
            //         var _qsHref = '<button class=\"btn-quickshop\" title =\"Quick Shop\" class=\"sft_quickshop_icon \" data-toggle=\"modal\" data-target=\"#myModal\">Quick Shop</button>';
            //         $('.image', this).append(_qsHref);
            //     });
            // }
        </script>
        <script>
            jQuery(document).ready(function() {

            });

            // function changeQty(position, increase) {
            //     var qty = parseInt($('#select-number' + position + '').val());
            //     if (!isNaN(qty)) {
            //         qty = increase ? qty + 1 : (qty - 1 > 1 ? qty - 1 : 1);
            //         $('#select-number' + position + '').val(qty);
            //     } else {
            //         $('#select-number' + position + '').val(1);
            //     }
            //     position = '';
            // }
        </script>
        <script>
            jQuery(document).ready(function() {
                $('[data-toggle="collapse"]').click(function() {
                    $('.panel-heading').removeClass('active')
                    $(this).parents('.panel-heading').addClass('active');
                })

                /* Billing Option */
                $('input[name=\'payment_address\']').on('change', function() {
                    if (this.value == 'new') {
                        $('#payment-existing').hide();
                        $('#payment-new').show();
                    } else {
                        $('#payment-existing').show();
                        $('#payment-new').hide();
                    }
                });

                /* Shipping Option */
                $('input[name=\'shipping_address\']').on('change', function() {
                    if (this.value == 'new') {
                        $('#shipping-existing').hide();
                        $('#shipping-new').show();
                    } else {
                        $('#shipping-existing').show();
                        $('#shipping-new').hide();
                    }
                });

                $('#button-confirm').on('click', function() {
                    location = 'checkout-success.html';
                });

                // $(".prod-item-bottomdiv .zoom-image").click(function() {
                //     $(".zoom-imgbig-div").addClass("show");
                //     $(".zoom-imgbig-div").removeClass("hide");
                // });
                // $(".close-icon").click(function() {
                //     $(".zoom-imgbig-div").removeClass("show");
                //     $(".zoom-imgbig-div").addClass("hide");

                // });
            });
        </script>

</body>

</html>