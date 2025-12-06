<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OKS | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/admin_panel/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin_panel/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets/admin_panel/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin_panel/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin_panel/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin_panel/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin_panel/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin_panel/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin_panel/plugins/summernote/summernote-bs4.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    @yield('head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> --}}
            </ul>
            {{-- <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> --}}
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index.php" class="brand-link">
                <img src="{{ asset('assets/admin_panel/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">OKS</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('assets/admin_panel/dist/img/user2-160x160.jpg') }}"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Super Admin</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.product.list') }}"
                                class="nav-link {{ Request::fullUrl('admin.product.list') == route('admin.product.list') ? 'active' : '' }}">
                                <i class="fa fa-medkit" aria-hidden="true"></i>
                                <p>
                                    Product
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        <!-- ragini -->
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.category.list') }}"
                                class="nav-link {{ Request::fullUrl('admin.category.list') == route('admin.category.list') ? 'active' : '' }}">
                                <i class="fa fa-medkit" aria-hidden="true"></i>
                                <p>
                                    Category
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.product-variant.list') }}"
                                class="nav-link {{ Request::fullUrl('admin.product-variant.list') == route('admin.product-variant.list') ? 'active' : '' }}">
                                <i class="fa fa-medkit" aria-hidden="true"></i>
                                <p>
                                    Product Variant
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>

                        {{-- <li class="nav-item has-treeview">
                            <a href="{{ route('admin.gender.list') }}"
                                class="nav-link  {{ Request::fullUrl('admin.gender.list') == route('admin.gender.list') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Collection
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.brand.list') }}"
                                class="nav-link  {{ Request::fullUrl('admin.brand.list') == route('admin.brand.list') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Brand
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li> --}}
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.banner.list') }}"
                                class="nav-link  {{ Request::fullUrl('admin.banner.list') == route('admin.banner.list') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Banner
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>

                        <!--<li class="nav-item has-treeview">-->
                        <!--    <a href="{{ route('admin.youtube_link.list') }}"-->
                        <!--        class="nav-link  {{ Request::fullUrl('admin.youtube_link.list') == route('admin.youtube_link.list') ? 'active' : '' }}">-->
                        <!--        <i class="fa fa-briefcase" aria-hidden="true"></i>-->
                        <!--        <p>-->
                        <!--            Youtube-->
                        <!--            <i class="fas fa-angle-left right"></i>-->
                        <!--        </p>-->
                        <!--    </a>-->
                        <!--</li>-->

                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.order.list') }}"
                                class="nav-link  {{ Request::fullUrl('admin.order.list') == route('admin.order.list') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Orders
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.blog.list') }}"
                                class="nav-link  {{ Request::fullUrl('admin.blog.list') == route('admin.blog.list') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Blogs
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.blog.reviewList') }}"
                                class="nav-link  {{ Request::fullUrl('admin.blog.reviewList') == route('admin.blog.reviewList') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Blog Reviews
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.testimonial.list') }}"
                                class="nav-link  {{ Request::fullUrl('admin.testimonial.list') == route('admin.testimonial.list') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Testimonial
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item has-treeview">
                            <a href="{{ route('admin.product_type.list') }}"
                                class="nav-link  {{ Request::fullUrl('admin.product_type.list') == route('admin.product_type.list') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Product Type
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li> --}}
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.user') }}"
                                class="nav-link  {{ Request::fullUrl('admin.user') == route('admin.user') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    User List
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.contactus') }}"
                                class="nav-link  {{ Request::fullUrl('admin.contactus') == route('admin.contactus') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Contact Us
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.newsletter') }}"
                                class="nav-link  {{ Request::fullUrl('admin.newsletter') == route('admin.newsletter') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Newsletter
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.static.view') }}"
                                class="nav-link  {{ Request::fullUrl('admin.static.view') == route('admin.static.view') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Advertisement
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.static.home-seo') }}"
                                class="nav-link  {{ Request::fullUrl('admin.static.home-seo') == route('admin.static.home-seo') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Homepage SEO
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.static.about-us') }}"
                                class="nav-link  {{ Request::fullUrl('admin.static.about-us') == route('admin.static.about-us') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    About us
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.static.free-shipping') }}"
                                class="nav-link  {{ Request::fullUrl('admin.static.free-shipping') == route('admin.static.free-shipping') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Free Shipping
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.static.satisfaction') }}"
                                class="nav-link  {{ Request::fullUrl('admin.static.satisfaction') == route('admin.static.satisfaction') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Satisfaction
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.static.shipping') }}"
                                class="nav-link  {{ Request::fullUrl('admin.static.shipping') == route('admin.static.shipping') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Shipping Information
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.static.glossary') }}"
                                class="nav-link  {{ Request::fullUrl('admin.static.glossary') == route('admin.static.glossary') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Kamagra Glossary
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.static.sexual') }}"
                                class="nav-link  {{ Request::fullUrl('admin.static.sexual') == route('admin.static.sexual') ? 'active' : '' }}">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p>
                                    Sexual Enhancer
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>


        @yield('content')




        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="{{ route('home.index') }}">OKS</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.2
            </div>
        </footer>
        <aside class="control-sidebar control-sidebar-dark">

        </aside>
    </div>


    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    <script src="{{ asset('assets/admin_panel/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/admin_panel/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    {{-- <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script> --}}
    <script src="{{ asset('assets/admin_panel/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin_panel/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin_panel/plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('assets/admin_panel/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/admin_panel/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('assets/admin_panel/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('assets/admin_panel/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin_panel/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script
        src="{{ asset('assets/admin_panel/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin_panel/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/admin_panel/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin_panel/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('assets/admin_panel/dist/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets/admin_panel/dist/js/demo.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    @yield('scripts')
</body>

</html>