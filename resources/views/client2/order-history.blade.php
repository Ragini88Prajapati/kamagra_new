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
            <h1 class="page-title">Bestellverlauf</h1>
            <table class="table">
                <thead>
                    <th>Auftragsnummer</th>
                    <th>Höhe</th>
                    <th>Datum</th>
                </thead>
                <tbody>
                    @forelse ($order_data as $item)
                    <tr>
                        <td><a href="{{route('home.order-summary',['oid'=>$item->id])}}">{{$item->auto_order_id}}</a>
                        </td>
                        <td>€{{$item->total_amount_paid}}</td>
                        <td>{{$item->created_at}}</td>
                    </tr>

                    @empty
                    Bestellung nicht gefunden
                    @endforelse
                </tbody>
            </table>

        </div><!-- /#content -->
    </div><!-- /.row -->
</div><!-- /.container -->

@endsection

@section('scripts')
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