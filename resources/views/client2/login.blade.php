@extends('layouts.client2')

@section('content')

<div class="bt-breadcrumb">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-home"></i></a>
                </li>
                <li><a href="account.php">KONTO</a>
                </li>
                <li><a href="login.php">ANMELDUNG</a>
                </li>
            </ul>
        </div>
    </div>
</div><!-- /.bt-breadcrumb -->
<div class="container login-new-container">
    <div class="row">
        <column id="column-left" class="col-sm-2 col-md-3 col-lg-3 hidden-xs">

            @include('client2.account-sidebar')

        </column><!-- /#column-left -->
        <div id="content" class="col-sm-10 col-md-9 col-lg-9">
            <div class="row content-login">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="left login-bg ">
                        <h3>NEUKUNDE</h3>
                        <p><strong>Account registrieren</strong>
                        </p>
                        <p>Durch die Erstellung eines Kontos können Sie schneller einkaufen, über den Status einer
                            Bestellung auf dem Laufenden bleiben und Ihre zuvor getätigten Bestellungen verfolgen.</p>
                        <a href="{{route('home.signup')}}" class="btn btn-gray">Fortsetzen</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="right login-bg ">
                        <h3>WIEDERKEHRENDER KUNDE</h3>
                        <p><strong>Ich bin ein wiederkehrender Kunde</strong>
                        </p>
                        <form method="post" action="{{ route('client.authenticate') }}" enctype="multipart/form-data"
                            id="login_form">
                            @csrf

                            @if(Request::input('redirect_to','') != '')
                            <input type="hidden" name="redirect_to" value="{{ Request::input('redirect_to') }}">
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="input-email">E-Mail-Addresse</label>
                                <input type="text" name="email" value="" placeholder="E-Mail-Addresse" id="input-email"
                                    class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="input-password">Passwort</label>
                                <input type="password" name="password" value="" placeholder="Passwort"
                                    id="input-password" class="form-control" required />
                            </div>
                            <input type="submit" value="Einloggen " class="btn btn-gray" /> <a class="forgotten"
                                href="{{route('home.forgetPassPage')}}">Passwort vergessen</a>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /#content -->
    </div><!-- /.row -->
</div><!-- /.container -->



@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $("#login_form").validate({
        ignore: [],
        rules: {

            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
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