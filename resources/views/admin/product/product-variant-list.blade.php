@php
use App\Models\Admin\Product;
    
@endphp
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
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
                        <h3 class="card-title">Product</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.product-variant.add') }}" class="btn bg-gradient-primary  float-right">Add</a>
                        <table id="product-list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Unit Count</th>
                                    <th>Unit Type</th>
                                    <th>Price Per Unit</th>
                                    <th>Price</th>
                                    <th>Offer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($product_list) && is_object($product_list))
                                @foreach($product_list as $value)
                                @php
                                    $prod_data=Product::where('id',$value->product_id)->first();
                                @endphp
                                <tr>
                                    <td>{{$prod_data->name}}</td>
                                    <td>{{ isset($value->count) &&  !empty($value->count) ? $value->count  :  '' }}
                                    </td>
                                    <td>{{ isset($value->unit_type) &&  !empty($value->unit_type) ? $value->unit_type  :  '' }}
                                    </td>
                                    <td>{{ isset($value->price_per_pills) &&  !empty($value->price_per_pills) ? $value->price_per_pills  :  '' }}
                                    </td>
                                    <td>{{ isset($value->price) &&  !empty($value->price) ? $value->price  :  '' }}
                                    </td>
                                    <td>{{ isset($value->offer) &&  !empty($value->offer) ? $value->offer  :  '' }}</td>
                                    <td>
                                        <a href="{{ route('admin.product-variant.edit',['id'=>$value->id]) }}" title="edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0);" data-product="{{ $value->id }}" title="delete"
                                            class="delete-product">
                                            <i class="fas fa-trash text-danger"></i>
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
    $('#product-list').DataTable();
        $('.delete-product').on('click',function(){
            product_id =  $(this).data('product');
            if(confirm('Do you really want to delete this product')){
                $.ajax({
                    url:"{{ route('admin.product-variant.delete') }}",
                    type:"POST",
                    data:{
                        product_id:product_id,
                        _token:'{{ csrf_token() }}'
                    },
                    success:function(data){
                        alert('Product Variant Deleted successfully');
                        window.location.reload();
                    },
                    error:function(data){
                        alert('Something went wrong  please try again');
                    }
                });
            }
        });
    });
</script>
@endsection