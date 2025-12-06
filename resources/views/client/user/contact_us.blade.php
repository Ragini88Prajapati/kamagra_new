@extends('layouts.client')


@section('content')
<div class="contact-form-area mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xs-12">
                <div class="contact-form-inner">
                    <h2 class="text-center">Get In Touch With Us</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xs-12">
                <div class="contact-form-inner">
                   
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="First name*" required="">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Last name*" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Email*" required="">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Subject*" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Message *" required=""></textarea>
                            </div>
                        </div>
                        <div class="contact-submit">
                            <button type="Submit Address" class="btn btn-size-md sign-btn address-form-btn">
                                Submit
                            </button> </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xs-12">
                <div class="contact-address-area">
                    <h2>Contact Us</h2>
                    <div class="row">
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-2">
                            <i class="fa fa-fax">&nbsp;</i>
                        </div>
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 col-10">
                            <p>
                                S-135 Haware Fantastic Business Park Sec-30 A, Vashi Navi Mumbai - 4000703

                            </p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-2">
                            <i class="fa fa-phone">&nbsp;</i>
                        </div>
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 col-10">
                            <p>
                                +91 - 7039442999

                            </p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-2">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 col-10">
                            <p>
                                alwayshealthypharma@gmail.com

                            </p>
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>

    <div class="container pt-3 pb-3" >
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                <div class="address-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.9594730015806!2d73.00027371361925!3d19.06551938709386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c14f014630e7%3A0xe080f5a7bf419250!2sHaware%20Fantasia%20Business%20Park%2C%20Unit%20No.%20S-186%2C%20Second%20Floor%2C%20Corporate%20Wing%20Fantasia%20Business%20Park%2C%20Plot%20No.%2047%2C%20Vashi%20Flyover%2C%20Sector%2030A%2C%20Vashi%2C%20Navi%20Mumbai%2C%20Maharashtra%20400703!5e0!3m2!1sen!2sin!4v1591605512521!5m2!1sen!2sin" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection