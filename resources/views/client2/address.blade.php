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
                <li><a href="#">KONTO </a>
                </li>
                <li><a href="#">REGISTRIEREN</a>
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
        <div id="content" class="col-sm-10 col-md-9 col-lg-9 ">
            <h1 class="page-title">Adresse</h1>

            <form method="post" id="address_form" action="{{route('client.user.add_address_post')}}"
                enctype="multipart/form-data" class="form-horizontal register">
                @csrf
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <fieldset id="address">

                        <div class="">
                            <label class="control-label" for="input-company">Begleitung</label>
                            <input type="text" name="company" value="" placeholder="Begleitung" id="input-company"
                                class="form-control" required />
                        </div>
                        <div class="required">
                            <label class="control-label" for="input-address-1">Adresse 1</label>
                            <input type="text" name="address_1" value="" placeholder="Adresse  1" id="input-address-1"
                                class="form-control" required />
                        </div>
                        <div class="">
                            <label class="control-label" for="input-address-2">Adresse 2</label>
                            <input type="text" name="address_2" value="" placeholder="Adresse  2" id="input-address-2"
                                class="form-control" required />
                        </div>
                        <div class="required">
                            <label class="control-label" for="input-city">Stadt</label>
                            <input type="text" name="city" value="" placeholder="Stadt" id="input-city"
                                class="form-control" required />
                        </div>
                        <div class="required">
                            <label class="control-label" for="input-postcode">Postleitzahl</label>
                            <input type="text" name="postcode" value="" placeholder="Postleitzahl" id="input-postcode"
                                class="form-control" required />
                        </div>
                        <div class="required">
                            <label class="control-label" for="input-country">Land</label>
                            <select name="country_id" id="input_country" class="form-control" required>
                                <option value=""> --- Please Country --- </option>
                                @forelse ($country as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="required">
                            <label class="control-label" for="input-zone">Region / Bundesland</label>
                            <select name="zone_id" id="input_zone" class="form-control" required> </select>
                        </div>
                    </fieldset>

                    <div class="buttons">

                        <div class="button-register">
                            <input type="submit" value="Fortsetzen" class="btn btn-gray" />
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
    $("#address_form").validate({
        ignore: [],
        rules: {

            company: {
                required: true,
            },
            address_1: {
                required: true,
            },
            address_2: {
                required: true,
            },
            city: {
                required: true,
            },
            postcode: {
                required: true,
                number: true
            },
            country_id: {
                required: true,
            },
            zone_id: {
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
<script>
$(document).on("change", "#input_country", function() {
    var country_id = $(this).val();
    $.ajax({
        url: '{{route("user.getState")}}',
        method: 'post',
        data: {
            "_token": "{{csrf_token()}}",
            country_id: country_id
        },
        success: function(res) {
            $("#input_zone").html(res);
        }
    });
});
</script>
@endsection