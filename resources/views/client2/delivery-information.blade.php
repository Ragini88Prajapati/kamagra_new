@php
use App\StaticContent;
$data=StaticContent::where('title','service_3')->first();
@endphp
@extends('layouts.client2')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div id="contents" class="col-sm-12">
                <h1>Versandinformationen</h1>
                <h3 class="drug_contect_padding">Versandinformationen</h3>

            </div>
        </div><!-- /#content -->

    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12 content-p">
            <?php echo  $data->description; ?>
        </div>

    </div>
</div>
</div><!-- /.container -->


@endsection

@section('scripts')

@endsection