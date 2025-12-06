@extends('layouts.client2')

@section('content')
<div class="container">
    <div class="row">
        <column id="column-left" class="col-sm-2 col-md-3 col-lg-3 hidden-xs">
            @include('client2.account-sidebar')

        </column><!-- /#column-left -->
        <div id="content" class="col-sm-10 col-md-9 col-lg-9">
            <h1 class="page-title">Account Registrieren</h1>
            <p>Wenn Sie bereits ein Konto bei uns haben, melden Sie sich bitte auf der <a
                    href="login.php">Anmeldeseite</a>an.</p>
            <form method="post" action="{{ route('auth.register.register_client_user') }}" id="reg_form"
                enctype="multipart/form-data" class="form-horizontal register">
                @csrf
                @if(Request::input('redirect_to','') != '')
                <input type="hidden" name="redirect_to" value="{{ Request::input('redirect_to') }}">
                @endif
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <fieldset id="account">
                        <h1 class="drug_info_wrapper">Deine Persönlichen Details</h1>
                        {{-- <div class="required" style="display: none;">
                            <label class="control-label">Customer Group</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="customer_group_id" value="1" checked="checked" />
                                    Default</label>
                            </div>
                        </div> --}}
                        <div class="required">
                            <label class="control-label" for="input-firstname">Vorname</label>
                            <input type="text" name="firstname" value="" placeholder="Vorname" id="input-firstname"
                                class="form-control" required />
                            @error('firstname')
                            <label id="firstname-error" class="error" for="firstname">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="required">
                            <label class="control-label" for="input-lastname">Nachname</label>
                            <input type="text" name="lastname" value="" placeholder="Nachname" id="input-lastname"
                                class="form-control" required />
                            @error('lastname')
                            <label id="lastname-error" class="error" for="lastname">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="required">
                            <label class="control-label" for="input-email">Email</label>
                            <input type="email" name="email" value="" placeholder="Email" id="input-email"
                                class="form-control" required />
                            @error('email')
                            <label id="email-error" class="error" for="email">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="required">
                            <label class="control-label" for="input-telephone">Telefon</label>
                            <input type="tel" name="telephone" value="" placeholder="Telefon" id="input-telephone"
                                class="form-control" required />
                            @error('telephone')
                            <label id="telephone-error" class="error" for="telephone">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="">
                            <label class="control-label" for="input-fax">Fax</label>
                            <input type="number" name="fax" value="" placeholder="Fax" id="input-fax"
                                class="form-control" required />
                            @error('fax')
                            <label id="fax-error" class="error" for="fax">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="">
                            <label class="control-label" for="input-pass">Passwort</label>
                            <input type="password" id="pass" name="pass" value="" placeholder="Passwort"
                                class="form-control" required />
                            @error('pass')
                            <label id="pass-error" class="error" for="pass">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="">
                            <label class="control-label" for="input-con_pass">Kennwort bestätigen</label>
                            <input type="password" id="con_pass" name="con_pass" value=""
                                placeholder="Kennwort bestätigen" class="form-control" required />

                        </div>
                    </fieldset>
                    <div class="buttons">
                        <div class="checkbox-agree  read-agreement">
                            <input type="checkbox" name="agree" value="1" required> Ich habe die <a href="#"
                                class="agree"><b>Datenschutzerklärung gelesen und stimme ihr zu</b></a>
                        </div>
                        <div class="button-register">
                            <input type="submit" value="Fortsetzen" class="btn btn-gray">
                        </div>
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
    $("#reg_form").validate({
        ignore: [],
        rules: {

            email: {
                required: true,
                email: true
            },
            lastname: {
                required: true,
            },
            firstname: {
                required: true,
            },
            telephone: {
                required: true,
            },
            fax: {
                required: true,
            },
            pass: {
                required: true,
                minlength: 8
            },
            con_pass: {
                required: true,
                minlength: 8,
                equalTo: "#pass"
            }

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