@extends('layouts.admin')

@section('content')
<div class="content-wrapper" style="">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Banner Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Banner</a></li>
                        <li class="breadcrumb-item active">Add Banner</li>
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
                        action="{{ isset($action) && $action  == 'update'? route('admin.banner.update') : route('admin.banner.insert') }}"
                        enctype="multipart/form-data" method="POST" id="product-form">
                        @csrf
                        <?php
                        if(isset($product_data->id) && !empty($product_data->id)){
                            ?>
                        <input type="hidden" name="product_id" id="product_id" value="{{ $product_data->id }}">
                        <?php
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <?php
                                            if(old('title') != null){
                                                $title_value = old('title');
                                            }else{
                                                $title_value = isset($product_data->title) && !empty($product_data->title) ? $product_data->title : "";;
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
                                    <label for="short_title">Short Title</label>
                                    <?php
                                            if(old('short_title') != null){
                                                $short_title_value = old('short_title');
                                            }else{
                                                $short_title_value = isset($product_data->short_title) && !empty($product_data->short_title) ? $product_data->short_title : "";;
                                            }
                                            ?>
                                    <input type="text" name="short_title" id="short_title" value="{{ $short_title_value }}"
                                        class="form-control">
                                    @error('short_title')
                                    <label id="short_title-error" class="error" for="short_title">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <?php
                                        $image  = isset($product_data->image_name) && !empty($product_data->image_name) ? $product_data->image_name : "";
                                        $image_path  = isset($product_data->image_path) && !empty($product_data->image_path) ? $product_data->image_path : "";
                                        $is_image_present = true;
                                        // if(Storage::url($image_path.$image) == '/storage/'){
                                        //     $is_image_present = true;
                                        // }
                                        if(!empty($image)){
                                            $is_image_present = false;
                                        }
                                        
                                    ?>
                                    <input type="file" name="image" id="image" class="form-control" accept="image/*" oninput="bannerimage.src=window.URL.createObjectURL(this.files[0])">
                                    @error('image')
                                    <label id="image-error" class="error" for="image">{{ $message }}</label>
                                    @enderror
                                    <?php
                                        if(isset($action)&&$action  == 'update'){
                                    ?>
                                    <img src="{{$product_data->image_name!=''? asset('/assets/images/banner/').'/'.$product_data->image_name:''}}" style="width:100px;">
                                    <?php  } ?>
                                    <img src="" id="bannerimage" style="width:100px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <?php
                                            if(old('url') != null){
                                                $url_value = old('url');
                                            }else{
                                                $url_value = isset($product_data->url) && !empty($product_data->url) ? $product_data->url : "";;
                                            }
                                            ?>
                                    <input type="text" name="url" id="url" value="{{ $url_value }}"
                                        class="form-control">
                                    @error('url')
                                    <label id="name-error" class="error" for="url">{{ $message }}</label>
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
            name:{
                required:true,
                maxlength:255
            },
            subtitle:{
                required:true,
                maxlength:255
            },
            brand:{
                required:true
            },
            gender:{
                required:true
            },
            <?php
            if($is_image_present){
?>
image:{
                required:true
            },
<?php
            }
            ?>
            
            mrp:{
                required:true,
                digits: true
            },
            discount:{
                required:true,
                digits: true
            },
            price:{
                required:true,
                digits: true
            },
            product_type:{
                required:true
            }
        },
        submitHandler:function(form){
            // alert('submited');
            return true;
        }
    });

    $('.add-product-img').on('click',function(){
        var cloneDiv = $("#product-img-clone-div").attr('style','').attr('id','');
        cloneDiv = cloneDiv.attr('style','').attr('id','');
        testCloneDiv = '<div class="col-md-6"><div class="row"><div class="col-md-11"><input type="file" name="product_image[]" multiple class="form-control"  accept="image/*"></div><div class="col-md-1"><span class="fa fa-minus remove-product-img"></span></div></div></div>';
        $(this).parent().parent().parent().parent().append(testCloneDiv);
    });

    $(document.body).on('click','.remove-product-img',function(){
        $(this).parent().parent().parent().remove();
    });

    $('#mrp').on('change',function(){
        var mrp_value = $(this).val();
        var discount = $("#discount").val();
        
        calculate_price(mrp_value,discount);
    });

    $("#discount").on('change',function(){
        var mrp_value = $('#mrp').val();
        var discount = $(this).val();
        
        calculate_price(mrp_value,discount);
    });


    function calculate_price(mrp_value,discount){
        
        if(mrp_value ==  '' || typeof(mrp_value) == 'undefined'){
            mrp_value = 0;   
        }

        if(discount ==  '' || typeof(discount) == 'undefined'){
            discount = 0;   
        }
        // console.log(discount);
        
        var  price = mrp_value - ((discount/100) * mrp_value);
        $('#price').val(price);
    }
</script>
@endsection