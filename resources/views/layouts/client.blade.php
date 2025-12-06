<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Always Healthy Pharma</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/client/images/icons/icon_logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/css-plugins-call.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/css/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/css/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <style type="text/css">
        a.gflag {
            vertical-align: middle;
            font-size: 16px;
            padding: 1px 0;
            background-repeat: no-repeat;
            background-image: url(//gtranslate.net/flags/16.png);
        }

        a.gflag img {
            border: 0;
        }

        a.gflag:hover {
            background-image: url(//gtranslate.net/flags/16a.png);
        }

        #goog-gt-tt {
            display: none !important;
        }

        .goog-te-banner-frame {
            display: none !important;
        }

        .goog-te-menu-value:hover {
            text-decoration: none !important;
        }

        body {
            top: 0 !important;
        }

        #google_translate_element2 {
            display: none !important;
        }
    </style>

    @yield('head')
</head>

<body>
    @section('header')
    <div class="wrapper home-one">
        <header class="header-area">
            <div class="header-top-area">
                <div class="container-flex">
                    <div class="row hidden-xs styles__top-row___1GOEC language-row">
                        <div
                            class="col-6 col-md-3 col-lg-3 col-xl-3 offset-md-9 offset-lg-9 offset-xl-9 d-none d-md-block d-lg-block d-xl-block language-dropdown">
                            <select onchange="doGTranslate(this);">
                                <option value="">Select Language</option>
                                <option value="en|en">English</option>
                                <option value="en|hi">Hindi</option>
                                <option value="en|gu">Gujarati</option>
                                <option value="en|mr">Marathi</option>
                            </select>
                            <div id="google_translate_element2"></div>
                            <script type="text/javascript">
                                function googleTranslateElementInit2() {
                                    new google.translate.TranslateElement({
                                        pageLanguage: 'en',
                                        autoDisplay: false
                                    }, 'google_translate_element2');
                                }
                            </script>
                            <script type="text/javascript"
                                src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2">
                            </script>


                            <script type="text/javascript">
                                /* <![CDATA[ */
                                eval(function(p, a, c, k, e, r) {
                                    e = function(c) {
                                        return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
                                    };
                                    if (!''.replace(/^/, String)) {
                                        while (c--) r[e(c)] = k[c] || e(c);
                                        k = [function(e) {
                                            return r[e]
                                        }];
                                        e = function() {
                                            return '\\w+'
                                        };
                                        c = 1
                                    };
                                    while (c--)
                                        if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
                                    return p
                                }('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}', 43, 43, '||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'), 0, {}))
                                /* ]]> */
                            </script>

                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 styles__top-right-col___2VrGG">
                            <div class="row logo-header-row">
                                <div
                                    class="col-4 col-sm-6  col-md-3 col-lg-2 col-xl-2 company-logo default styles__company-logo___16bHp">
                                    <a href="{{ route('home.index') }}"
                                        class="styles__logo-link-new___2YHUJ styles__button-text___3JQsb">
                                        <img src="{{ asset('assets/client/images/logo-new.PNG') }}"
                                            alt="always healty pharma, best e pharmacy in India"
                                            title="always healty pharma, India's Largest Healthcare Platform">
                                    </a>
                                </div>
                                <div class="col-8 col-sm-6  col-md-9 col-lg-9 col-xl-9 ">
                                    <div class="logo-company-name">
                                        <a href="{{ route('home.index') }}"
                                            class="button-text web-left-nav">Medicines</a>

                                    </div>
                                </div>
                            </div>
                            <!-- <ul itemscope="" class="styles__list-navigation___3k1hk">
                                <li class="styles__active-tab___Upih6">
                                    <a href="{{ route('home.index') }}" class="button-text web-left-nav">Medicines</a>
                                </li>

                            </ul> -->
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 pad0 lang-profile">
                            <div class="user-signup">
                                <div class="row">
                                    <div class="col-7 col-sm-6  col-md-4 col-lg-5 col-xl-5 ">
                                        <div class="login-section">
                                            @if(Auth::check())
                                            <div class="menu-my-account-container">
                                                <a href="#" class="username-account"><i
                                                        class="first-icon fa fa-user-circle username-account"></i>
                                                    {{ Auth::user()->name }} <i class="ion-ios-arrow-down"></i></a>
                                                <ul>
                                                    <li><a href="javascript:void(0);">My Account</a></li>

                                                    <li><a href="{{ route('client.user.add_address') }}">Add Address</a>
                                                    </li>
                                                    <li><a href="{{ route('client.user.order_history') }}">Order
                                                            History</a>
                                                    </li>
                                                    <li><a href="{{ route('logout') }}">Logout</a></li>
                                                </ul>
                                            </div>
                                            @else
                                            <a href="{{ route('login') }}" class="">
                                                <span>Login</span></a>
                                            <span class="login-seprator"> | </span>
                                            <a class="styles__login-link___2PwqA" href="{{ route('home.signup') }}">
                                                <span>Sign Up</span>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-5 col-sm-6  col-md-4 col-lg-3 col-xl-3">
                                        <div class="cart-section">
                                            <div class="row">
                                                <div class="col-4 col-sm-4  col-md-4 col-lg-3 col-xl-3 pt-7">
                                                    <div class="cart-icon" id="cart-icon">

                                                    </div>
                                                </div>
                                                <div class="col-7 col-sm-7  col-md-7 col-lg-8 col-xl-8 pt-7">
                                                    <div class="cart-quantity numberCircle cart-total-quantity">
                                                        {{ isset($cart_total_quantity) && !empty($cart_total_quantity) ? $cart_total_quantity : 0 }}

                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>

                                    <div
                                        class="col-6 col-sm-6  col-md-4 col-lg-4 col-xl-4 d-none d-md-block d-lg-block d-xl-block">
                                        <div class="help-section">
                                            <a href="javascript:void(0);"
                                                class="t-need-help styles__need-help-link___jbEq-">
                                                <span>Need Help?</span>
                                            </a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row styles__bottom-row___1a89P styles__border-one___2wAfi">
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pad0 styles__location-search-div___XoEew">
                            <!-- <div class="col-5 col-sm-5  col-md-4  col-lg-3 col-xl-3 hidden-xs styles__location-container___1v8qv">
                                <div class="styles__container___2U-Bk">
                                    <div class="styles__city-locator___2uYRv"><span class="styles__locator-fa___3WHNG">
                                            <i class="fa fa-map-marker"></i></span>
                                        <select class="select-option styles__city-input___6e65P location-dropdown" class="" name="expertise" form="language">
                                            <option value="speakwrite">New Delhi</option>
                                            <option value="speak">Mumbai</option>
                                            <option value="write">Chennai</option>
                                            <option value="write">Kolkata</option>
                                        </select>
                                        <div class="header_locator_icon"></div>
                                        </span>
                                        <div class="styles__location-dropdown___CVd5J">
                                            <div class="LocationDropDown__city-dropdown-container___jMbLr">
                                                <div>
                                                    <ul>
                                                        <select class="select-option" name="expertise" form="language">
                                                            <option value="speakwrite">1 Bottle</option>
                                                            <option value="speak">2</option>
                                                            <option value="write">3</option>
                                                            <option value="write">4</option>
                                                        </select>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div
                                class="col-12 col-sm-12  col-md-7 col-lg-7 col-xl-7 offset-lg-1 offset-xl-1 searchbar-container styles__search-bar___e1Afp">
                                <div class="styles__search-bar___nwXaU">
                                    <form action="{{ route('product.product-list-filter') }}" method="GET"
                                        name="searchForm" class="styles__search-form___3JMjr">
                                        <input type="text" placeholder="Search for Medicines and Health Products"
                                            value="" autocomplete="off" name="search" data-auto-search-bar="true"
                                            class="styles__search-input___3I6VS"><span>
                                            <!-- <div class="header_search_icon">
                                            </div> -->
                                            <button type="submit" class="header_search_icon">
                                                <i class="fa fa-search" aria-hidden="true"></i>

                                            </button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                            <div
                                class="col-right col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-md-12 display_top menu-side">
                                <div class="main-menu">
                                    <nav>
                                        <ul>
                                            <?php
                                            $gender_list = App\Models\Client\Gender::where('status', 1)->whereIn('id', [1, 2])->get();
                                            // Men
                                            ?>
                                            <!--<li class="current"><a href="#">All Medicines <i-->
                                            <!--            class="fa fa-angle-down"></i></a>-->
                                            <!--    <ul class="submenu">-->
                                            <!--        @if(isset($gender_list) && is_object($gender_list))-->
                                            <!--        @foreach ($gender_list as $item)-->
                                            <!--        <li><a href="{{ route('product.product-list',['gender'=>$item->name]) }}">For-->
                                            <!--                {{ $item->name }}</a></li>-->
                                            <!--        @endforeach-->
                                            <!--        @endif-->
                                            <!--    </ul>-->
                                            <!--</li>-->
                                            <li class="current"><a
                                                    href="{{ route('product.product-list',['gender'=>'Men']) }}">All
                                                    Product</a>
                                            </li>
                                            <li class="current"><a href="{{ route('home.about_us') }}">About Us</a>
                                            </li>
                                            <li class="current"><a href="{{ route('home.contact_us') }}">Contact us </a>
                                            </li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom-area">
                <div class="container-flex">
                    <div class="row">

                        <div class="col-right col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-md-12 display_top">
                            <!-- main-menu -->
                            <div class="main-menu d-none">
                                <nav>
                                    <ul>
                                        <li class="current">
                                            <a href="{{ route('product.product-list',['gender'=>'Men']) }}">
                                                All Medicines
                                                {{-- <i class="fa fa-angle-down"></i> --}}
                                            </a>
                                            {{-- <ul class="submenu">
                                                <li><a href="javascript:void(0);">For Mens</a></li>
                                                <li><a href="javascript:void(0);">For Womens</a></li>
                                            </ul> --}}
                                        </li>
                                        <li class="current"><a href="#">Contact us </a>
                                        </li>

                                        <li class="current"><a href="#">About Us</a>

                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="mobile-menu-area">
                                <div class="mobile-menu">
                                    <nav id="mobile-menu-active">
                                        <ul class="menu-overflow">
                                            <li class="current">
                                                <a href="{{ route('product.product-list',['gender'=>'Men']) }}">
                                                    All Medicines
                                                    {{-- <i class="fa fa-angle-down"></i> --}}
                                                </a>
                                                {{-- <ul class="submenu">
                                                    <li><a href="javascript:void(0);">For Mens</a></li>
                                                    <li><a href="javascript:void(0);">For Womens</a></li>
                                                </ul> --}}
                                            </li>
                                            <li class="current"><a href="#">Contact us </a>

                                            </li>

                                            <li class="current"><a href="#">About Us</a>

                                            </li>


                                        </ul>
                                        </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    @show



    @yield('content')



    @section('footer')

    <div class="footer-main" style="background: #f6f6f6;padding-top:80px;padding-bottom:60px;">
        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-md-6 col-lg-6  col-xl-6 links footer_block">
                    <h3 class="hidden-sm-down">About Us</h3>
                    <div class="row">
                        <div class="col-6  col-sm-6 col-md-4 col-lg-3 col-xl-3 ">
                            <div class="about-card">
                                <div class="about-images">
                                    <img src="{{ asset('assets/client/images/about-images/ayush.png') }}" alt="">
                                </div>

                            </div>

                        </div>

                        <div class="col-6  col-sm-6 col-md-4 col-lg-3 col-xl-3 ">
                            <div class="about-card">
                                <div class="about-images">
                                    <img src="{{ asset('assets/client/images/about-images/export.png') }}" alt="">
                                </div>

                            </div>

                        </div>
                        <div class="col-6  col-sm-6 col-md-4 col-lg-3 col-xl-3 ">
                            <div class="about-card">
                                <div class="about-images">
                                    <img src="{{ asset('assets/client/images/about-images/quality.png') }}" alt="">
                                </div>


                            </div>

                        </div>
                        <div class="col-6  col-sm-6 col-md-4 col-lg-3 col-xl-3 ">
                            <div class="about-card">
                                <div class="about-images">
                                    <img src="{{ asset('assets/client/images/about-images/natural.png') }}" alt="">
                                </div>

                            </div>

                        </div>

                        <div class="col-6  col-sm-6 col-md-4 col-lg-3 col-xl-3 ">
                            <div class="about-card">
                                <div class="about-images">
                                    <img src="{{ asset('assets/client/images/about-images/gmp.png') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-6  col-sm-6 col-md-4 col-lg-3 col-xl-3 ">
                            <div class="about-card">
                                <div class="about-images">
                                    <img src="{{ asset('assets/client/images/about-images/iso.png') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-6  col-sm-6 col-md-4 col-lg-3 col-xl-3 ">
                            <div class="about-card">
                                <div class="about-images">
                                    <img src="{{ asset('assets/client/images/about-images/original.png') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-6  col-sm-6 col-md-4 col-lg-3 col-xl-3 ">
                            <div class="about-card">
                                <div class="about-images">
                                    <img src="{{ asset('assets/client/images/about-images/herbal.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="social_follow">
                        <ul>
                            <li class="facebook"><a href="#" target="_blank">Facebook</a></li>
                            <li class="twitter"><a href="#" target="_blank">Twitter</a></li>
                            <li class="youtube"><a href="#" target="_blank">YouTube</a></li>
                            <li class="googleplus"><a href="#" target="_blank">Google +</a></li>
                            <li class="instagram"><a href="#" target="_blank">Instagram</a></li>
                        </ul>
                    </div>

                </div>



                <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3 links footer_block">
                    <h3 class="hidden-sm-down">Our company</h3>
                    <ul class="footer_list">
                        <li><a href="#">Delivery</a></li>
                        <li><a href="#">Legal Notice</a></li>
                        <li><a href="{{ route('home.terms-and-refund-policy') }}">Terms and Refund Policy</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="{{ route('home.privacy-policy') }}">Privacy Policy</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>

                <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3 links footer_block">
                    <h3>Follow Us</h3>
                    <div class="footer-contact">
                        <p class="footer-logo-font">
                            <span><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                        </p>
                        <p class="address-content">

                            S-135 Haware Fantastic Business Park Sec-30 A, Vashi Navi Mumbai - 4000703</p>

                        <p class="footer-logo-font"><span><i class="fa fa-phone" aria-hidden="true"></i></span>
                        </p>
                        <p class="address-content">
                            +91 - 7039442999
                        </p>
                        <p class="footer-logo-font">
                            <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        </p>
                        <p class="address-content">
                            alwayshealthypharma@gmail.com</a></p>

                    </div>

                </div>
                <div
                    class="col-6 col-md-3 col-lg-3 col-xl-3 offset-md-9 offset-lg-9 offset-xl-9  mobile-language  language-dropdown">

                    <!-- GTranslate: https://gtranslate.io/ -->
                    <select onchange="doGTranslate(this);">
                        <option value="">Select Language</option>
                        <option value="en|en">English</option>
                        <option value="en|hi">Hindi</option>
                        <option value="en|gu">Gujarati</option>
                        <option value="en|mr">Marathi</option>
                    </select>
                    <div id="google_translate_element2"></div>

                </div>
            </div>
        </div>
    </div>

    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="copyright-inner">
                        <div class="row">

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
                                <p class="text-center">Copyright © 2020 Always Healthy Pharma . All Rights Reserved.
                                    Designed and Developed By <a href="http://zrow.in/">Zrow Solution</a></p>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade model-position " id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModal"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header  header-border-remove">
                    <!-- <h6 class="modal-title" id="myModalLabel">Sign Up</h6> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="modal-title text-center mb-3" id="myModalLabel">Sign Up</h6>

                    <form action="javascript:void(0);" method="POST">
                        @csrf
                        <div class="form-group remove-outline">

                            <input type="text" name="email" placeholder="Enter your email address..." id="input-email"
                                class="form-control border-input-remove">
                        </div>
                        <div class="form-group remove-outline">

                            <input type="text" name="password" placeholder="Password" id="input-password"
                                class="form-control border-input-remove">
                        </div>
                        <div class="login-btn">
                            <input type="submit" value="Continue" class="login-btn-submit">

                        </div>
                    </form>
                    <p class="lost-password text-center">
                        <a href="javascript:void(0);">Have an account?<span class="login-text-color"> Login</span>
                        </a>
                    </p>



                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>
    <div class="modal fade model-position" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header  header-border-remove">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="modal-title text-center mb-3" id="myModalLabel">Login</h6>

                    <form action="javascript:void(0);" method="post">
                        @csrf
                        <div class="form-group remove-outline">

                            <input type="text" name="email" placeholder="Enter your email address..." id="input-email"
                                class="form-control border-input-remove">
                        </div>
                        <div class="form-group remove-outline">

                            <input type="text" name="password" placeholder="Password" id="input-password"
                                class="form-control border-input-remove">
                        </div>
                        <div class="login-btn">
                            <input type="submit" value="Continue" class="login-btn-submit">
                        </div>
                    </form>
                    <p class="lost-password text-center"><a href="javascript:void(0);">Have an account?<span
                                class="login-text-color"> Login</span></a></p>

                </div>
            </div>
        </div>
    </div>
    @show
    <script src="{{ asset('assets/client/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery.nivo.slider.pack.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/client/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets/client/js/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
    <script>
        $('#cart-icon').on('click', function() {
            window.location.href = "{{ route('product.show-cart') }}";
        });
    </script>

    <?php
    $msg = '';
    if (request()->input('success_msg', '') != '') {
        $msg  = request()->input('success_msg', '');
    }

    if (request()->input('error_msg', '') != '') {
        $msg  = request()->input('error_msg', '');
    }
    ?>
    @if($msg != '')
    <script>
        alert("{{ $msg }}");
    </script>
    @endif

    @yield('scripts')

</body>

</html>