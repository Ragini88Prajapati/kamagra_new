@extends('layouts.client2')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div id="contents" class="col-sm-12">
                <h1>Partnerprogramm</h1>


            </div>
        </div><!-- /#content -->

    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="content-p">
                <p>
                    Bestellen Sie Kamagra Partnerprogramm bei Pillen-Palace Bestellen Sie Kamagra ist kostenlos und
                    ermöglicht es Ihnen, Einnahmen zu generieren, indem Sie einen Link auf Ihrer eigenen
                    Website/Blog/usw. posten. Die Bestellung von Kamagra erfolgt bei Pillen-Palace Order Kamagra oder
                    wirbt für bestimmte Produkte.
                </p>
                <p>
                    Besucher, die auf diesen Link klicken und anschließend Waren kaufen, verdienen dem Partner eine
                    Provision. Der normale Provisionssatz beträgt derzeit 33 %.
                </p>
                <p>
                    Weitere Informationen finden Sie in unseren FAQ und den Partnerprogrammbedingungen.
                </p>


            </div>
        </div>

    </div>
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="row content-login">
                <div class="col-sm-6">
                    <div class="left login-bg">
                        <h3>NEUER PARTNER</h3>
                        <p><strong>Ich bin noch kein Partner.</strong>
                        </p>

                        <p>
                            Bitte klicken Sie auf Weiter, um ein neues Affiliate-Konto zu erstellen. Dieses Partnerkonto
                            ist unabhängig vom Kundenkonto.
                        </p>
                        <a href="{{route('home.partner-register')}}" class="btn btn-gray">Fortsetzen</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="right login-bg ">
                        <h3>PARTNER-LOGIN</h3>
                        <p><strong>Ich bin bereits Partner</strong>
                        </p>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label" for="input-email">Partner-E-Mail</label>
                                <input type="text" name="p_email" value="" placeholder="Partner-E-Mail"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="input-password">Passwort</label>
                                <input type="password" name="password" value="" placeholder="Passwort"
                                    class="form-control">
                            </div>
                            <input type="submit" value="Einloggen " class="btn btn-gray" /> <a class="forgotten"
                                href="forgotten.php">Passwort vergessen</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection