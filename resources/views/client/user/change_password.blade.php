@extends('layouts.client')



@section('content')

<!-- jknjvckm -->

<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 offset-md-2 offset-lg-2 offset-xl-2" style="background-color: rgb(250, 250, 250);padding: 20px;">

            <form action="" method="POST" id="register-form" class="signup-form">
                @csrf
                @if(Request::input('redirect_to','') != '')
                <input type="hidden" name="redirect_to" value="{{ Request::input('redirect_to') }}">
                @endif
                <div class="delivery-form-heading">
                    <h4 class="text-center">Edit Details</h4>
                </div>

                <div class="row mb--20">
                    <div class="col-12">
                        <div class="form__group">
                            <label class="form__label" for="password">Password</label>
                            <input type="password" tabindex="4" name="password" id="password" class="form__input" value="1234567896"
                            autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form__group">
                            <label class="form__label" for="confirm_password">Confirm password</label>
                            <input type="password" tabindex="5" name="confirm_password" id="confirm_password" class="form__input" value="1234567896" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <button type="Submit Address" class="btn btn-size-md sign-btn address-form-btn">
                            Update Password
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

            confirm_password: {
                equalTo: "Password and Confirm password should be same ",
            },


        },
        submitHandler: function(form) {
            return true;
        }
    });
</script>


@endsection