
<html>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/email.css">
<style>
    /* =Reset default browser CSS. Based on work by Eric Meyer: http://meyerweb.com/eric/tools/css/reset/index.html
-------------------------------------------------------------- */

    html,
    body,
    div,
    span,
    applet,
    object,
    iframe,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    blockquote,
    pre,
    a,
    abbr,
    acronym,
    address,
    big,
    cite,
    code,
    del,
    dfn,
    em,
    font,
    img,
    ins,
    kbd,
    q,
    s,
    samp,
    small,
    strike,
    strong,
    sub,
    sup,
    tt,
    var,
    b,
    u,
    i,
    center,
    dl,
    dt,
    dd,
    ol,
    ul,
    li,
    fieldset,
    form,
    label,
    legend,
    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td {
        background: transparent;
        border: 0;
        margin: 0;
        padding: 0;
        vertical-align: baseline;
    }

    body {
        line-height: 1;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        clear: both;
        font-weight: normal;
    }

    ol,
    ul {
        list-style: none;
    }

    blockquote {
        quotes: none;
    }

    blockquote:before,
    blockquote:after {
        content: '';
        content: none;
    }

    del {
        text-decoration: line-through;
    }

    /* tables still need 'cellspacing="0"' in the markup */

    table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    a img {
        border: none;
    }

    /* =Scss Variables
-------------------------------------------------------------- */

    /* =Global
-------------------------------------------------------------- */

    *,
    *:before,
    *:after {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        background-color: #f5f5f5;
        color: #505050;
        font-family: "Ubuntu", sans-serif;
        font-weight: 300;
        font-size: 16px;
        line-height: 1.8;
    }

    /* Headings */

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        line-height: 1;
        font-weight: 300;
    }

    a {
        text-decoration: none;
        color: #3cb5f9;
    }

    a:hover {
        color: #0793e2;
    }

    /* =Template
-------------------------------------------------------------- */

    #wrapper {
        width: 100%;
        margin: 0 auto;
    }

    #main {
        background-color: #fff;
        padding-top: 150px;
    }

    section {
        padding: 60px 0;
    }

    section h1 {
        font-weight: 700;
        margin-bottom: 10px;
    }

    section p {
        margin-bottom: 30px;
    }

    section p:last-child {
        margin-bottom: 0;
    }

    section.color {
        background-color: #3cb5f9;
        color: white;
    }

    /* =Info Bar
-------------------------------------------------------------- */

    #info-bar {
        background-color: #3cb5f9;
    }

    #info-bar a {
        color: white;
        font-size: 14px;
        text-transform: uppercase;
        display: inline-block;
        margin: 0;
        padding: 10px;
    }

    #info-bar a:hover {
        background-color: #0793e2;
    }

    #info-bar span.all-tutorials,
    #info-bar span.back-to-tutorial {
        display: block;
        width: 50%;
    }

    #info-bar span.all-tutorials {
        float: left;
        text-align: left;
    }

    #info-bar span.back-to-tutorial {
        float: right;
        text-align: right;
    }

    /* =Header
-------------------------------------------------------------- */

    header {
        width: 100%;
        height: 80px;
        overflow: hidden;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999;
        background-color: #ff6f61;
        -webkit-transition: height 0.6s;
        -moz-transition: height 0.6s;
        -ms-transition: height 0.6s;
        -o-transition: height 0.6s;
        transition: height 0.6s;
    }

    header h1#logo {
        display: inline-block;
        height: 80px;
        line-height: 80px;
        float: left;
        font-family: "Oswald", sans-serif;
        font-size: 32px;
        color: white;
        font-weight: 400;
        -webkit-transition: all 0.6s;
        -moz-transition: all 0.6s;
        -ms-transition: all 0.6s;
        -o-transition: all 0.6s;
        transition: all 0.6s;
    }

    header nav {
        display: inline-block;
        float: right;
    }

    header nav a {
        line-height: 80px;
        margin-left: 20px;
        color: #9fdbfc;
        font-weight: 700;
        font-size: 18px;
        -webkit-transition: all 0.6s;
        -moz-transition: all 0.6s;
        -ms-transition: all 0.6s;
        -o-transition: all 0.6s;
        transition: all 0.6s;
    }

    header nav a:hover {
        color: white;
    }

    header.smaller {
        height: 75px;
    }

    header.smaller h1#logo {
        width: 150px;
        height: 75px;
        line-height: 75px;
        font-size: 30px;
    }

    header.smaller nav a {
        line-height: 75px;
    }

    /* =Footer
-------------------------------------------------------------- */

    /* =Extras
-------------------------------------------------------------- */

    .clearfix:after {
        visibility: hidden;
        display: block;
        content: "";
        clear: both;
        height: 0;
    }

    /* =Media Queries
-------------------------------------------------------------- */

    .customer-order-details {
        margin-top: 80px;
        background: white;
        padding: 45px 20px;
    }

    .customer-name b {
        color: black;
        font-weight: 700;
    }

    .customer-order b {
        color: black;
        font-weight: 700;
        text-align: right;
        padding: 0px 10px;
    }

    .delivery-address-row {
        margin: 60px 0px;
    }

    .price-row {
        width: 100% !important;
        margin: 25px 0px;
    }

    .shipped-item p {
        text-align: center;
        line-height: 80px;
        font-size: 23px;
        color: white;
    }

    .slip-mrp-paid-heading p {
        font-weight: 700;
        color: black;
    }

    .slip-mrp-paid p {
        font-weight: 700;
        color: black;
    }

    .thanku-msg p {
        font-weight: 700;
        color: black;
    }

    @media screen and (max-width: 768px) {
        .customer-name {
            padding: 25px 0px;
        }

        .delivery-address {
            padding: 25px 0px;
            text-align: left !important;
        }

        .customer-order {
            padding: 25px 0px;
            text-align: left !important;
        }

        header h1#logo {
            display: inline-block;
            height: 80px;
            line-height: 80px;
            font-size: 17px !important;

        }

        .shipped-item p {
            text-align: center;
            line-height: 80px;
            font-size: 15px;
        }
    }
</style>

<body>
    <div id="wrapper">
        <header>
            <div class="container clearfix  ">
                <div class="row">
                    <div class="header-text" style="width: 80%;float:left">
                        <h1 id="logo"> Always Healthy Pharma xcc</h1>

                    </div>
                    <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="shipped-item text-center">
                            <p>Order Placed</p>

                        </div>


                    </div>

                </div>
            </div>
        </header>
        <div class="container  customer-order-details">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="customer-name">
                        <h6>Hi
                            <b>{{ isset($order_data->user_detail->name) && !empty($order_data->user_detail->name) ? $order_data->user_detail->name : "" }}</b>
                        </h6>
                        <p>
                            Thank you for your order.
                        </p>

                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">

                    <div class="delivery-address text-right">
                        <p>
                            {{ isset($order_data->user_detail->floor) && !empty($order_data->user_detail->floor) ? $order_data->user_detail->floor : "" }}
                            Floor, <br>

                            {{ isset($order_data->user_detail->address) && !empty($order_data->user_detail->address) ? $order_data->user_detail->address : "" }}<br>
                            {{ isset($order_data->user_detail->city) && !empty($order_data->user_detail->city) ? $order_data->user_detail->city : "" }}
                            {{ isset($order_data->user_detail->pincode) && !empty($order_data->user_detail->pincode) ? $order_data->user_detail->pincode : "" }}
                        </p>

                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">

                    <div class="customer-order text-right">
                        <h6>Order placed on <b>{{ date('d-m-Y',  strtotime($order_data->created_at)) }}</b></h6>
                        <p>Order
                            ID<b>{{ isset($order_data->auto_order_id) && !empty($order_data->auto_order_id) ? $order_data->auto_order_id : "" }}</b>
                        </p>


                    </div>
                </div>

            </div>

            <div class="row delivery-address-row">
                @if(isset($order_data->order_product) && is_object($order_data->order_product) &&
                $order_data->order_product->count()
                > 0)
                @foreach ($order_data->order_product as $value)
                <?php
                $image = isset($value->product->image) && !empty($value->product->image) ? $value->product->image : "";
                $image_path = isset($value->product->image_path) && !empty($value->product->image_path) ? $value->product->image_path : "";
                $whole_image_path = $image_path.$image;
                ?>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="product-image">
                        <img style="max-width: 100%;
                        height: 150px;" src="{{ Storage::url($whole_image_path) }}">

                    </div>

                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="product-card-hover" style="width: 100%; display: inline-block;">


                        <div class="medicine-name">
                            <p>
                                <b>
                                    {{ isset($value->product->name) && !empty($value->product->name) ? $value->product->name : "" }}
                                </b>
                            </p>

                        </div>
                        <div class="medicine-description">
                            <p>{{ isset($value->product->subtitle) && !empty($value->product->subtitle) ? $value->product->subtitle : "" }}
                            </p>

                        </div>
                        <div class="off-rate">
                            <p>₹

                                <b>{{ isset($value->total_price) && !empty($value->total_price) ? $value->total_price : "" }}
                                </b>

                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif


                <div class="row price-row">
                    <div
                        class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5 offset-md-6 offset-lg-7 offset-xl-7 text-right">
                        <div class="customer-slip-cart">
                            <div class="customer-slip">
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp">
                                            <p>
                                                Item(s) total</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp text-right">

                                            <p>₹ {{ isset($order_data->total_cart_amount) && !empty($order_data->total_cart_amount) ? $order_data->total_cart_amount : "" }}
                                            </p>

                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="price-slip-discount-heading">
                                            <p>Shipping charges</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="price-slip-discount-price text-right">
                                            <p>Free</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp-paid-heading">
                                            <p>Shipment total</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp-paid text-right">
                                            <p>₹ {{ isset($order_data->total_amount_paid) && !empty($order_data->total_amount_paid) ? $order_data->total_amount_paid : "" }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="thanku-msg">
                            <p>
                                Thank you for shopping with Always Healthy pharma</p>
                            </p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- /footer -->
    </div>
    <!-- /#wrapper -->
</body>

</html>