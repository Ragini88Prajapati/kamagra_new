@extends('layouts.admin')

@section('content')
<div class="content-wrapper" style="">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Category</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-body">
                    <form action="{{ isset($action) && $action == 'update' ? route('admin.category.update', $category_data->id) : route('admin.category.insert') }}" enctype="multipart/form-data" method="POST" id="category-form">
                        @csrf
                        <?php
                        if(isset($category_data->id) && !empty($category_data->id)){
                            ?>
                        <input type="hidden" name="category_id" id="category_id" value="{{ $category_data->id }}">
                        <?php
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <?php
                                            if(old('name') != null){
                                                $name_value = old('name');
                                            }else{
                                                $name_value = isset($category_data->name) && !empty($category_data->name) ? $category_data->name : "";;
                                            }
                                            ?>
                                    <input type="text" name="name" id="name" value="{{ $name_value }}" class="form-control">
                                    @error('name')
                                    <label id="name-error" class="error" for="name">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <//?php
                                        $image = isset($category_data->image) && !empty($category_data->image) ? $category_data->image : "";
                                        ?>
                                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                    @error('image')
                                    <label id="image-error" class="error" for="image">{{ $message }}</label>
                                    @enderror
                                </div>
                                @if (isset($action) && $action == 'update')
                                <img src="{{ asset('/assets/images/category/').'/'.$category_data->image }}" style="width: 100px;">
                                @endif
                            </div> -->
                            
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('highlights');
    CKEDITOR.replace('description');
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script>
    $('#category-form').validate({
        rules: {
            name: {
                required: true,
                maxlength: 255
            },
            // image: {
            //     <//?php if (!isset($action) || $action != 'update') { ?>
            //     required: true,
            //     <//?php } ?>
            //     accept: "image/*"
            // },
            // price: {
            //     required: true,
            //     number: true
            // }
        },
        submitHandler: function (form) {
            return true;
        }
    });
</script>
@endsection
