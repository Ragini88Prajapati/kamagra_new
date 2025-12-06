@extends('layouts.admin')

@section('content')

<div class="content-wrapper" style="min-height: 234px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Type</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Type</li>
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
                        <h3 class="card-title">Product Type</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.product_type.add') }}"
                            class="btn bg-gradient-primary  float-right">Add</a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($product_type_list) && is_object($product_type_list))
                                @foreach($product_type_list as $value)
                                <tr>
                                    <td>{{ isset($value->name) &&  !empty($value->name) ? $value->name  :  '' }}</td>
                                    <td>{{ isset($value->description) &&  !empty($value->description) ? $value->description  :  '' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.product_type.edit',['id'=>$value->id]) }}"
                                            title="edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0);" data-product-type="{{ $value->id }}"
                                            title="delete" class="delete-product-type">
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
<script>
    $('.delete-product-type').on('click',function(){
            product_type_id =  $(this).data('product-type');
            if(confirm('Do you really want to delete this product types')){
                $.ajax({
                    url:"{{ route('admin.product_type.delete') }}",
                    type:"POST",
                    data:{
                        product_type_id:product_type_id,
                        _token:'{{ csrf_token() }}'
                    },
                    success:function(data){
                        alert('Product Type Deleted successfully');
                        window.location.reload();
                    },
                    error:function(data){
                        alert('Something went wrong  please try again');
                    }
                });
            }
        });
</script>
@endsection