@extends('layouts.client')

@section('head')
<style>
    .product-history-description {
        padding: 16px;
        width: 100%;
        font-size: 14px;
        overflow: hidden;
        transition: box-shadow .1s linear;
        background-color: #fff;
        border: 1px solid #dbdbdb;
        position: relative;
        cursor: pointer;
        display: block;
        box-shadow: 0 0 0 0 rgba(0, 0, 0, .15);
        margin-bottom: 8px;
        border-radius: 4px;
    }

    .product-history-images {
        width: 70%;
        margin: auto;
        display: block;
        padding: 0px 0px;
    }

    .product-history-images img {
        width: 100%;
    }

    .history-product-total p {
        /* float: right; */
        margin-bottom: 0px;
        padding: 15px 0px;
        color: #ff6f61;
        font-weight: 600;
    }

    .order-history-row {
        align-items: center;
        /* flex-direction: column; */
        justify-content: center;
        height: 300px;
        display: flex;
    }

    @media screen and (max-width: 992px) {
        .order-history-row {
            height: auto !important;
            margin: 0px !important;
        }
    }
</style>
@endsection

@section('content')
<div class="product-history-main ">
    <div class="container">
        <div class="row">
            <div class="pt-5 pb-5 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                <h2>Order History</h2>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                @if(isset($order_data) && is_object($order_data) && $order_data->count() > 0)
                @foreach ($order_data as $item)

                @if(isset($item->order_product) && is_object($item->order_product) && $item->order_product->count() > 0)
                @foreach ($item->order_product as $value)
                <?php
                $image = isset($value->product->image) && !empty($value->product->image) ? $value->product->image : "";
                $image_path = isset($value->product->image_path) && !empty($value->product->image_path) ? $value->product->image_path : "";
                ?>

                <div class="row product-history-description order-history-row">

                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-3">
                        <a href="javascript:void(0);">
                            <div class="">

                                <div class="product-history-images">
                                    <img src="{{ Storage::url($image_path.$image) }}">
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                        <div class="mobile-whole-description">
                            <div class="mobile-model-history-name">
                                <p>{{ isset($value->product->name) && !empty($value->product->name) ? $value->product->name : "" }}
                                </p>

                            </div>
                            <div class="product-history-desc">
                                <p>{{ isset($value->subtitle) && !empty($value->subtitle) ? $value->subtitle : "" }}
                                </p>
                                <p>{{ isset($value->product->brand->name) && !empty($value->product->brand->name) ? $value->product->brand->name : "" }}
                                </p>
                            </div>

                        </div>

                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-3">
                        <div class="row">
                            <div class="col-4 col-sm-8 col-md-6 col-lg-4 col-xl-4">
                                <div class="product-quantity">
                                    <p>Quantity</p>
                                </div>
                            </div>
                            <div class="col-8 col-sm-8 col-md-6 col-lg-4 col-xl-4">
                                <div class="product-quantity">
                                    <p>{{ isset($value->quantity) && !empty($value->quantity) ? $value->quantity : "" }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 col-sm-4 col-md-6 col-lg-4 col-xl-4">
                                <div class="product-quantity">
                                    <p>Price</p>
                                </div>
                            </div>
                            <div class="col-8 col-sm-8 col-md-6 col-lg-4 col-xl-4">
                                <div class="product-quantity">
                                    <p>{{ isset($value->price) && !empty($value->price) ? $value->price : "" }}</p>
                                </div>
                            </div>





                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                        <div class="delevered-date">
                            <p>
                                <?php
                            if (isset($value->delivery_status->name) && !empty($value->delivery_status->name)) {
                                echo $value->delivery_status->name;
                            } else {
                                echo "Order Recieved";
                            }
                            ?>
                            </p>
                        </div>
                        <div class="product-policy">
                            <p>Product has no-return policy</p>
                        </div>
                        <div class="start-review-main">
                            <div class="review-row ">
                                <a class="FlPMmo">

                                    <span class="_3zvrLw col-3-5"> <b>Order Id-</b>
                                        {{ isset($item->auto_order_id) && !empty($item->auto_order_id) ? $item->auto_order_id : "" }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-12 col-xl-12">
                        <div class="history-product-total text-right">
                            <p>
                                Total Amount
                                <span>

                                    ₹
                                    {{ isset($value->total_price) && !empty($value->total_price) ? $value->total_price : "" }}

                                </span>
                            </p>
                        </div>
                    </div>

                </div>

                @endforeach
                @endif

                @endforeach
                @endif
            </div>
        </div>


    </div>
</div>
@endsection