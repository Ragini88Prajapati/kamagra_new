@extends('layouts.admin')

@section('head')
<link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
@endsection

@section('content')

<div class="content-wrapper" style="min-height: 234px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-none">
                        <h3 class="card-title">Order</h3>
                    </div>
                    <div class="card-body">
                        {{-- <a href="{{ route('admin.order.add') }}" class="btn bg-gradient-primary
                        float-right">Add</a> --}}
                        <table id="order-list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Total Amount</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // dd($order_list);
                                    
                                @endphp
                                @if(isset($order_list) && is_object($order_list))
                                @foreach($order_list as $value)
                                <tr>
                                    <td>
                                        {{ isset($value->auto_order_id) &&  !empty($value->auto_order_id) ? $value->auto_order_id  :  '' }}
                                    </td>
                                    <td>
                                        {{ isset($value->user->name) &&  !empty($value->user->name) ? $value->user->name  :  '' }}
                                    </td>
                                    <td>{{ isset($value->shipping_email_id) &&  !empty($value->shipping_email_id) ? $value->shipping_email_id  :  '' }}
                                    </td>
                                    <td>
                                        {{ isset($value->shipping_mobile_number) &&  !empty($value->shipping_mobile_number) ? $value->shipping_mobile_number  :  '' }}
                                    </td>
                                    <td>
                                        {{ isset($value->total_amount_paid) && !empty($value->total_amount_paid) ? $value->total_amount_paid : "" }}
                                    </td>
                                    <th>{{ isset($value->created_at) && !empty($value->created_at) ? $value->created_at : "" }}
                                    </th>
                                    <td>
                                        <a href="{{ route('admin.order.preview',['id'=>$value->id]) }}" title="edit">
                                            <i class="fa fa-id-card" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
    $('#order-list').DataTable( {
  "ordering": false
} );
} );
</script>
@endsection