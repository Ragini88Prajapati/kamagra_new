@php
    use App\StaticContent;
    $data=StaticContent::where('title','about_us')->first();
@endphp
@extends('layouts.client2')


@section('SEO_Part')

    <title>{{ $data->meta_title }}</title>
    <meta name="title" content="{{$data->meta_title}}" />
    <meta name="description" content="{{ $data->meta_description }}" />
    <meta name="keywords" content="{{ $data->meta_keyword }}" />
    <meta name="robots" content="{{$data->meta_robot}}" />
    <link rel="canonical" href="{{$data->canonical_url}}" />
    
    <meta property="og:type" content="{{$data->og_type}}" />
    <meta property="og:title" content="{{$data->og_title}}" />
    <meta property="og:description" content="{{$data->og_description}}" />
    <meta property="og:url" content="{{$data->og_url}}" />
    <meta property="og:site_name" content="{{$data->og_site_name}}" />
    
    <meta name="twitter:card" content="{{$data->twitter_card}}" />
    <meta name="twitter:site" content="{{$data->twitter_site}}" />
    <meta name="twitter:title" content="{{$data->twitter_title}}" /> 
    <meta name="twitter:description" content="{{$data->twitter_description}}" />

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div id="contents" class="col-sm-12">
                <h1>Über Uns</h1>
                <h3 class="drug_contect_padding">Über Uns</h3>

            </div>
        </div><!-- /#content -->

    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="content-p">
                <?php echo  $data->description; ?>
            </div>
        </div>
    </div>
</div><!-- /.container -->


@endsection

@section('scripts')

@endsection