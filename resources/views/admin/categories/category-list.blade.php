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
                    <h1>Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                        <h3 class="card-title">Category</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.category.add') }}" class="btn bg-gradient-primary float-right">Add</a>
                        <table id="category-list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <!-- <th>Image</th> -->
                                    <!-- <th>Price Per Unit</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($category_list) && is_object($category_list))
                                @foreach($category_list as $value)
                                <tr>
                                    <td>{{ isset($value->name) && !empty($value->name) ? $value->name : '' }}</td>
                                    <!-- <td>
                                        <img src="{{ asset('/assets/images/category/') . '/' . $value->image }}" style="width: 100px;">
                                    </td> -->
                                    <!-- <td>{{ isset($value->price) ? $value->price : '' }}</td> -->
                                    <td>
                                        <a href="{{ route('admin.category.edit', ['id' => $value->id]) }}" title="edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0);" data-category="{{ $value->id }}" title="delete" class="delete-category">
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
    $(document).ready(function() {
        $('#category-list').DataTable();
        $('.delete-category').on('click', function() {
            var category_id = $(this).data('category');
            if (confirm('Do you really want to delete this category?')) {
                $.ajax({
                    url: "{{ route('admin.category.delete') }}",
                    type: "POST",
                    data: {
                        category_id: category_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        alert('Category deleted successfully');
                        window.location.reload();
                    },
                    error: function(data) {
                        alert('Something went wrong, please try again');
                    }
                });
            }
        });
    });
</script>
@endsection
