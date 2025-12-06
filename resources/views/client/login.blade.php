@extends('layouts.client')

@section('content')
<div class="container">
   <div class="row">


      <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 offset-lg-3 offset-xl-3 ptb--40"
         style="background-color: rgb(250, 250, 250);" id="signup-form">
         <div class="d-flex align-items-center mb--20">

            <form action="{{ route('client.authenticate') }}" method="POST" class="form form--account signup-form address-form"
               id="login-form">
               @csrf

               @if(Request::input('redirect_to','') != '')
               <input type="hidden" name="redirect_to" value="{{ Request::input('redirect_to') }}">
               @endif
               <div class="row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lg-12">
                     <div class="form-heading">
                        <h3 class="text-center">Login</h3>
                     </div>
                  </div>
               </div>

               <div class="row mb--20 row-margin">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-sm--20">
                     @if($error_message = Session::get('error'))
                     <label id="error_msg-error" class="error" for="error_msg">{{ $error_message }}</label>
                     @endif
                     <div class="form__group">
                        <label class="form__label" for="email">Email Id<span class="required">*</span></label>
                        <input type="text" tabindex="1" name="email" id="email_id" class="form__input"
                           value="{{ old('email') }}">
                        @error('email')
                        <label id="email-error" class="error" for="email">{{ $message }}</label>
                        @enderror
                     </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                     <div class="form__group">
                        <label class="form__label" for="password">Password<span class="required">*</span></label>
                        <input type="password" tabindex="2" name="password" id="password" class="form__input">
                        @error('password')
                        <label id="password-error" class="error" for="password">{{ $message }}</label>
                        @enderror
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                     <div class="form__group submit-btn">
                        <input type="submit" value="Login" class="btn btn-size-md  sign-btn">
                     </div>
                  </div>
               </div>


            </form>
            <form action="javascript:void(0);" method="POST" class="form form--account address-form" id="register-form"
               style="display: none">
               <div class="row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lg-12">
                     <div class="form-heading">
                        <h3 class="text-center">Fill the form</h3>
                     </div>
                  </div>

               </div>

               <div class="row mb--20 row-margin">
                  <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-sm--20">
                     <div class="form__group">
                        <label class="form__label" for="first_name">First name <span class="required">*</span></label>
                        <input type="text" tabindex="1" name="first_name" id="first_name" class="form__input">
                     </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                     <div class="form__group">
                        <label class="form__label" for="last_name">Last name <span class="required">*</span></label>
                        <input type="text" tabindex="2" name="last_name" id="last_name" class="form__input">
                     </div>
                  </div>
               </div>
               <div class="row mb--20 row-margin">
                  <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6mb-sm--20">
                     <div class="form__group">
                        <label class="form__label" for="mobile_number">Mobile Number <span
                              class="required">*</span></label>
                        <input type="text" tabindex="3" name="mobile_number" id="mobile_number" class="form__input">
                     </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                     <div class="form__group">
                        <label class="form__label" for="alt_mobile_number">Alt Mobile Number <span
                              class="required">*</span></label>
                        <input type="text" tabindex="4" name="alt_mobile_number" id="alt_mobile_number"
                           class="form__input">
                     </div>
                  </div>
               </div>
               <div class="row mb--20 row-margin">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                     <div class="form__group">
                        <label class="form__label " for="address"> Address <span class="required">*</span></label>
                        <textarea name="address" tabindex="5" id="address" row="20"
                           class="form__input signup-form-address address-field"></textarea>
                     </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                     <div class="form__group">
                        <label class="form__label" for="floor">Floor<span class="required">*</span></label>
                        <select name="floor" id="floor" class="form__input">
                           <option value="">Select</option>


                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           <option value="7">7</option>
                           <option value="8">8</option>
                           <option value="9">9</option>
                           <option value="10">10</option>
                           <option value="11">11</option>
                        </select>
                     </div>
                     <div class="form__group mt--20">
                        <label class="form__label" for="landmark">Landmark <span class="required">*</span></label>
                        <input type="text" name="landmark" id="landmark" class="form__input">
                     </div>
                  </div>
               </div>
               <div class="row mb--20 row-margin">
                  <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                     <div class="form__group">
                        <label class="form__label" for="pincode">Pincode <span class="required">*</span></label>
                        <input type="text" tabindex="6" name="pincode" id="pincode" class="form__input">
                     </div>
                  </div>
                  <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                     <div class="form__group">
                        <label class="form__label" for="city">City <span class="required">*</span></label>
                        <input type="text" tabindex="7" name="city" id="city" class="form__input">
                     </div>
                  </div>
                  <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                     <div class="form__group">
                        <label class="form__label" for="state">State<span class="required">*</span></label>
                        <select name="state" id="state" class="form__input">
                           <option value="">Select</option>
                           {
                           <option value="1">Maharashtra</option>
                           <option value="2">Delhi</option>
                        </select>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                     <div class="form__group submit-btn">
                        <input type="submit" value="Submit" class="btn btn-size-md submit-btn-form">
                     </div>
                  </div>
               </div>


            </form>

         </div>

      </div>

   </div>
</div>

@endsection

@section('scripts')
{{-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script>
   $('#login-form').validate({
        rules:{
            email_id:{
                required:true,
                maxlength:255
            },
            password:{
               required:true,
                maxlength:255
            }
        },
        submitHandler:function(form){
            // alert('submited');
            return true;
        }
    });
</script> --}}
@endsection