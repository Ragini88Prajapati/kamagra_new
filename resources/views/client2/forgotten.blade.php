@php
use App\Models\Client\Product;

@endphp
@extends('layouts.client2')

@section('content')

<div class="bt-breadcrumb">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i></a>
                </li>
                <li><a href="#">KONTO</a>
                </li>
                <li><a href="#"> PASSWORT VERGESSEN</a>
                </li>
            </ul>
        </div>
    </div>
</div><!-- /.bt-breadcrumb -->
<div class="container">
    <div class="row">
        <column id="column-left" class="col-sm-2 col-md-3 col-lg-3 hidden-xs">
            @include('client2.account-sidebar')
        </column><!-- /#column-left -->
        <div id="content" class="col-sm-10 col-md-9 col-lg-9">
            <h1 class="block-title">Passwort Vergessen?</h1>
            <p>Geben Sie die mit Ihrem Konto verknüpfte E-Mail-Adresse ein. Klicken Sie auf Senden, um Ihr Passwort per
                E-Mail zu erhalten.</p>
            <form method="post" action="{{route('home.forgot')}}" enctype="multipart/form-data" class="form-horizontal"
                id="forget_form">
                @csrf
                <fieldset>
                    <h3>IHRE E-MAIL-ADRESSE</h3>
                    <div class="required">
                        <label class="control-label" for="input-email">E-Mail-Addresse</label>
                        <input type="text" name="email" value="" placeholder="E-Mail-Addresse" id="input-email"
                            class="form-control" />
                    </div>
                </fieldset>
                <div class="buttons clearfix">
                    <div class="pull-right">
                        <a href="{{route('login')}}" class="btn btn-gray">Zurück</a>
                        <input type="submit" value="Fortsetzen" class="btn btn-blue" />
                    </div>
                </div>
            </form>
        </div><!-- /#content -->
    </div><!-- /.row -->
</div><!-- /.container -->


@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $("#forget_form").validate({
        ignore: [],
        rules: {

            email: {
                required: true,
                email: true
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