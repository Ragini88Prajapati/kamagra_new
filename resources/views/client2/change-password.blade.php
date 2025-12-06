@php
use App\Models\Client\Product;

@endphp
@extends('layouts.client2')

@section('content')

<div class="container user-container">
    <div class="row">
        <div class="col-lg-12">
            <section class="signup-signin-section change-passowrd-section">
                <div class="usersignin-up-div">

                    <div class="user signinBx">

                        <div class="formBx ">
                            <div class="click-forgot-hide">
                                <form method="post" action="{{route('home.reset')}}" enctype="" id="new_password">
                                    @csrf
                                    <h2>Change Password</h2>
                                    <input type="password" name="password" id="pass" placeholder="New Password" />

                                    <input type="password" name="con_password" placeholder="Confirm Password" />

                                    <input type="hidden" name="reset_link" value="{{isset($userData)&&!empty($userData)?$userData->reset_link:''}}" />

                                    <!-- <input type="submit" name="" value="Login" /> -->

                                    <div class="signin-up-btn text-center">
                                        <a href="user-dashboard.php">
                                            <button type="submit">Submit</button>
                                        </a>

                                    </div>


                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $("#new_password").validate({
            ignore: [],
            rules: {
                
                password:{
                    required: true,
                    
                },
                con_password:{
                    required: true,
                    equalTo: "#pass"
                    
                },
                
            },
            messages: {
                
                
            } 
        });
        $.validator.addMethod("pwcheck",
            function(value, element) {
                return /^[A-Za-z0-9]+$/.test(value);
        });
    });
</script>
@endsection