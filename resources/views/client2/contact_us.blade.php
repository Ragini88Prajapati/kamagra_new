@extends('layouts.client2')

@section('meta')

    <title> Bester Kamagra-Shop mit erschwinglichem Preis
    </title>
    <meta name="description"
        content=" Kamagra kaufen war jetzt viel einfacher, schneller zu kaufen, mit onlinekamagrastore haben wir das, was Sie brauchen, mit dem schnellsten und kostenlosen Versand.">
    <meta name="keywords" content="kamagra bestellen, Kamagra kaufen, Kamagra Deutschland, Kamagra schnell, kamagra">


@endsection


@section('content')

<div class="bt-breadcrumb">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-home"></i></a>
                </li>
                <li><a href="#">KONTAKTIERE UNS</a>
                </li>
            </ul>
        </div>
    </div>
</div><!-- /.bt-breadcrumb -->
<div class="container contactus-cont">
    <div class="row">
        <div class="col-lg-12">
            <div id="content" class="col-sm-12">
                <h1>KONTAKTIERE UNS</h1>
                <h3 class="drug_contect_padding">UNSERE POSITION</h3>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>Drogerie</strong>
                                <br />
                                <address>OnlineKamagraStore</address>
                            </div>
                            <!--<div class="col-sm-3">-->
                            <!--    <strong>Telefon</strong>-->
                            <!--    <br> +0 123456789-->
                            <!--    <br />-->
                            <!--    <br />-->
                            <!--</div>-->
                            <div class="col-sm-3">
                                <strong>Senden Sie eine E- Mail</strong>
                                <br> <a href="#">support@onlinekamagrastore.com</a>
                                <br />
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
                <form method="post" action="{{route('home.save_contactus')}}" enctype="multipart/form-data"
                    class="form-horizontal" id="contact_us">
                    <fieldset>
                        <h3>KONTAKT FORMULAR</h3>
                        <div class="required">
                            <label class="control-label" for="input-name">Dein Name</label>
                            <input type="text" name="contact_name" value="" id="input-name" class="form-control"
                                required />
                        </div>
                        <div class="required">
                            <label class="control-label" for="input-email">E-Mail-Addresse</label>
                            <input type="text" name="contact_mail" value="" id="input-email" class="form-control"
                                required />
                        </div>
                        <div class="required">
                            <label class="control-label" for="input-enquiry">Anfrage</label>
                            <textarea name="contact_msg" rows="10" id="input-enquiry" class="form-control"
                                required></textarea>
                        </div>
                    </fieldset>
                    <div class="buttons">
                        <div class="pull-left">
                            <input class="btn btn-primary" type="submit" value="einreichen" />
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /#content -->

    </div><!-- /.row -->
</div><!-- /.container -->


@endsection

@section('scripts')
<script>
$(document).ready(function() {

    $("#contact_us").validate({
        ignore: [],
        rules: {

            contact_name: {
                required: true,
            },
            contact_mail: {
                required: true,
            },
            contact_msg: {
                required: true,
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