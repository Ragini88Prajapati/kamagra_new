@php
use App\StaticContent;
$data=StaticContent::where('title','service_1')->first();
@endphp
@extends('layouts.client2')

@section('meta')

    <title> Bester Kamagra-Shop mit erschwinglichem Preis
    </title>
    <meta name="description"
        content=" Kamagra kaufen war jetzt viel einfacher, schneller zu kaufen, mit onlinekamagrastore haben wir das, was Sie brauchen, mit dem schnellsten und kostenlosen Versand.">
    <meta name="keywords" content="kamagra bestellen, Kamagra kaufen, Kamagra Deutschland, Kamagra schnell, kamagra">


@endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div id="contents" class="col-sm-12">
                <h1>Kostenloser Versand</h1>
                <h3 class="drug_contect_padding">Kostenloser Versand</h3>

            </div>
        </div><!-- /#content -->

    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12 content-p">
            <?php echo  $data->description; ?>
        </div>
    </div>
</div><!-- /.container -->


@endsection

@section('scripts')

@endsection