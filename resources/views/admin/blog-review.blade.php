@php
use App\Models\Admin\Product;
use App\BlogModel;
    
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
                    <h1>Blog Reviews</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blog Reviews</li>
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
                        <h3 class="card-title">Blog Reviews</h3>
                    </div>
                    <div class="card-body">
                        <table id="product-list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Blog Name</th>
                                    <th>Name</th>
                                    <th>Reviews</th>
                                    <th>Date</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($reviews) && is_object($reviews))
                                @foreach($reviews as $value)
                                @php
                                    $blogData=BlogModel::where('id',$value->blog_id)->first();
                                @endphp
                                <tr>
                                    <td>{{$blogData->title}}</td>
                                    <td>{{ isset($value->name) &&  !empty($value->name) ? $value->name  :  '' }}
                                    </td>
                                    <td>{{ isset($value->description) &&  !empty($value->description) ? $value->description  :  '' }}
                                    </td>
                                    <td>{{$blogData->created_at}}</td>
                                    <td>
                                        {{-- <a href="{{ route('admin.blog.edit',['id'=>$value->id]) }}" title="edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a> --}}
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
            if(confirm('Do you really want to delete this blog review')){
                $.ajax({
                    url:"{{ route('admin.blog.reviewDelete') }}",
                    type:"POST",
                    data:{
                        product_id:product_id,
                        _token:'{{ csrf_token() }}'
                    },
                    success:function(data){
                        alert('Blog Review Deleted successfully');
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