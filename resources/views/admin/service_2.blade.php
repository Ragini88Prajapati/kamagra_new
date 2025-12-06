@extends('layouts.admin')

@section('content')
<div class="content-wrapper" style="">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Satisfaction Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Satisfaction</a></li>
                        <li class="breadcrumb-item active">Add Satisfaction</li>
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
                        action="{{ isset($action) && $action  == 'update'? route('admin.static.update-satisfaction') : '' }}"
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