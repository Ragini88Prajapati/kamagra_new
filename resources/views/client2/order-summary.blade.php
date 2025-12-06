@php
use App\Models\Client\Product;
use App\ProductVariant;

@endphp
@extends('layouts.client2')

@section('content')

<div class="bt-breadcrumb">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i></a>
                </li>
                <li><a href="cart.php">Order Summary</a>
                </li>
            </ul>
        </div>
    </div>
</div><!-- /.bt-breadcrumb -->
<div class="order-summary-div">
    <div class="container">
        <div class="card">
            <div class="card-header"> My Orders / Tracking </div>
            <div class="card-body">
                <h6>Order ID: {{$order->auto_order_id}}</h6>
                {{-- <div class="card">
                    <div class="card-body card-grid-div">
                        <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                        <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i>
                            +1598675986 </div>
                        <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                        <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                    </div>
                </div> --}}
                {{-- <div class="track">
                    <div class="step active">
                        <span class="icon">
                            <i class="fa fa-check"></i>
                        </span>
                        <span class="text">Order confirmed</span>
                    </div>
                    <div class="step active">
                        <span class="icon"> <i class="fa fa-user"></i> </span>
                        <span class="text"> Picked by courier</span>
                    </div>
                    <div class="step">
                        <span class="icon">
                            <i class="fa fa-truck"></i>
                        </span>
                        <span class="text">
                            On the way
                        </span>
                    </div>
                    <div class="step">
                        <span class="icon">
                            <i class="fa fa-archive"></i>
                        </span>
                        <span class="text">Ready
                            for
                            pickup</span>
                    </div>
                </div> --}}
                <hr>
                <ul class="row">
                    @php
                        // dd($order_data);
                    @endphp
                    @forelse ($order_data as $item)
                    @php
                        $prod_variant=ProductVariant::where('id',$item->product_id)->first();
                        // dd($prod_variant);
                        $produ_data=Product::where('id',$prod_variant->product_id)->first();
                    @endphp
                    <li class="col-12">
                        <div class="product-orderdiv">
                            <div class="order-prodimg">
                                <img src="{{asset('/assets/images/product/').'/'.$produ_data->image}}"
                                    alt="{{$produ_data->name}}">
                            </div>
                            <div class="order-prodname">
                                {{$produ_data->name}}
                            </div>
                            <div class="order-prod-quantity">
                                <span>Qty</span>
                                {{$item->quantity}}
                                
                            </div>
                            <div class="order-prd-price">
                                €{{$item->total_price}}
                            </div>
                        </div>
                    </li>
                        
                    @empty
                        
                    @endforelse
                    {{-- <li class="col-12">
                        <div class="product-orderdiv">
                            <div class="order-prodimg">
                                <img src="http://127.0.0.1:8000/assets/images/product/16425144121-1-home-200x200.jpg"
                                    alt="">
                            </div>
                            <div class="order-prodname">
                                Cenforce 100mg
                            </div>
                            <div class="order-prod-quantity">
                                <span>Qty</span>
                                <input type="number" name="" id="" value="1">
                            </div>
                            <div class="order-prd-price">
                                $3750
                            </div>
                        </div>
                    </li> --}}

                </ul>
                <hr> <a href="{{route('client.user.order_history')}}" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to
                    orders</a>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')

@endsection