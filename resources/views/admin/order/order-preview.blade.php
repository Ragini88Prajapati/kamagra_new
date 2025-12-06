@php
    use App\ProductVariant;
@endphp
@extends('layouts.admin')

@section('content')


<div class="content-wrapper" style="min-height: 1200.88px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order detail</h1>
                </div>
                <div class="col-sm-6">
                    {{-- <a class="btn btn-info float-sm-right" href="javascript:void(0)" id="addWarranty"> Add Warranty </a> --}}
                </div>
            </div>
        </div>
    </section>
    <section class="content">



        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    Online Kamagra Store
                                    <small class="float-right">Date:
                                        {{  isset($order_data['created_at']) && !empty($order_data['created_at']) ? date('d-m-Y',strtotime($order_data['created_at'])) : "" }}</small>
                                </h4>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>Online Kamagra Store</strong><br>
                                    {{-- S-135 Haware Fantastic Business Park<br>
                                    Sec-30 A, Vashi<br>
                                    Navi Mumbai - 4000703 --}}
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>{{ isset($order_data->shipping_firstname) && !empty($order_data->shipping_firstname) ? $order_data->shipping_firstname : "" }} {{ isset($order_data->shipping_lastname) && !empty($order_data->shipping_lastname) ? $order_data->shipping_lastname : "" }}<br>

                                        {{ isset($order_data['shipping_address']) && !empty($order_data['shipping_address']) ? $order_data['shipping_address'] : "" }}<br>
                                        {{ isset($order_data['shipping_address2']) && !empty($order_data['shipping_address2']) ? $order_data['shipping_address2'] : "" }}<br />
                                        {{ isset($order_data->state->name) && !empty($order_data->state->name) ? $order_data->state->name : "" }}
                                        -
                                        {{ isset($order_data['shipping_pincode']) && !empty($order_data['shipping_pincode']) ? $order_data['shipping_pincode'] : "" }}<br>
                                        Phone: +91
                                        {{ isset($order_data['shipping_mobile_number']) && !empty($order_data['shipping_mobile_number']) ? $order_data['shipping_mobile_number'] : "" }}<br>
                                        Email:
                                        {{ isset($order_data['shipping_email_id']) && !empty($order_data['shipping_email_id']) ? $order_data['shipping_email_id'] : "" }}
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                {{-- <b>Invoice #007612</b><br> --}}
                                <b style="white-space: nowrap;">Order ID:</b> {{ isset($order_data->auto_order_id) && !empty($order_data->auto_order_id) ? $order_data->auto_order_id : "" }}<br>
                                <b style="white-space: nowrap;">Account:</b> {{ isset($order_data->user->id) && !empty($order_data->user->id) ? $order_data->user->id : "" }}
                                <b style="white-space: nowrap;">Payment Method:</b> {{ isset($order_data->payment_method) && !empty($order_data->payment_method) ? $order_data->payment_method : "" }}
                                <b style="white-space: nowrap;">Txn Id:</b> {{ isset($order_data->bitcoin_transaction_id) && !empty($order_data->bitcoin_transaction_id) ? $order_data->bitcoin_transaction_id : "" }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Selling price Per Piece</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                            <th>Delivery Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($order_data->order_product) && is_object($order_data->order_product)
                                        &&
                                        count($order_data->order_product) > 0 )
                                        @foreach ($order_data->order_product as $value)
                                        @php
                                            $getVariant=ProductVariant::where('id',$value->variant_id)->first();
                                        @endphp
                                        <tr>
                                            <td>{{ isset($value->product->name) && !empty($value->product->name) ? $value->product->name : "" }}
                                            </td>
                                            <td>{{ isset($value->price) && !empty($value->price) ? $value->price : "0" }}
                                            </td>
                                            <td>
                                                {{-- {{ isset($value->quantity) && !empty($value->quantity) ? $value->quantity : "0" }} --}}
                                                {{isset($getVariant)?($getVariant->count*$value->quantity).' '.$getVariant->unit_type:$value->quantity}}
                                            </td>
                                            <td>{{ isset($value->total_price) && !empty($value->total_price) ? $value->total_price : "0" }}
                                            </td>
                                            <td>
                                                <select class="form-control deilvery-status-dropdown"
                                                    data-order-product="{{ $value->id }}">
                                                    @if(isset($delivery_data) && is_object($delivery_data) &&
                                                    count($delivery_data) > 0)
                                                    @foreach ($delivery_data as $delivery_value)
                                                    <option value="{{ $delivery_value->id }}"
                                                        {{ isset($value->delivery_status_id) && $value->delivery_status_id == $delivery_value->id ? 'SELECTED' : '' }}>
                                                        {{ $delivery_value->name }}</option>
                                                    @endforeach
                                                    @endif



                                                </select>
                                            </td>

                                            {{-- <td>{{ isset($value['delivery_status_name']) && !empty($value['delivery_status_name']) ? $value['delivery_status_name'] : "" }}
                                            </td> --}}


                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">

                            </div>
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
                        </div>



                        <div class="row no-print">
                            <div class="col-12">
                                <a href="{{ route('admin.order.order-invoice',['id' => $order_data->id]) }}"
                                    target="_blank" class="btn btn-default "><i class="fas fa-print"></i> Print</a>
                                {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                        Payment
                      </button>
                      <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generate PDF
                      </button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


</div>


@endsection


@section('scripts')

<script>
    $('.deilvery-status-dropdown').on("change",function(){
    var delivery_status = $(this).val();
    var orderProduct =  $(this).data('order-product');

    if((typeof(delivery_status)  ==  'undefined'  || delivery_status == 'undefined')
    && ( typeof(orderProductDetail) ==  'undefined'  || orderProductDetail == 'undefined')){
      alert('something went wrong please reload try again');
      return false;
    }else{
      $.ajax({
        url: "{{ route('admin.order.save_order_status') }}",
        type: 'POST',
        data: {
          delivery_status: delivery_status,
          order_product: orderProduct,
          _token:  '{{ csrf_token() }}'
        },
        success:function(data){
          alert('Order Product delivery status  updated successfully');
        },
        error:function(data){
          alert('something went wrong please reload try again');      
        }
      });
    }
});


</script>

@endsection