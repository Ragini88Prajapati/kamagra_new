<html>

<meta name="viewport" content="width=device-width, initial-scale=1">

<body
    style='background-color: #fff;color: #505050;font-family: " Ubuntu", sans-serif; font-weight: 300; font-size: 16px; line-height: 1.8;'>
    <div id="wrapper">
        <header
            style="  width: 100%;height: 80px;overflow: hidden;position: fixed;top: 0;left: 0;z-index: 999;background-color: #ff6f61;-webkit-transition: height 0.6s;-moz-transition: height 0.6s;-ms-transition: height 0.6s;-o-transition: height 0.6s;transition: height 0.6s;">
            <div class="container clearfix  "
                style="  width: 100%;  padding-right: 15px;padding-left: 15px;margin-right: auto;    margin-left: auto;    max-width: 1140px;">
                <div class="row">
                    <div class="header-text" style="width: 80%;float:left">
                        <h1 id="logo"
                            style=" display: inline-block; height: 80px;line-height: 50px;font-size: 25px !important; color:white">
                            Always Healthy Pharma </h1>

                    </div>
                    <div class="placed-order" style="width: 20%;float:left">
                        <div class="shipped-item text-center">
                            <p style=" text-align: center; line-height: 40px;font-size: 20px;color:white;">Order Placed
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="customer-order-details"
            style="  width: 100%; height:auto; padding-right: 15px;padding-left: 15px;margin-right: auto;    margin-left: auto;    max-width: 1140px;  margin-top: 80px; background: white;padding: 45px 20px;">
            <div class="" style="width: 100%;margin:20px 0px">
                <div class="" style="width: 33.33%;float:left">
                    <div class="customer-name">
                        <h6 style="    font-size: 17px;padding: 0px;margin: 0px;">Hi
                            <b>{{ isset($order_data->user_detail->name) && !empty($order_data->user_detail->name) ? $order_data->user_detail->name : "" }}</b>
                        </h6>
                        <p
                            style="font-size: 14px;    font-family: 'Open Sans', sans-serif;line-height: 1.5em;font-size: 14px;color: #555;">
                            Thank you for your order.
                        </p>

                    </div>
                </div>

                <div class="" style="width: 33.33%;float:left">

                    <div class="delivery-address text-right">
                        <p
                            style="font-size: 14px;    font-family: 'Open Sans', sans-serif;line-height: 1.5em;    font-size: 14px;    color: #555;">
                            {{ isset($order_data->user_detail->floor) && !empty($order_data->user_detail->floor) ? $order_data->user_detail->floor : "" }}
                            Floor, <br>

                            {{ isset($order_data->user_detail->address) && !empty($order_data->user_detail->address) ? $order_data->user_detail->address : "" }}<br>
                            {{ isset($order_data->user_detail->city) && !empty($order_data->user_detail->city) ? $order_data->user_detail->city : "" }}
                            {{ isset($order_data->user_detail->pincode) && !empty($order_data->user_detail->pincode) ? $order_data->user_detail->pincode : "" }}
                        </p>

                    </div>
                </div>

                <div class="" style="width: 33.33%;float:left">

                    <div class="customer-order " style="text-align: right;">
                        <h6 style="text-align: right; font-size: 17px;padding: 0px;margin: 0px;">Order placed on
                            <b>{{ date('d-m-Y',  strtotime($order_data->created_at)) }}</b></h6>
                        <p
                            style="text-align: right; font-size:14px     font-family: 'Open Sans', sans-serif;line-height: 1.5em;font-size: 14px;color: #555;">
                            <b>Order
                                ID
                                {{ isset($order_data->auto_order_id) && !empty($order_data->auto_order_id) ? $order_data->auto_order_id : "" }}</b>
                        </p>


                    </div>
                </div>
            </div>



            <div class="" style="width: 100%;margin:40px 0px;float:left;">
                @if(isset($order_data->order_product) && is_object($order_data->order_product) &&
                $order_data->order_product->count()
                > 0)
                @foreach ($order_data->order_product as $value)


                <?php
                $image = isset($value->product->image) && !empty($value->product->image) ? $value->product->image : "";
                $image_path = isset($value->product->image_path) && !empty($value->product->image_path) ? $value->product->image_path : "";
                $whole_image_path = $image_path . $image;
                ?>
                <div style="display: block;
                content: '';
                clear: both;"></div>
                <div class="" style="width:40%;float:left ">
                    <div class="product-image">
                        <img style="max-width: 100%;height: 150px;"
                            src="{{ url('') }}{{ Storage::url($whole_image_path) }}">

                    </div>

                </div>


                <div class="" style="width:60%;float:left">
                    <div class="product-card-hover" style="width: 100%; display: inline-block;">


                        <div class="medicine-name">
                            <p
                                style="font-size: 14px;    font-family: 'Open Sans', sans-serif;line-height: 1.5em;font-size: 14px;color: #555;">
                                <b style="font-weight: bold;">
                                    {{ isset($value->product->name) && !empty($value->product->name) ? $value->product->name : "" }}
                                </b>
                            </p>
                        </div>



                        <div class="medicine-description">
                            <p
                                style="font-size: 14px;    font-family: 'Open Sans', sans-serif;line-height: 1.5em;font-size: 14px;color: #555;">
                                {{ isset($value->product->subtitle) && !empty($value->product->subtitle) ? $value->product->subtitle : "" }}
                            </p>
                        </div>


                        <div class="off-rate">
                            <p style="font-size: 14px;font-weight:bold">
                                ₹
                                <b>
                                    {{ isset($value->total_price) && !empty($value->total_price) ? $value->total_price : "" }}
                                </b>

                            </p>
                        </div>
                    </div>
                </div>
                <br>






                @endforeach
                @endif



                <div class="" style="width: 100%;float:right">

                    <div class="customer-slip-cart" style="width: 33.33%;float:right">
                        <div class="customer-slip">
                            <div class="">
                                <div class="" style="width: 50%; float:left">
                                    <div class="slip-mrp">
                                        <p style=" color: black;">
                                            Item(s) total</p>
                                    </div>
                                </div>
                                <div class="" style="width: 50%; float:left">
                                    <div class="slip-mrp text-right">

                                        <p style="color: black;">₹
                                            {{ isset($order_data->total_cart_amount) && !empty($order_data->total_cart_amount) ? $order_data->total_cart_amount : "" }}
                                        </p>

                                    </div>
                                </div>
                                <div class="" style="width: 50%; float:left">
                                    <div class="price-slip-discount-heading">
                                        <p>Shipping charges</p>
                                    </div>
                                </div>
                                <div class="" style="width: 50%; float:left">
                                    <div class="price-slip-discount-price text-right">
                                        <p>Free</p>
                                    </div>
                                </div>
                                <div class="" style="width: 50%; float:left">
                                    <div class="slip-mrp-paid-heading">
                                        <p style=" font-weight: 700;color: black;"> Shipment total</p>
                                    </div>
                                </div>
                                <div class="" style="width: 50%; float:left">
                                    <div class="slip-mrp-paid text-right">
                                        <p style=" font-weight: 700;color: black;">₹
                                            {{ isset($order_data->total_amount_paid) && !empty($order_data->total_amount_paid) ? $order_data->total_amount_paid : "" }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="" style="width: 100%;margin:20px 0px;float:left">
                <div class="" style="width: 33.33%;float:right;">
                    <div class="thanku-msg">
                        <p style="  font-weight: 700;">
                            Thank you for shopping with Always Healthy pharma</p>
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- /footer -->

    <!-- /#wrapper -->
</body>

</html>