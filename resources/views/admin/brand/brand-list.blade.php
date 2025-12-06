@extends('layouts.admin')

@section('content')

<div class="content-wrapper" style="min-height: 234px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brand</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Brand</li>
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
                        <h3 class="card-title">Brand</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.brand.add') }}" class="btn bg-gradient-primary  float-right">Add</a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($brand_list) && is_object($brand_list))
                                @foreach($brand_list as $value)
                                <tr>
                                    <td>{{ isset($value->name) &&  !empty($value->name) ? $value->name  :  '' }}</td>
                                    <td>{{ isset($value->description) &&  !empty($value->description) ? $value->description  :  '' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.brand.edit',['id'=>$value->id]) }}" title="edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0);" data-brand="{{ $value->id }}" title="delete"
                                            class="delete-brand">
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
    $(document).ready(function () {
    
        $('.delete-brand').on('click',function(){
            brand_id =  $(this).data('brand');
            if(confirm('Do you really want to delete this brand')){
                $.ajax({
                    url:"{{ route('admin.brand.delete') }}",
                    type:"POST",
                    data:{
                        brand_id:brand_id,
                        _token:'{{ csrf_token() }}'
                    },
                    success:function(data){
                        alert('Brand Deleted successfully');
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