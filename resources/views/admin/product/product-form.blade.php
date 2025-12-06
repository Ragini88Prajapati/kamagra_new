@extends('layouts.admin')

@section('content')
<div class="content-wrapper" style="">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Product</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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
                        action="{{ isset($action) && $action  == 'update'? route('admin.product.update') : route('admin.product.insert') }}"
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
                                    <label for="name">Product Name</label>
                                    <?php
                                            if(old('name') != null){
                                                $name_value = old('name');
                                            }else{
                                                $name_value = isset($product_data->name) && !empty($product_data->name) ? $product_data->name : "";;
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
                                    <label for="subtitle">Subtitle</label>
                                    <?php
                                            if(old('subtitle') != null){
                                                $subtitle_value = old('subtitle');
                                            }else{
                                                $subtitle_value = isset($product_data->subtitle) && !empty($product_data->subtitle) ? $product_data->subtitle : "";;
                                            }
                                            ?>
                                    <input type="text" name="subtitle" id="subtitle" value="{{ $subtitle_value }}"
                                        class="form-control">
                                    @error('subtitle')
                                    <label id="subtitle-error" class="error" for="subtitle">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <?php
                                        $image  = isset($product_data->image) && !empty($product_data->image) ? $product_data->image : "";
                                        $image_path  = isset($product_data->image_path) && !empty($product_data->image_path) ? $product_data->image_path : "";
                                        $is_image_present = false;
                                        if(Storage::url($image_path.$image) == '/storage/'){
                                            $is_image_present = true;
                                        }
                                        
                                    ?>
                                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                    @error('image')
                                    <label id="image-error" class="error" for="image">{{ $message }}</label>
                                    @enderror
                                </div>
                                @if (isset($action) && $action  == 'update')
                                <img src="{{asset('/assets/images/product/').'/'.$product_data->image}}"  style="width: 100px;">
                                    
                                @endif
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <?php
                                            if(old('brand') != null){
                                                $brand_value = old('brand');
                                            }else{
                                                $brand_value = isset($product_data->brand_id) && !empty($product_data->brand_id) ? $product_data->brand_id : "";;
                                            }
                                            ?>
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="">SELECT</option>
                                        @if(isset($brand_list) && is_object($brand_list))
                                        @foreach ($brand_list as $value)
                                        <option value="{{ $value->id }}"
                                            {{ $brand_value == $value->id  ? 'SELECTED'  : '' }}>
                                            {{ $value->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('brand')
                                    <label id="brand-error" class="error" for="brand">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Collection</label>
                                    <?php
                                    if(old('brand') != null){
                                        $gender_value = old('gender');
                                    }else{
                                        $gender_value = isset($product_data->gender_id) && !empty($product_data->gender_id) ? $product_data->gender_id : "";;
                                    }
                                    ?>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">SELECT</option>
                                        @if(isset($gender_list) && is_object($gender_list))
                                        @foreach ($gender_list as $value)
                                        <option value="{{ $value->id }}"
                                            {{ $gender_value  == $value->id  ? 'SELECTED'  : '' }}>
                                            {{ $value->name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('gender')
                                    <label id="gender-error" class="error" for="gender">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mrp">Mrp</label>
                                    <?php
                                            if(old('mrp') != null){
                                                $mrp_value = old('mrp');
                                            }else{
                                                $mrp_value = isset($product_data->mrp) && !empty($product_data->mrp) ? $product_data->mrp : "";;
                                            }
                                            ?>
                                    <input type="text" name="mrp" id="mrp" value="{{ $mrp_value }}"
                                        class="form-control">
                                    @error('mrp')
                                    <label id="name-error" class="error" for="mrp">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="discount">Discount</label>
                                    <?php
                                            if(old('discount') != null){
                                                $discount_value = old('discount');
                                            }else{
                                                $discount_value = isset($product_data->discount) && !empty($product_data->discount) ? $product_data->discount : 0;;
                                            }
                                            ?>
                                    <input type="text" name="discount" id="discount" value="{{ $discount_value }}"
                                        class="form-control">
                                    @error('discount')
                                    <label id="discount-error" class="error" for="discount">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price Per Unit</label>
                                    <?php
                                            if(old('price') != null){
                                                $price_value = old('price');
                                            }else{
                                                $price_value = isset($product_data->price) && !empty($product_data->price) ? $product_data->price : "";;
                                            }
                                            ?>
                                    <input type="text" name="price" id="price" value="{{ $price_value }}"
                                        class="form-control">
                                    @error('price')
                                    <label id="price-error" class="error" for="price">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ isset($product_data->category_id) && $product_data->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <label id="category_id-error" class="error" for="category_id">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number_text">Product Type</label>
                                    <?php
                                            if(old('product_type') != null){
                                                $product_type_value = old('product_type');
                                            }else{
                                                $product_type_value = isset($product_data->product_type_id) && !empty($product_data->product_type_id) ? $product_data->product_type_id : "";;
                                            }
                                            ?>
                                    <select name="product_type" id="product_type" class="form-control">
                                        <option value="">SELECT</option>
                                        @if(isset($product_type_list) && is_object($product_type_list))
                                        @foreach ($product_type_list as $value)
                                        <option value="{{ $value->id }}"
                                            {{ $product_type_value  == $value->id  ? 'SELECTED'  : '' }}>
                                            {{ $value->name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('number_text')
                                    <label id="number_text-error" class="error" for="number_text">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number_text">Number text</label>
                                    <?php
                                            if(old('number_text') != null){
                                                $number_text_value = old('number_text');
                                            }else{
                                                $number_text_value = isset($product_data->number_text) && !empty($product_data->number_text) ? $product_data->number_text : "";;
                                            }
                                            ?>
                                    <input type="text" name="number_text" id="number_text"
                                        value="{{ $number_text_value }}" class="form-control">
                                    @error('number_text')
                                    <label id="number_text-error" class="error" for="number_text">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="highlights">Hightlights</label>
                                    <?php
                                    if(old('highlights') != null){
                                        $highlights_value = old('highlights');
                                    }else{
                                        $highlights_value = isset($product_data->highlights) && !empty($product_data->highlights) ? $product_data->highlights : "";;
                                    }
                                    ?>
                                    <textarea name="highlights" id="highlights"
                                        class="form-control">{{ $highlights_value }}</textarea>
                                    @error('highlights')
                                    <label id="highlights-error" class="error" for="highlights">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Product Description</label>
                                    <?php
                                    if(old('description') != null){
                                        $description_value = old('description');
                                    }else{
                                        $description_value = isset($product_data->description) && !empty($product_data->description) ? $product_data->description : "";;
                                    }
                                    ?>
                                    <textarea name="description" id="description"
                                        class="form-control">{{ $description_value }}</textarea>
                                    @error('description')
                                    <label id="description-error" class="error" for="description">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <label for="product_image">Product Image</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <input type="file" name="product_image[]" multiple id="product_image"
                                                    class="form-control" accept="image/*">
                                            </div>
                                            <div class="col-md-1">
                                                <span class="fa fa-plus add-product-img"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Meta Title</label>
                                    <?php
                                            if(old('price') != null){
                                                $meta_title = old('meta_title');
                                            }else{
                                                $meta_title = isset($product_data->meta_title) && !empty($product_data->meta_title ) ? $product_data->meta_title : "";;
                                            }
                                            ?>
                                    <input type="text" name="meta_title" id="price" value="{{ $meta_title }}"
                                        class="form-control">
                                    @error('meta_title')
                                    <label id="price-error" class="error" for="price">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Meta Keyword</label>
                                    <?php
                                            if(old('meta_keyword') != null){
                                                $meta_keyword = old('meta_keyword');
                                            }else{
                                                $meta_keyword = isset($product_data->meta_keyword) && !empty($product_data->meta_keyword) ? $product_data->meta_keyword : "";;
                                            }
                                            ?>
                                    <input type="text" name="meta_keyword" id="meta_keyword" value="{{ $meta_keyword }}"
                                        class="form-control">
                                    @error('meta_keyword')
                                    <label id="price-error" class="error" for="price">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Meta Description</label>
                                    <?php
                                            if(old('meta_description') != null){
                                                $meta_description_value = old('meta_description');
                                            }else{
                                                $meta_description_value = isset($product_data->meta_description) && !empty($product_data->meta_description) ? $product_data->meta_description : "";;
                                            }
                                            ?>
                                    <input type="text" name="meta_description" id="meta_description" value="{{ $meta_description_value }}"
                                        class="form-control">
                                    @error('meta_description')
                                    <label id="price-error" class="error" for="price">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Meta Robot</label>
                                    <?php
                                            if(old('meta_robot') != null){
                                                $meta_robot_value = old('meta_robot');
                                            }else{
                                                $meta_robot_value = isset($product_data->meta_robot) && !empty($product_data->meta_robot) ? $product_data->meta_robot : "";;
                                            }
                                            ?>
                                    <input type="text" name="meta_robot" id="meta_robot" value="{{ $meta_robot_value }}"
                                        class="form-control">
                                    @error('meta_description')
                                    <label id="price-error" class="error" for="price">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Canonical Url</label>
                                     <?php
                                            if(old('canonical_url') != null){
                                                $meta_robot_value = old('canonical_url');
                                            }else{
                                                $meta_robot_value = isset($product_data->canonical_url) && !empty($product_data->canonical_url) ? $product_data->canonical_url : "";;
                                            }
                                            ?>
                                        <input type="text" name="canonical_url" id="canonical_url" value="{{ $meta_robot_value }}"
                                        class="form-control"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">OG Type</label>
                                     <?php
                                            if(old('og_type') != null){
                                                $meta_robot_value = old('og_type');
                                            }else{
                                                $meta_robot_value = isset($product_data->og_type) && !empty($product_data->og_type) ? $product_data->og_type : "";;
                                            }
                                            ?>
                                        <input type="text" name="og_type" id="og_type" value="{{ $meta_robot_value }}"
                                        class="form-control">  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">OG Title</label>
                                     <?php
                                            if(old('og_title') != null){
                                                $meta_robot_value = old('og_title');
                                            }else{
                                                $meta_robot_value = isset($product_data->og_title) && !empty($product_data->og_title) ? $product_data->og_title : "";;
                                            }
                                            ?>
                                        <input type="text" name="og_title" id="og_title" value="{{ $meta_robot_value }}"
                                        class="form-control">    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">OG Description</label>
                                     <?php
                                            if(old('og_description') != null){
                                                $meta_robot_value = old('og_description');
                                            }else{
                                                $meta_robot_value = isset($product_data->og_description) && !empty($product_data->og_description) ? $product_data->og_description : "";;
                                            }
                                            ?>
                                        <input type="text" name="og_description" id="og_description" value="{{ $meta_robot_value }}"
                                        class="form-control">     
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">OG Url</label>
                                     <?php
                                            if(old('og_url') != null){
                                                $meta_robot_value = old('og_url');
                                            }else{
                                                $meta_robot_value = isset($product_data->og_url) && !empty($product_data->og_url) ? $product_data->og_url : "";;
                                            }
                                            ?>
                                        <input type="text" name="og_url" id="og_url" value="{{ $meta_robot_value }}"
                                        class="form-control">       
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">OG Site Name</label>
                                     <?php
                                            if(old('og_site_name') != null){
                                                $meta_robot_value = old('og_site_name');
                                            }else{
                                                $meta_robot_value = isset($product_data->og_site_name) && !empty($product_data->og_site_name) ? $product_data->og_site_name : "";;
                                            }
                                            ?>
                                        <input type="text" name="og_site_name" id="og_site_name" value="{{ $meta_robot_value }}"
                                        class="form-control">       
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Twitter Title</label>
                                    <?php
                                            if(old('twitter_title') != null){
                                                $meta_robot_value = old('twitter_title');
                                            }else{
                                                $meta_robot_value = isset($product_data->twitter_title) && !empty($product_data->twitter_title) ? $product_data->twitter_title : "";;
                                            }
                                            ?>
                                        <input type="text" name="twitter_title" id="twitter_title" value="{{ $meta_robot_value }}"
                                        class="form-control">        
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Twitter Description</label>
                                    <?php
                                            if(old('twitter_description') != null){
                                                $meta_robot_value = old('twitter_description');
                                            }else{
                                                $meta_robot_value = isset($product_data->twitter_description) && !empty($product_data->twitter_description) ? $product_data->twitter_description : "";;
                                            }
                                            ?>
                                        <input type="text" name="twitter_description" id="twitter_description" value="{{ $meta_robot_value }}"
                                        class="form-control">         
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Twitter Card</label>
                                    <?php
                                            if(old('twitter_card') != null){
                                                $meta_robot_value = old('twitter_card');
                                            }else{
                                                $meta_robot_value = isset($product_data->twitter_card) && !empty($product_data->twitter_card) ? $product_data->twitter_card : "";;
                                            }
                                            ?>
                                        <input type="text" name="twitter_card" id="twitter_card" value="{{ $meta_robot_value }}"
                                        class="form-control">     
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Twitter Site</label>
                                    <?php
                                            if(old('twitter_site') != null){
                                                $meta_robot_value = old('twitter_site');
                                            }else{
                                                $meta_robot_value = isset($product_data->twitter_site) && !empty($product_data->twitter_site) ? $product_data->twitter_site : "";;
                                            }
                                            ?>
                                        <input type="text" name="twitter_site" id="twitter_site" value="{{ $meta_robot_value }}"
                                        class="form-control">      
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
                number: true
            },
            discount:{
                required:true,
                number: true
            },
            price:{
                required:true,
                number: true
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