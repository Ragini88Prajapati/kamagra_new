@extends('layouts.admin')

@section('content')
<div class="content-wrapper" style="">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blog Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                        <li class="breadcrumb-item active">Add Blog</li>
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
                        action="{{ isset($action) && $action  == 'update'? route('admin.blog.update') : route('admin.blog.insert') }}"
                        enctype="multipart/form-data" method="POST" id="product-form">
                        @csrf
                        <?php
                        if(isset($blogs->id) && !empty($blogs->id)){
                            ?>
                        <input type="hidden" name="product_id" id="product_id" value="{{ $blogs->id }}">
                        <?php
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                   
                                    <input type="file" name="image" id="image" class="form-control" accept="image/*" oninput="bannerimage.src=window.URL.createObjectURL(this.files[0])">
                                    @error('image')
                                    <label id="image-error" class="error" for="image">{{ $message }}</label>
                                    @enderror
                                    <?php
                                        if(isset($action)&&$action  == 'update'){
                                    ?>
                                    <img src="{{$blogs->image_name!=''? asset('/assets/images/blogs/').'/'.$blogs->image_name:''}}" style="width:100px;">
                                    <?php  } ?>
                                    <img src="" id="bannerimage" style="width:100px;">
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <?php
                                            if(old('title') != null){
                                                $title_value = old('title');
                                            }else{
                                                $title_value = isset($blogs->title) && !empty($blogs->title) ? $blogs->title : "";;
                                            }
                                            ?>
                                    <input type="text" name="title" id="title" value="{{ $title_value }}"
                                        class="form-control">
                                    @error('title')
                                    <label id="title-error" class="error" for="title">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <?php
                                            if(old('date') != null){
                                                $date_value = old('date');
                                            }else{
                                                $date_value = isset($blogs->date) && !empty($blogs->date) ? $blogs->date : "";;
                                            }
                                            ?>
                                    <input type="date" name="date" id="date" value="{{ $date_value }}"
                                        class="form-control">
                                    @error('date')
                                    <label id="date-error" class="error" for="date">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <?php
                                            if(old('short_description') != null){
                                                $short_description_value = old('short_description');
                                            }else{
                                                $short_description_value = isset($blogs->short_description) && !empty($blogs->short_description) ? $blogs->short_description : "";;
                                            }
                                            ?>
                                    <input type="text" name="short_description" id="short_description" value="{{ $short_description_value }}"
                                        class="form-control">
                                    @error('short_description')
                                    <label id="name-error" class="error" for="short_description">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <?php
                                            if(old('description') != null){
                                                $description_value = old('description');
                                            }else{
                                                $description_value = isset($blogs->description) && !empty($blogs->description) ? $blogs->description : 0;;
                                            }
                                            ?>
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $description_value }}</textarea>
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
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'highlights');
    CKEDITOR.replace( 'description');
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script>
    $('#product-form').validate({
        rules:{
            <?php
                if(!isset($action)){
            ?>
            image:{
                required:true,
            },
            <?php
                }
                ?>
            title:{
                required:true,
            },
            date:{
                required:true
            },
            short_description:{
                required:true
            },
            description:{
                required:true,
            },
            
        },
        submitHandler:function(form){
            // alert('submited');
            return true;
        }
    });

    
</script>
@endsection