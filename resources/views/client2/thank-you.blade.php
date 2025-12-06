@extends('layouts.client2')

@section('content')

<section class="thank-you-section">
    <div class="container">
        <div class="row d-flex align-items-center thankyou-row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 text-center">
                <div id="contents" class="thankyou-title">
                    <h1> Danke schön.</h1>
                    <h3 class="drug_contect_padding">Ihre Bestellung wurde erfolgreich abgeschlossen.</h3>
                    <div class="thank-content-p">
                        <p>Order Placed,
                            Your Order Id is <strong>{{isset($order_id)? $order_id:''}}</strong> .
                        </p>
                        <p>  Your User Id is <strong>{{isset($user_id)? $user_id:''}}</strong> .</p>
                        <p>  Your User Name is <strong>{{isset($shipping_firstname)? $shipping_firstname:''}}</strong> .</p>
                        <p>
                            Eine E-Mail-Bestätigung mit den Details zu Ihrer Bestellung wurde an die angegebene
                            E-Mail-Adresse gesendet.
                            <br>
                            Bitte bewahren Sie es für Ihre Unterlagen auf.

                        </p>

                    </div>
                </div>
            </div><!-- /#content -->

        </div><!-- /.row -->

    </div><!-- /.container -->
</section>



@endsection

@section('scripts')

@endsection