@php
use App\ProductVariant;

@endphp
@extends('layouts.client2')

@section('content')
<div class="bt-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="breadcrumb-search-div">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a>
                    </li>
                    <li><a href="">BENUTZERPROFIL</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div><!-- /.bt-breadcrumb -->

<div class="container">
    <div class="main-body user-profile-div">


        <div class="row gutters-sm">
            {{-- <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>John Doe</h4>
                                <p class="text-secondary mb-1">Full Stack Developer</p>
                                <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                <!-- <button class="btn btn-primary">Follow</button>
                                <button class="btn btn-outline-primary">Message</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <column id="column-left" class="col-sm-2 col-md-3 col-lg-3 hidden-xs">
                @include('client2.account-sidebar')

            </column>
            <div class="col-md-8">
                <div class="user-profile-form">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="m-0">Vorname</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{Auth::user()->name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="m-0">Nachname</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{Auth::user()->last_name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="m-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{Auth::user()->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="m-0">Handy, Mobiltelefon</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{Auth::user()->mobile_number}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="m-0">Fax</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{Auth::user()->fax}}
                                </div>
                            </div>
                            <hr>
                            <div class="">
                                <div class="col-sm-12">
                                    <a class="btn btn-info show-edit-form" target=""
                                        href="javascript:void(0);">Bearbeiten</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="userprof-edit-form">
                    <div class="card">
                        <form action="{{route('home.user-profile-update')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vorname</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="firstname" class="form-control"
                                            value="{{Auth::user()->name}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nachname</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="lastname" class="form-control"
                                            value="{{Auth::user()->last_name}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="email" class="form-control"
                                            value="{{Auth::user()->email}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Handy, Mobiltelefon</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="telephone" class="form-control"
                                            value="{{Auth::user()->mobile_number}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Fax</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="fax" class="form-control" value="{{Auth::user()->fax}}"
                                            required>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="col-sm-12 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Änderungen speichern">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $(".show-edit-form").click(function() {
        $(".userprof-edit-form").show();
        $(".user-profile-form").hide();
    });


});
</script>
@endsection