@extends('layouts.client')

@section('content')
<?php
function security_encrypt($string, $action = 'e')
{
   $secret_key = 'my_simple_secret_key';
   $secret_iv = 'my_simple_secret_iv';

   $output = false;
   $encrypt_method = "AES-256-CBC";
   $key = hash('sha256', $secret_key);
   $iv = substr(hash('sha256', $secret_iv), 0, 16);

   if ($action == 'e') {
      $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
   } else if ($action == 'd') {
      $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
   }
   return $output;
}

?>
<div class="categories-tab" style="background: #f8f8f8">
    <div class="container ">
        <div class="row card-cart-row-padding">
            <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-7">
                <div class="your-order  bg-white">
                    <h5>{{ isset($user_detail_data->name) && !empty($user_detail_data->name) ? ucfirst($user_detail_data->name) : "" }}
                    </h5>
                    <div class="your-order-table table-responsive">
                        <table>
                            <tbody>
                                <tr class="cart_item">
                                    <td class="product-name">
                                        Floor
                                    </td>
                                    <td class="product-total">
                                        <span
                                            class="amount">{{ isset($user_detail_data->floor) && !empty($user_detail_data->floor) ? $user_detail_data->floor : "" }}
                                            floor</span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">
                                        Address
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">
                                            {{ isset($user_detail_data->address) && !empty($user_detail_data->address) ? $user_detail_data->address : "" }}<br>
                                            {{ isset($user_detail_data->city) && !empty($user_detail_data->city) ? $user_detail_data->city : "" }}
                                            {{ isset($user_detail_data->pincode) && !empty($user_detail_data->pincode) ? $user_detail_data->pincode : "" }}
                                        </span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">
                                        Landmark
                                    </td>
                                    <td class="product-total">
                                        <span
                                            class="amount">{{ isset($user_detail_data->landmark) && !empty($user_detail_data->landmark) ? $user_detail_data->landmark : "" }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <form action="{{  route('checkout') }}" class="d-none" method="post">
                                @csrf
                                <input type="hidden" name="delivered_address"
                                    value="{{ security_encrypt($user_detail_data->id) }}">
                                <input type="submit" value="Confirm Address"
                                    class="btn btn-size-md sign-btn ">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12   col-md-6 col-lg-5 col-xl-5">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="customer-slip-cart">
                            <div class="customer-slip">
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp">
                                            <p>MRP Total</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp text-right">
                                            <p>₹ {{ $totalprice }}</p>

                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="price-slip-discount-heading">
                                            <p>Price Discount</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="price-slip-discount-price text-right">
                                            <p>- ₹ 0</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp">
                                            <p>Shipping Charges</p>

                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp text-right">
                                            <p>As per delivery address</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp-paid-heading">
                                            <p>To be paid</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="slip-mrp-paid text-right">
                                            <p>₹{{ $totalprice }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="slip-mrp-footer">
                                        <p>Total Savings <span>₹0</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="delivery-card-location">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="cutomer-delivery-location-heading">
                                        <p>
                                            Your delivery location
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="cutomer-delivery-location-location text-right">
                                        {{-- <p>
                                            <i class="fa fa-map-marker"></i><span>New Delhi</span>
                                        </p> --}}
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="cart-addto-btn">
                                        <form action="{{ route('process-payment') }}" method="POST">
                                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                data-key="<?php echo $request_json['key_id']?>"
                                                data-amount="<?php echo isset($request_json['amount']) && !empty($request_json['amount']) ? $request_json['amount'] : "";;?>"
                                                data-currency="INR"
                                                data-name="<?php echo isset($request_json['name']) && !empty($request_json['name']) ? $request_json['name'] : "";?>"
                                                data-image="<?php echo isset($request_json['image']) && !empty($request_json['image']) ? $request_json['image'] : "";;?>"
                                                data-description="<?php echo isset($request_json['description']) && !empty($request_json['description']) ? $request_json['description'] : "";; ?>"
                                                data-prefill.name="<?php echo isset($request_json['prefill']['name']) && !empty($request_json['prefill']['name']) ? $request_json['prefill']['name'] : "";?>"
                                                data-prefill.email="<?php echo isset($request_json['prefill']['email']) && !empty($request_json['prefill']['email']) ? $request_json['prefill']['email'] : "";?>"
                                                data-prefill.contact="<?php echo $request_json['prefill']['contact'];?>"
                                                data-notes.shopping_order_id="<?php echo isset( $request_json['shopping_order_id']) && !empty( $request_json['shopping_order_id']) ?  $request_json['shopping_order_id'] : "";?>"
                                                data-order_id="<?php echo isset($request_json['order_id']) && !empty($request_json['order_id']) ? $request_json['order_id'] : "";;  ?>"
                                                <?php if ($displayCurrency !== 'INR') { ?>
                                                data-display_amount="<?php echo $request_json['display_amount']?>"
                                                <?php } ?> <?php if ($displayCurrency !== 'INR') { ?>
                                                data-display_currency="<?php echo $request_json['display_currency']?>"
                                                <?php } ?>>
                                            </script>
                                            <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                                            <input type="hidden" name="shopping_order_id" value="3456">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>

@endsection