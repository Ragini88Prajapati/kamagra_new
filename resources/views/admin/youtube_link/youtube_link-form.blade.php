@extends('layouts.admin')

@section('content')
<div class="content-wrapper" style="">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Youtube Link {{ isset($action) && $action  == 'update' ?  'Update'  : 'Add'  }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Youtube Link</a></li>
                        <li class="breadcrumb-item active">
                            {{ isset($action) && $action  == 'update' ?  'Update'  : 'Add'  }} Youtube Link</li>
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
                        action="{{ isset($action) && $action  == 'update' ? route('admin.youtube_link.update') : route('admin.youtube_link.insert') }}"
                        enctype="multipart/form-data" method="POST" id="youtube-link-form">
                        @csrf

                        @if(isset($action) && $action == 'update' && $youtube_link_data->id)
                        <input type="hidden" name="youtube_link_id"
                            value="{{ isset($youtube_link_data->id) && !empty($youtube_link_data->id) ? $youtube_link_data->id : "" }}">
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Youtube Link Name</label>
                                    <?php
                                            if(old('name') != null){
                                                $name_value = old('name');
                                            }else{
                                                $name_value = isset($youtube_link_data->name) && !empty($youtube_link_data->name) ? $youtube_link_data->name : "";;
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
                                    <label for="name">Youtube Link</label>
                                    <?php
                                            if(old('youtube_link') != null){
                                                $youtube_link_value = old('youtube_link');
                                            }else{
                                                $youtube_link_value = isset($youtube_link_data->youtube_link) && !empty($youtube_link_data->youtube_link) ? $youtube_link_data->youtube_link : "";;
                                            }
                                            ?>
                                    <input type="text" name="youtube_link" id="youtube_link"
                                        value="{{ $youtube_link_value }}" class="form-control">
                                    @error('youtube_link')
                                    <label id="youtube_link-error" class="error"
                                        for="youtube_link">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Youtube Link Description</label>
                                    <?php
                                    if(old('description') != null){
                                        $description_value = old('description');
                                    }else{
                                        $description_value = isset($youtube_link_data->description) && !empty($youtube_link_data->description) ? $youtube_link_data->description : "";;
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
    $('#youtube-link-form').validate({
        rules:{
            name:{
                required:true,
                maxlength:255
            },
            name:{
                youtube_link:true,
                maxlength:500
            }
        },
        submitHandler:function(form){
            // alert('submited');
            return true;
        }
    });
</script>
@endsection