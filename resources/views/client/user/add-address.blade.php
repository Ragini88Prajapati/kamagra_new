@extends('layouts.client')


@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-10 col-xl-10 offset-md-2 offset-lg-1 offset-xl-1"
            style="background-color: rgb(250, 250, 250);" id="signup-form">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
                
            <form action="{{ route('client.user.add_address_post') }}" method="POST"
                class="form form--account  your-order address-form" id="address-form">
                @csrf
                <div class="delivery-form-heading">
                    <h4 class="text-center">Add Address</h4>
                </div>
                <div class="row mb--20 mt-3">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-sm--20">
                        <div class="form__group">
                            <label class="form__label" for="name">Name <span class="required">*</span></label>
                            <input type="text" tabindex="1" name="name" id="name" class="form__input">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form__group">
                            <label class="form__label" for="email_id">Email <span class="required">*</span></label>
                            <input type="text" tabindex="2" name="email_id" id="email_id" class="form__input">
                        </div>
                    </div>
                </div>
                <div class="row mb--20">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-sm--20">
                        <div class="form__group">
                            <label class="form__label" for="mobile_number">Mobile Number <span
                                    class="required">*</span></label>
                            <input type="text" tabindex="3" name="mobile_number" id="mobile_number" class="form__input">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form__group">
                            <label class="form__label" for="alt_mobile_number">Alt Mobile Number <span
                                    class="required">*</span></label>
                            <input type="text" tabindex="4" name="alt_mobile_number" id="alt_mobile_number"
                                class="form__input">
                        </div>
                    </div>
                </div>

                <div class="row mb--20">
                    <div class="col-4">
                        <div class="form__group">
                            <label class="form__label" for="pincode">Pincode <span class="required">*</span></label>
                            <input type="text" tabindex="6" name="pincode" id="pincode" class="form__input">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form__group">
                            <label class="form__label" for="city">City <span class="required">*</span></label>
                            <input type="text" tabindex="7" name="city" id="city" class="form__input">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form__group">
                            <label class="form__label" for="state">State<span class="required">*</span></label>
                            <select name="state" id="state" class="form__input">
                                <option value="">Select</option>
                                <option value="1">Maharashtra</option>
                                <option value="2">Delhi</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb--20">

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form__group">
                            <label class="form__label" for="floor">Floor<span class="required">*</span></label>
                            <input type="text" tabindex="8" name="floor" id="floor" class="form__input">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form__group mt--20">
                            <label class="form__label" for="landmark">Landmark <span class="required">*</span></label>
                            <input type="text" name="landmark" id="landmark" class="form__input">
                        </div>
                    </div>
                </div>

                <div class="row mb--20">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form__group">
                            <label class="form__label" for="address"> Address <span class="required">*</span></label>
                            <textarea name="address" tabindex="5" id="address" row="20"
                                class="form__input signup-form-address" style="background-color: white;"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <button type="Submit Address" class="btn btn-size-md sign-btn address-form-btn">
                            Submit Details
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>


<script>
    $("#address-form").validate({
        rules: {
            first_name: {
                required: true,
                maxlength: 255,
            },
            email_id: {
                required: true,
                email: true,
                maxlength: 255,
            },
            mobile_number: {
                required: true,
                digits:true,
                maxlength: 12,
                minlength: 10,
            },
            alt_mobile_number: {
                required: true,
                digits:true,
                maxlength: 12,
                minlength: 10,
            },
            address: {
                required: true
            },
            pincode: {
                required: true,
                digits:true,
                maxlength:6,
                minlength:6
            },
            city: {
                required: true,
                maxlength:255
            },
            state:{
                required: true,
            },
            floor:{
                required:true,
                digits:true
            }
        },
        submitHandler:function(){
            return true;
        }
       
    });
  
</script>





@endsection