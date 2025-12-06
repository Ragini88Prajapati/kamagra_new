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
                        action="{{ isset($action) && $action  == 'update'? route('admin.product-variant.update') : route('admin.product-variant.insert') }}"
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
                                   
                                    <select name="product_data" id="" class="form-control">
                                        <option value="">Select Product</option>
                                        @forelse ($product_list as $item)
                                        <option value="{{$item->id}}" {{isset($product_data->product_id) && $product_data->product_id==$item->id ? "selected" : ""}}>{{$item->name}}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="unit_type">Unit Type</label>
                                    <?php
                                            if(old('unit_type') != null){
                                                $unit_type_value = old('unit_type');
                                            }else{
                                                $unit_type_value = isset($product_data->unit_type) && !empty($product_data->unit_type) ? $product_data->unit_type : "";;
                                            }
                                            ?>
                                    <input type="text" name="unit_type" id="unit_type" value="{{ $unit_type_value }}"
                                        class="form-control">
                                    @error('unit_type')
                                    <label id="unit_type-error" class="error" for="unit_type">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="count">Count</label>
                                    <?php
                                            if(old('count') != null){
                                                $count_value = old('count');
                                            }else{
                                                $count_value = isset($product_data->count) && !empty($product_data->count) ? $product_data->count : "";;
                                            }
                                            ?>
                                    <input type="text" name="count" id="count" value="{{ $count_value }}"
                                        class="form-control">
                                    @error('count')
                                    <label id="count-error" class="error" for="count">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price_per_pills">Price Per Pills</label>
                                    <?php
                                            if(old('price_per_pills') != null){
                                                $price_per_pills_value = old('price_per_pills');
                                            }else{
                                                $price_per_pills_value = isset($product_data->price_per_pills) && !empty($product_data->price_per_pills) ? $product_data->price_per_pills : "";;
                                            }
                                            ?>
                                    <input type="text" name="price_per_pills" id="price_per_pills" value="{{ $price_per_pills_value }}"
                                        class="form-control">
                                    @error('price_per_pills')
                                    <label id="name-error" class="error" for="price_per_pills">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <?php
                                            if(old('price') != null){
                                                $price_value = old('price');
                                            }else{
                                                $price_value = isset($product_data->price) && !empty($product_data->price) ? $product_data->price : 0;;
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
                                    <label for="offer">Offer</label>
                                    <?php
                                            if(old('offer') != null){
                                                $offer_value = old('offer');
                                            }else{
                                                $offer_value = isset($product_data->offer) && !empty($product_data->offer) ? $product_data->offer : "";;
                                            }
                                            ?>
                                    <input type="text" name="offer" id="offer" value="{{ $offer_value }}"
                                        class="form-control">
                                    @error('offer')
                                    <label id="offer-error" class="error" for="offer">{{ $message }}</label>
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
            product_data:{
                required:true,
            },
            count:{
                required:true,
            },
            price_per_pills:{
                required:true
            },
            price:{
                required:true
            },
            offer:{
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