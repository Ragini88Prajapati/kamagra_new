@extends('layouts.client')



@section('content')

<!-- jknjvckm -->

<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 offset-md-2 offset-lg-2 offset-xl-2"
            style="background-color: rgb(250, 250, 250);padding: 20px;">
            
            <form action="{{ route('auth.register.register_client_user') }}" method="POST" id="register-form"
                class="signup-form">
                @csrf
                @if(Request::input('redirect_to','') != '')
                <input type="hidden" name="redirect_to" value="{{ Request::input('redirect_to') }}">
                @endif
                <div class="delivery-form-heading">
                    <h4 class="text-center">Sign up</h4>
                </div>
                <div class="row mb--20 mt-3">
                    <div class="col-md-6 mb-sm--20">
                        <div class="form__group">
                            <label class="form__label" for="name">Enter name <span class="required">*</span></label>
                            <input type="text" tabindex="1" name="name" id="name" class="form__input"
                                autocomplete="off">
                            @error('name')
                            <label id="name-error" class="error" for="name">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-sm--20">
                        <div class="form__group">
                            <label class="form__label" for="mobile_number">Mobile Number <span
                                    class="required">*</span></label>
                            <input type="text" tabindex="2" name="mobile_number" id="mobile_number" class="form__input"
                                autocomplete="off" value="{{ old('mobile_number') }}">
                            @error('mobile_number')
                            <label id="mobile_number-error" class="error" for="mobile_number">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb--20">

                    <div class="col-12">
                        <div class="form__group">
                            <label class="form__label" for="email">Email Address <span class="required">*</span></label>
                            <input type="email" tabindex="3" name="email" id="email" class="form__input"
                                autocomplete="off">
                            @error('email')
                            <label id="email-error" class="error" for="email">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb--20">
                    <div class="col-12">
                        <div class="form__group">
                            <label class="form__label" for="password">Password</label>
                            <input type="password" tabindex="4" name="password" id="password" class="form__input"
                                autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form__group">
                            <label class="form__label" for="confirm_password">Confirm password</label>
                            <input type="password" tabindex="5" name="confirm_password" id="confirm_password"
                                class="form__input" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <button type="Submit Address" class="btn btn-size-md sign-btn address-form-btn">
                            Sign Up
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
    $("#register-form").validate({
        rules: {
            name: {
                required: true,
                maxlength: 255,
            },

            mobile_number: {
                required: true,
                digits:true,
                maxlength: 12,
                minlength: 10
            },

            email_id: {
                required: true,
                email: true,
                maxlength: 255,

            },
            password: {
                required: true,
                minlength: 8


            },
            confirm_password: {
                required: true,
                minlength: 8,
                equalTo: "#password"
            }
        },
        messages: {
            name:{
                required:"Enter Your Name "
            } ,
            confirm_password: {
                equalTo: "Password and Confirm password should be same ",
            },
            mobile_number: {
                digits:"Enter valid mobile number "
            },
            email_id:{ 
                email:"Enter email id "
            },

        },
        submitHandler:function(form){
            return true;
        }
    });
</script>


@endsection