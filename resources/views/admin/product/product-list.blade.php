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
                        <a href="{{ route('admin.product.add') }}" class="btn bg-gradient-primary  float-right">Add</a>
                        <table id="product-list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    {{-- <th>Brand</th> --}}
                                    {{-- <th>Collections</th> --}}
                                    {{-- <th>Discount</th> --}}
                                    <th>Price Per Unit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($product_list) && is_object($product_list))
                                @foreach($product_list as $value)
                                <tr>
                                    <td>{{ isset($value->name) &&  !empty($value->name) ? $value->name  :  '' }}</td>
                                    <td>
                                        <img src="{{asset('/assets/images/product/').'/'.$value->image}}"  style="width: 100px;">
                                    </td>
                                    {{-- <td>{{ isset($value->brand->name) &&  !empty($value->brand->name) ? $value->brand->name  :  '' }} --}}
                                    </td>
                                    {{-- <td>{{ isset($value->gender->name) &&  !empty($value->gender->name) ? $value->gender->name  :  '' }} --}}
                                    </td>
                                    {{-- <td>{{ isset($value->discount) &&  !empty($value->discount) ? $value->discount  :  '' }} --}}
                                    </td>
                                    <td>{{ isset($value->price) &&  !empty($value->price) ? $value->price  :  '' }}</td>
                                    <td>
                                        <a href="{{ route('admin.product.edit',['id'=>$value->id]) }}" title="edit">
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
                    url:"{{ route('admin.product.delete') }}",
                    type:"POST",
                    data:{
                        product_id:product_id,
                        _token:'{{ csrf_token() }}'
                    },
                    success:function(data){
                        alert('Product Deleted successfully');
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