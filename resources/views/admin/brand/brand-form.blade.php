@extends('layouts.admin')

@section('content')
<div class="content-wrapper" style="">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brand {{ isset($action) && $action  == 'update' ?  'Update'  : 'Add'  }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Brand</a></li>
                        <li class="breadcrumb-item active">
                            {{ isset($action) && $action  == 'update' ?  'Update'  : 'Add'  }} Brand</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-body">
                    <form
                        action="{{ isset($action) && $action  == 'update' ? route('admin.brand.update') : route('admin.brand.insert') }}"
                        enctype="multipart/form-data" method="POST" id="brand-form">
                        @csrf

                        @if(isset($action) && $action == 'update' && $brand_data->id)
                        <input type="hidden" name="brand_id"
                            value="{{ isset($brand_data->id) && !empty($brand_data->id) ? $brand_data->id : "" }}">
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Brand Name</label>
                                    <?php
                                            if(old('name') != null){
                                                $name_value = old('name');
                                            }else{
                                                $name_value = isset($brand_data->name) && !empty($brand_data->name) ? $brand_data->name : "";;
                                            }
                                            ?>
                                    <input type="text" name="name" id="name" value="{{ $name_value }}"
                                        class="form-control">
                                    @error('name')
                                    <label id="name-error" class="error" for="name">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Brand Description</label>
                                    <?php
                                    if(old('description') != null){
                                        $description_value = old('description');
                                    }else{
                                        $description_value = isset($brand_data->description) && !empty($brand_data->description) ? $brand_data->description : "";;
                                    }
                                    ?>
                                    <textarea name="description" id="description"
                                        class="form-control">{{ $description_value }}</textarea>
                                    @error('description')
                                    <label id="description-error" class="error" for="description">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
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
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script>
    $('#brand-form').validate({
        rules:{
            name:{
                required:true,
                maxlength:255
            }
        },
        submitHandler:function(form){
            // alert('submited');
            return true;
        }
    });
</script>
@endsection