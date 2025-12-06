<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/admin_panel/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- <link rel="stylesheet" href="/../assets/plugins/fontawesome-free/css/all.min.css"> -->
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('assets/admin_panel/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin_panel/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css" media="print">
        @page {
            size: auto;
            /* auto is the initial value */
            margin-top: 20px;
            /* this affects the margin in the printer settings */
            margin-left: 20px;
            margin-bottom: 5mm;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row" style="margin-bottom: 100px;">
                <div class="col-12">
                    <h2 class="page-header">
                        Always Healthy Pharma
                        <small class="float-right">Date:
                            {{  isset($order_data['created_at']) && !empty($order_data['created_at']) ? date('d-m-Y',strtotime($order_data['created_at'])) : "" }}</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Always Healthy Pharma</strong><br>
                        S-135 Haware Fantastic Business Park<br>
                        Sec-30 A, Vashi<br>
                        Navi Mumbai - 4000703
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>{{ isset($order_data->name) && !empty($order_data->name) ? $order_data->name : "" }}<br>

                            {{ isset($order_data['address']) && !empty($order_data['address']) ? $order_data['address'] : "" }}<br>
                            {{ isset($order_data['landmark']) && !empty($order_data['landmark']) ? $order_data['landmark'] : "" }}<br />
                            {{ isset($order_data->state->name) && !empty($order_data->state->name) ? $order_data->state->name : "" }}
                            -
                            {{ isset($order_data['pincode']) && !empty($order_data['pincode']) ? $order_data['pincode'] : "" }}<br>
                            Phone: +91
                            {{ isset($order_data['mobile_number']) && !empty($order_data['mobile_number']) ? $order_data['mobile_number'] : "" }}<br>
                            Email:
                            {{ isset($order_data['email']) && !empty($order_data['email']) ? $order_data['email'] : "" }}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    {{-- <b>Invoice #007612</b><br> --}}
                    <br>
                    <b>Order ID:</b> <br>
                    {{ isset($order_data->auto_order_id) && !empty($order_data->auto_order_id) ? $order_data->auto_order_id : "" }}<br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Selling price Per Piece</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($order_data->order_product) && is_object($order_data->order_product)
                            &&
                            count($order_data->order_product) > 0 )
                            @foreach ($order_data->order_product as $value)
                            <tr>
                                <td>{{ isset($value->product->name) && !empty($value->product->name) ? $value->product->name : "" }}
                                </td>
                                <td>{{ isset($value->price) && !empty($value->price) ? $value->price : "0" }}
                                </td>
                                <td>{{ isset($value->quantity) && !empty($value->quantity) ? $value->quantity : "0" }}
                                </td>
                                <td>{{ isset($value->total_price) && !empty($value->total_price) ? $value->total_price : "0" }}
                                </td>

                                {{-- <td>{{ isset($value['delivery_status_name']) && !empty($value['delivery_status_name']) ? $value['delivery_status_name'] : "" }}
                                </td> --}}


                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">

                </div>
                <!-- /.col -->
                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>{{ isset($order_data['total_cart_amount']) && !empty($order_data['total_cart_amount']) ? $order_data['total_cart_amount'] : "0" }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Shipping:</th>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>€{{ isset($order_data['total_amount_paid']) && !empty($order_data['total_amount_paid']) ? $order_data['total_amount_paid'] : "0" }}/-
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>