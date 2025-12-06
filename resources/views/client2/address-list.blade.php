@php
use App\Models\Client\Product;
use Illuminate\Support\Facades\DB;

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
            <h1 class="page-title">Adressliste</h1>
            <a href="{{route('client.user.add_address')}}">Adresse hinzufügen</a>
            <table class="table">
                <thead>
                    <th>Adresse</th>
                    <th>Zustand</th>
                    <th>Land</th>
                    <th>Aktion</th>

                </thead>
                <tbody>
                    @php
                    // dd($add_list);
                    @endphp
                    @forelse ($add_list as $item)
                    @php
                    $state=DB::table('as_states')->select('*')
                    ->where('id',$item->shipping_state_id)->first();
                    $country=DB::table('as_countries')->select('*')
                    ->where('id',$item->shipping_country)->first();
                    // dd($state);
                    @endphp
                    <tr>
                        <td>{{$item->shipping_address}} {{$item->shipping_address2}} {{$item->shipping_city}}
                            {{$item->shipping_pincode}} </td>
                        <td>{{isset($state->name)?$state->name:''}}</td>
                        <td>{{isset($country->name)?$country->name:''}}</td>
                        <td><a href="{{route('client.user.address.delete',['ad_id'=>$item->id])}}">löschen</a></td>
                    </tr>

                    @empty
                    Adresse nicht gefunden
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