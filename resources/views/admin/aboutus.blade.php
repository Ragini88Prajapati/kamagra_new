@extends('layouts.admin')

@section('content')
<div class="content-wrapper" style="">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>About Us Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">About Us</a></li>
                        <li class="breadcrumb-item active">Add About Us</li>
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
                        action="{{ isset($action) && $action  == 'update'? route('admin.static.update-about-us') : '' }}"
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ $static->description }}</textarea>
                                    @error('description')
                                    <label id="description-error" class="error" for="description">{{ $message }}</label>
                                    @enderror
                                    
                                    
                                </div>
                            </div>
                        </div>
                        
                        <!--SEO Part-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" value="{{$static -> meta_title}}" >  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Meta Description</label>
                                    <input type="text" class="form-control" name="meta_description" value="{{$static -> meta_description}}" >  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Meta Keyword</label>
                                    <input type="text" class="form-control" name="meta_keyword" value="{{$static -> meta_keyword}}" >  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Meta Robot</label>
                                    <input type="text" class="form-control" name="meta_robot" value="{{$static -> meta_robot}}" >  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Canonical Url</label>
                                    <input type="text" class="form-control" name="canonical_url" value="{{$static -> canonical_url}}" >  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">OG Type</label>
                                    <input type="text" class="form-control" name="og_type" value="{{$static -> og_type}}" >  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">OG Title</label>
                                    <input type="text" class="form-control" name="og_title" value="{{$static -> og_title}}" >  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">OG Description</label>
                                    <input type="text" class="form-control" name="og_description" value="{{$static -> og_description}}" >  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">OG Url</label>
                                    <input type="text" class="form-control" name="og_url" value="{{$static -> og_url}}" >  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">OG Site Name</label>
                                    <input type="text" class="form-control" name="og_site_name" value="{{$static -> og_site_name}}" >  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Twitter Title</label>
                                    <input type="text" class="form-control" name="twitter_title" value="{{$static -> twitter_title}}" >  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Twitter Description</label>
                                    <input type="text" class="form-control" name="twitter_description" value="{{$static -> twitter_description}}" >  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Twitter Card</label>
                                    <input type="text" class="form-control" name="twitter_card" value="{{$static -> twitter_card}}" >  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Twitter Site</label>
                                    <input type="text" class="form-control" name="twitter_site" value="{{$static -> twitter_site}}" >  
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