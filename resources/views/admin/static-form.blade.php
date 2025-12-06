@extends('layouts.admin')

@section('content')
<div class="content-wrapper" style="">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Static Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Static</a></li>
                        <li class="breadcrumb-item active">Add Static</li>
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
                        action="{{ isset($action) && $action  == 'update'? route('admin.static.update') : '' }}"
                        enctype="multipart/form-data" method="POST" id="product-form">
                        @csrf
                        <?php
                        if(isset($static->id) && !empty($static->id)){
                            ?>
                        <input type="hidden" name="product_id" id="product_id" value="{{ $static->id }}">
                        <?php
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image1">Image1</label>
                                   
                                    <input type="file" name="image1" id="image1" class="form-control" accept="image/*" oninput="bannerimage1.src=window.URL.createObjectURL(this.files[0])">
                                    @error('image1')
                                    <label id="image1-error" class="error" for="image1">{{ $message }}</label>
                                    @enderror
                                    <?php
                                        if(isset($static->image1) && !empty($static->image1)){
                                    ?>
                                    <img src="{{$static->image1!=''? asset('/assets/images/static/').'/'.$static->image1:''}}" style="width:100px;">
                                    <?php  } ?>
                                    <img src="" id="bannerimage1" style="width:100px;">
                                    
                                </div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title1">Title 1</label>
                                    <?php
                                            if(old('title1') != null){
                                                $title1_value = old('title1');
                                            }else{
                                                $title1_value = isset($static->title1) && !empty($static->title1) ? $static->title1 : "";;
                                            }
                                            ?>
                                    <input type="text" name="title1" id="title1" value="{{ $title1_value }}"
                                        class="form-control">
                                    @error('title1')
                                    <label id="name-error" class="error" for="title1">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="short_description1">Short Description 1</label>
                                    <?php
                                            if(old('short_description1') != null){
                                                $short_description1_value = old('short_description1');
                                            }else{
                                                $short_description1_value = isset($static->short_description1) && !empty($static->short_description1) ? $static->short_description1 : "";;
                                            }
                                            ?>
                                    <input type="text" name="short_description1" id="short_description1" value="{{ $short_description1_value }}"
                                        class="form-control">
                                    @error('short_description1')
                                    <label id="name-error" class="error" for="short_description1">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image2">Image2</label>
                                   
                                    <input type="file" name="image2" id="image2" class="form-control" accept="image/*" oninput="bannerimage2.src=window.URL.createObjectURL(this.files[0])">
                                    @error('image2')
                                    <label id="image2-error" class="error" for="image2">{{ $message }}</label>
                                    @enderror
                                    <?php
                                        if(isset($static->image2) && !empty($static->image2)){
                                    ?>
                                    <img src="{{$static->image2!=''? asset('/assets/images/static/').'/'.$static->image2:''}}" style="width:100px;">
                                    <?php  } ?>
                                    <img src="" id="bannerimage2" style="width:100px;">
                                    
                                </div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title2">Title 2</label>
                                    <?php
                                            if(old('title2') != null){
                                                $title2_value = old('title2');
                                            }else{
                                                $title2_value = isset($static->title2) && !empty($static->title2) ? $static->title2 : "";;
                                            }
                                            ?>
                                    <input type="text" name="title2" id="title2" value="{{ $title2_value }}"
                                        class="form-control">
                                    @error('title2')
                                    <label id="title2-error" class="error" for="title2">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="short_description2">Short Description 2</label>
                                    <?php
                                            if(old('short_description2') != null){
                                                $short_description2_value = old('short_description2');
                                            }else{
                                                $short_description2_value = isset($static->short_description2) && !empty($static->short_description2) ? $static->short_description2 : "";;
                                            }
                                            ?>
                                    <input type="text" name="short_description2" id="short_description2" value="{{ $short_description2_value }}"
                                        class="form-control">
                                    @error('short_description2')
                                    <label id="name-error" class="error" for="short_description2">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image3">Image3</label>
                                   
                                    <input type="file" name="image3" id="image3" class="form-control" accept="image/*" oninput="bannerimage3.src=window.URL.createObjectURL(this.files[0])">
                                    @error('image3')
                                    <label id="image3-error" class="error" for="image3">{{ $message }}</label>
                                    @enderror
                                    <?php
                                        if(isset($static->image3) && !empty($static->image3)){
                                    ?>
                                    <img src="{{$static->image3!=''? asset('/assets/images/static/').'/'.$static->image3:''}}" style="width:100px;">
                                    <?php  } ?>
                                    <img src="" id="bannerimage3" style="width:100px;">
                                    
                                </div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title3">Title 3</label>
                                    <?php
                                            if(old('title3') != null){
                                                $title3_value = old('title3');
                                            }else{
                                                $title3_value = isset($static->title3) && !empty($static->title3) ? $static->title3 : "";;
                                            }
                                            ?>
                                    <input type="text" name="title3" id="title3" value="{{ $title3_value }}"
                                        class="form-control">
                                    @error('title3')
                                    <label id="title3-error" class="error" for="title3">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="short_description3">Short Description 3</label>
                                    <?php
                                            if(old('short_description3') != null){
                                                $short_description3_value = old('short_description3');
                                            }else{
                                                $short_description3_value = isset($static->short_description3) && !empty($static->short_description3) ? $static->short_description3 : "";;
                                            }
                                            ?>
                                    <input type="text" name="short_description3" id="short_description3" value="{{ $short_description3_value }}"
                                        class="form-control">
                                    @error('short_description3')
                                    <label id="name-error" class="error" for="short_description3">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div> 
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ad_image1">Ad image 1</label>
                                   
                                    <input type="file" name="ad_image1" id="ad_image1" class="form-control" accept="image/*" oninput="bannerad_image1.src=window.URL.createObjectURL(this.files[0])">
                                    @error('ad_image1')
                                    <label id="ad_image1-error" class="error" for="ad_image1">{{ $message }}</label>
                                    @enderror
                                    <?php
                                        if(isset($static->ad_image1) && !empty($static->ad_image1)){
                                    ?>
                                    <img src="{{$static->ad_image1!=''? asset('/assets/images/static/').'/'.$static->ad_image1:''}}" style="width:100px;">
                                    <?php  } ?>
                                    <img src="" id="bannerad_image1" style="width:100px;">
                                    
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ad_image2">Ad image2</label>
                                   
                                    <input type="file" name="ad_image2" id="ad_image2" class="form-control" accept="image/*" oninput="bannerad_image2.src=window.URL.createObjectURL(this.files[0])">
                                    @error('ad_image2')
                                    <label id="ad_image2-error" class="error" for="ad_image2">{{ $message }}</label>
                                    @enderror
                                    <?php
                                        if(isset($static->ad_image2) && !empty($static->ad_image2)){
                                    ?>
                                    <img src="{{$static->ad_image2!=''? asset('/assets/images/static/').'/'.$static->ad_image2:''}}" style="width:100px;">
                                    <?php  } ?>
                                    <img src="" id="bannerad_image2" style="width:100px;">
                                    
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ad_image3">Ad image3</label>
                                   
                                    <input type="file" name="ad_image3" id="ad_image3" class="form-control" accept="image/*" oninput="bannerad_image3.src=window.URL.createObjectURL(this.files[0])">
                                    @error('ad_image3')
                                    <label id="ad_image3-error" class="error" for="ad_image3">{{ $message }}</label>
                                    @enderror
                                    <?php
                                        if(isset($static->ad_image3) && !empty($static->ad_image3)){
                                    ?>
                                    <img src="{{$static->ad_image3!=''? asset('/assets/images/static/').'/'.$static->ad_image3:''}}" style="width:100px;">
                                    <?php  } ?>
                                    <img src="" id="bannerad_image3" style="width:100px;">
                                    
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
            
            short_description:{
                required:true
            },
            
            
        },
        submitHandler:function(form){
            // alert('submited');
            return true;
        }
    });

    
</script>
@endsection