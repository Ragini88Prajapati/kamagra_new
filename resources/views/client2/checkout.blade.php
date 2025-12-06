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
                <li><a href="#">EINKAUFSWAGEN </a>
                </li>
                <li><a href="#">KASSE</a>
                </li>
            </ul>
        </div>
    </div>
</div><!-- /.bt-breadcrumb -->
@if(\Session::has('error'))
<div class="alert alert-danger">{{ \Session::get('error') }}</div>
{{ \Session::forget('error') }}
@endif
@if(\Session::has('success'))
<div class="alert alert-success">{{ \Session::get('success') }}</div>
{{ \Session::forget('success') }}
@endif
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12 min-height-content">
            <h1>Kasse</h1>
            <div class="checkout">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading active">
                            <h4 class="panel-title"><a href="#collapse-checkout-option" data-toggle="collapse"
                                    data-parent="#accordion">SCHRITT 1: CHECKOUT-OPTIONEN</a></h4>
                        </div>
                        <div class="panel-collapse collapse {{Auth::check() ? '' : 'in'}}"
                            id="collapse-checkout-option">
                            <div class="panel-body">
                                <div class="row new-cust-row">
                                    <div class="col-sm-6 left-content login-bg">
                                        <h3>NEUKUNDE</h3>
                                        <p><span>Checkout-Optionen:<span></span></span>
                                        </p>
                                        <div class="radio">
                                            <label>
                                                <input name="account" value="register" checked="checked" type="radio">
                                                Account registrieren</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input name="account" value="guest" type="radio"> Gastkasse</label>
                                        </div>
                                        <p>Durch die Erstellung eines Kontos können Sie schneller einkaufen, über den
                                            Status einer Bestellung auf dem Laufenden bleiben und Ihre zuvor getätigten
                                            Bestellungen verfolgen.</p>
                                        <input value="Fortsetzen" id="button-account" data-loading-text="Loading..."
                                            class="btn btn-gray continue-form1" type="button">
                                    </div>
                                    <div class="col-sm-6 right-content login-bg">
                                        <h3>WIEDERKEHRENDER KUNDE</h3>
                                        <p>Ich bin ein wiederkehrender Kunde</p>
                                        <form action="{{route('client.ajax-authenticate')}}" method="post"
                                            id="login_form">
                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label" for="input-email">Email</label>
                                                <input name="email" value="" placeholder="E-Mail" id="input-email"
                                                    class="form-control" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="input-password">Passwort</label>
                                                <input name="password" value="" placeholder="Passwort"
                                                    id="input-password" class="form-control" type="password">
                                            </div>
                                            <input value="Einloggen " id="button-login" data-loading-text="Loading..."
                                                class="btn btn-gray" type="submit">
                                            <a class="forgotten" href="#">Passwort vergessen</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.panel -->
                    <form class="form-horizontal" id="address_form" action="{{route('processTransaction')}}"
                        method="post">
                        @csrf
                        <div class="panel panel-default shipping-panel">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#collapse-payment-address" data-toggle="collapse"
                                        data-parent="#accordion">Schritt 2: Lieferdetails</a></h4>
                            </div>
                            <div class="panel-collapse collapse {{Auth::check() ? 'in' : ''}}"
                                id="collapse-payment-address">
                                <div class="panel-body">
                                    {{-- @if(Auth::check() && isset($shipping_details) && !empty($shipping_details)) --}}
                                    <div class="existing_shipping"
                                        style="display: {{(Auth::check() && isset($shipping_details) && count($shipping_details) > 0) ? 'block' : 'none'}};">
                                        <div class="radio ">
                                            <label>
                                                <input type="radio" name="shipping_address_type" value="existing"
                                                    checked="checked" /> I want to use an existing address
                                            </label>
                                        </div>
                                        <div id="shipping-existing" class="">
                                            <select name="shipping_address_id" class="form-control" required="required">
                                                <option value="">Select Address</option>
                                                @if (isset($shipping_details))
                                                @foreach($shipping_details as $shipping_detail)
                                                <option value="{{$shipping_detail->id}}">
                                                    {{$shipping_detail->shipping_firstname}}
                                                    {{$shipping_detail->shipping_lastname}},
                                                    {{$shipping_detail->shipping_address}},
                                                    {{$shipping_detail->shipping_city}}-{{$shipping_detail->shipping_pincode}}
                                                </option>
                                                @endforeach

                                                @endif
                                            </select>
                                            @if($errors->has('shipping_address_id'))
                                                <div class="error">{{ $errors->first('shipping_address_id') }}</div>
                                            @endif
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="shipping_address_type" value="new"
                                                    id="new-address"
                                                    {{(Auth::check() && isset($shipping_details) && count($shipping_details) > 0) ? '' : 'checked'}} />
                                                I want to use a
                                                new address
                                            </label>
                                        </div>
                                    </div>
                                    <br />

                                    {{-- @else --}}
                                    <div class="new_shipping"
                                        style="display: {{(Auth::check() && isset($shipping_details) && count($shipping_details) > 0) ? 'none' : 'block'}};">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div id="" style="">
                                                <h3>Persönliche Informationen </h3>
                                                <div class="required">
                                                    <label class="control-label"
                                                        for="input-payment-firstname">Vorname</label>
                                                    <input type="text" name="shipping_firstname" value=""
                                                        placeholder="Vorname" id="input-payment-firstname"
                                                        class="form-control" required />
                                                        @if($errors->has('shipping_firstname'))
                                                            <div class="error">{{ $errors->first('shipping_firstname') }}</div>
                                                        @endif
                                                </div>
                                                <div class="required">
                                                    <label class="control-label"
                                                        for="input-payment-lastname">Familien-oder Nachname</label>
                                                    <input type="text" name="shipping_lastname" value=""
                                                        placeholder="Familien-oder Nachname" id="input-payment-lastname"
                                                        class="form-control" required />
                                                        @if($errors->has('shipping_lastname'))
                                                            <div class="error">{{ $errors->first('shipping_lastname') }}</div>
                                                        @endif
                                                </div>
                                                <div class="required">
                                                    <label class="control-label" for="input-payment-email">Email</label>
                                                    <input type="email" name="shipping_email_id" value=""
                                                        placeholder="Email" id="input-payment-email"
                                                        class="form-control" required />
                                                        @if($errors->has('shipping_email_id'))
                                                        <div class="error">{{ $errors->first('shipping_email_id') }}</div>
                                                    @endif
                                                </div>
                                                <div class="required">
                                                    <label class="control-label"
                                                        for="input-payment-telephone">Telefon</label>
                                                    <input type="text" name="shipping_mobile_number" value=""
                                                        placeholder="Telefon" id="input-payment-telephone"
                                                        class="form-control" />
                                                        @if($errors->has('shipping_mobile_number'))
                                                        <div class="error">{{ $errors->first('shipping_mobile_number') }}</div>
                                                    @endif
                                                </div>
                                                {{-- <div class="">
                                                    <label class="control-label" for="input-payment-fax">Fax</label>
                                                    <input type="text" name="shipping_fax" value="" placeholder="Fax"
                                                        id="input-payment-fax" class="form-control" required />
                                                </div> --}}
                                                <div class="register">
                                                    <label class="control-label"
                                                        for="input-payment-fax">Passwort</label>
                                                    <input type="hidden" name="account_type" value="register">
                                                    <input type="password" name="password" value=""
                                                        placeholder="Passwort" id="input-payment-password"
                                                        class="form-control" required />
                                                        @if($errors->has('password'))
                                                        <div class="error">{{ $errors->first('password') }}</div>
                                                    @endif
                                                </div>
                                                <div class="register">
                                                    <label class="control-label" for="input-payment-fax">Kennwort
                                                        bestätigen</label>
                                                    <input type="password" name="confirm_password" value=""
                                                        placeholder="Kennwort bestätigen" id="input-payment-cpassword"
                                                        class="form-control" required />
                                                        @if($errors->has('confirm_password'))
                                                        <div class="error">{{ $errors->first('confirm_password') }}</div>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div id="" style="">
                                                <h3>MEINE ADRESSE </h3>

                                                {{-- <div class="">
                                                    <label class="control-label"
                                                        for="input-payment-company">Begleitung</label>
                                                    <input type="text" name="shipping_company" value=""
                                                        placeholder="Begleitung" id="input-payment-company"
                                                        class="form-control" required />
                                                </div>
                                                <div class="">
                                                    <label class="control-label"
                                                        for="input-payment-company-number">Firmennummer</label>
                                                    <input type="text" name="shipping_company_number" value=""
                                                        placeholder="Firmennummer" id="input-payment-company-number"
                                                        class="form-control" required />
                                                </div> --}}
                                                <div class="required">
                                                    <label class="control-label"
                                                        for="input-payment-address-1">Adresse</label>
                                                    <input type="text" name="shipping_address" value=""
                                                        placeholder="Adresse" id="input-payment-address-1"
                                                        class="form-control" required />
                                                        @if($errors->has('shipping_address'))
                                                        <div class="error">{{ $errors->first('shipping_address') }}</div>
                                                    @endif
                                                </div>
                                                {{-- <div class="">
                                                    <label class="control-label"
                                                        for="input-payment-address-2">Adresszusatz</label>
                                                    <input type="text" name="shipping_address2" value=""
                                                        placeholder="Adresszusatz" id="input-payment-address-2"
                                                        class="form-control" required />
                                                </div> --}}
                                                <div class="required">
                                                    <label class="control-label" for="input-payment-city">Stadt</label>
                                                    <input type="text" name="shipping_city" value="" placeholder="Stadt"
                                                        id="input-payment-city" class="form-control" required />
                                                        @if($errors->has('shipping_city'))
                                                        <div class="error">{{ $errors->first('shipping_city') }}</div>
                                                    @endif
                                                </div>
                                                <div class="required">
                                                    <label class="control-label"
                                                        for="input-payment-postcode">Postleitzahl</label>
                                                    <input type="text" name="shipping_pincode" value=""
                                                        placeholder="Postleitzahl" id="input-payment-postcode"
                                                        class="form-control" required />
                                                        @if($errors->has('shipping_pincode'))
                                                        <div class="error">{{ $errors->first('shipping_pincode') }}</div>
                                                    @endif
                                                </div>
                                                <div class="required">
                                                    <label class="control-label" for="input_country">Land</label>
                                                    <select name="shipping_country" id="shipping_country"
                                                        class="form-control">
                                                        <option value=""> --- Please Country --- </option>
                                                        @forelse ($country as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @empty

                                                        @endforelse
                                                    </select>
                                                    @if($errors->has('shipping_country'))
                                                        <div class="error">{{ $errors->first('shipping_country') }}</div>
                                                    @endif
                                                </div>
                                                <div class="required">
                                                    <label class="control-label" for="input-payment-zone">
                                                        Zustand</label>
                                                    <select name="shipping_state_id" id="shipping_state"
                                                        class="form-control" required>
                                                    </select>
                                                    @if($errors->has('shipping_state_id'))
                                                        <div class="error">{{ $errors->first('shipping_state_id') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @endif --}}
                                    <div class=" ">
                                        <label>
                                            <input type="checkbox" name="same_billing_address" value="1" />
                                            Meine Liefer- und Rechnungsadresse stimmen überein.
                                        </label>
                                    </div>
                                    <div class="buttons clearfix">
                                        <div class="pull-left">
                                            <input type="button" value="Fortsetzen" id="button-payment-address "
                                                data-loading-text="Loading..." class="btn btn-gray continue-form" />
                                        </div>
                                    </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div><!-- /.panel -->
                        <div class="panel panel-default billing-panel">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#collapse-shipping-address" data-toggle="collapse"
                                        data-parent="#accordion">SCHRITT 3: RECHNUNGSDETAILS</a></h4>
                            </div>
                            <div class="panel-collapse collapse " id="collapse-shipping-address">
                                <div class="panel-body">
                                    <div class="existing_billing"
                                        style="display: {{(Auth::check() && isset($billing_details) && count($billing_details) > 0) ? 'block' : 'none'}};">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="billing_address_type" value="existing"
                                                    checked="checked" /> I want to use an existing address</label>
                                        </div>
                                        {{-- <div id="billing-existing">
                                            <select name="address_id" class="form-control">
                                                <option value="4" selected="selected">Agus Budi, dsadsa, asdas, Ceredigion,
                                                    United Kingdom</option>
                                            </select>
                                        </div> --}}
                                        <div id="billing-existing" class="">
                                            <select name="billing_address_id" class="form-control" required="required">
                                                <option value="">Select Address</option>
                                                @if (isset($billing_details))
                                                @foreach($billing_details as $billing_detail)
                                                <option value="{{$billing_detail->id}}">
                                                    {{$billing_detail->billing_firstname}}
                                                    {{$billing_detail->billing_lastname}},
                                                    {{$billing_detail->billing_address}},
                                                    {{$billing_detail->billing_city}}-{{$billing_detail->billing_pincode}}
                                                </option>
                                                @endforeach

                                                @endif
                                            </select>
                                            @if($errors->has('billing_address_id'))
                                                        <div class="error">{{ $errors->first('billing_address_id') }}</div>
                                                    @endif
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="billing_address_type" value="new"
                                                    {{(Auth::check() && isset($billing_details) && count($billing_details) > 0) ? '' : 'checked'}} />
                                                I want to use a
                                                new address</label>
                                        </div>
                                        <br />
                                    </div>
                                    <div class="new_billing"
                                        style="display: {{(Auth::check() && isset($billing_details) && count($billing_details) > 0) ? 'none' : 'block'}};">
                                        <div id="billing-new">
                                            <div class="required">
                                                <label class="control-label"
                                                    for="input-shipping-firstname">Vorname</label>
                                                <input type="text" name="billing_firstname" value=""
                                                    placeholder="Vorname" id="input-shipping-firstname"
                                                    class="form-control" />
                                                    @if($errors->has('billing_firstname'))
                                                        <div class="error">{{ $errors->first('billing_firstname') }}</div>
                                                    @endif
                                            </div>
                                            <div class="required">
                                                <label class="control-label"
                                                    for="input-shipping-lastname">Nachname</label>
                                                <input type="text" name="billing_lastname" value=""
                                                    placeholder="Nachname" id="input-shipping-lastname"
                                                    class="form-control" />
                                                    @if($errors->has('billing_firstname'))
                                                    <div class="error">{{ $errors->first('billing_firstname') }}</div>
                                                @endif 
                                                {{-- <div class="">
                                                    <label class="control-label"
                                                        for="input-shipping-company">Begleitung</label>
                                                    <input type="text" name="billing_company" value=""
                                                        placeholder="Begleitung" id="input-shipping-company"
                                                        class="form-control" />
                                                </div> --}}
                                            </div>
                                                <div class="required">
                                                    <label class="control-label" for="input-shipping-address-1">Adresse
                                                        1</label>
                                                    <input type="text" name="billing_address" value=""
                                                        placeholder="Adresse 1" id="input-shipping-address-1"
                                                        class="form-control" />
                                                        @if($errors->has('billing_address'))
                                                        <div class="error">{{ $errors->first('billing_address') }}</div>
                                                    @endif
                                                </div>
                                                <div class="">
                                                    <label class="control-label" for="input-shipping-address-2">Adresse
                                                        2</label>
                                                    <input type="text" name="billing_address2" value=""
                                                        placeholder="Adresse 2" id="input-shipping-address-2"
                                                        class="form-control" />
                                                        @if($errors->has('billing_address2'))
                                                        <div class="error">{{ $errors->first('billing_address2') }}</div>
                                                    @endif
                                                </div>
                                                <div class="required">
                                                    <label class="control-label" for="input-shipping-city">Stadt</label>
                                                    <input type="text" name="billing_city" value="" placeholder="Stadt"
                                                        id="input-shipping-city" class="form-control" />
                                                        @if($errors->has('billing_city'))
                                                        <div class="error">{{ $errors->first('billing_city') }}</div>
                                                    @endif
                                                </div>
                                                <div class="required">
                                                    <label class="control-label"
                                                        for="input-shipping-postcode">Postleitzahl</label>
                                                    <input type="text" name="billing_zip_code" value="242355"
                                                        placeholder="Postleitzahl" id="input-shipping-postcode"
                                                        class="form-control" />
                                                        @if($errors->has('billing_zip_code'))
                                                        <div class="error">{{ $errors->first('billing_zip_code') }}</div>
                                                    @endif
                                                </div>
                                                <div class="required">
                                                    <label class="control-label"
                                                        for="input-shipping-country">Land</label>
                                                    <select name="billing_country" id="billing_country"
                                                        class="form-control">
                                                        <option value=""> --- Please Select --- </option>
                                                        @forelse ($country as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @empty

                                                        @endforelse
                                                    </select>
                                                    @if($errors->has('billing_country'))
                                                        <div class="error">{{ $errors->first('billing_country') }}</div>
                                                    @endif
                                                </div>
                                                <div class="required">
                                                    <label class="control-label" for="input-shipping-zone">Region /
                                                        Bundesland</label>
                                                    <select name="billing_state" id="billing_state"
                                                        class="form-control">
                                                    </select>
                                                    @if($errors->has('billing_state'))
                                                        <div class="error">{{ $errors->first('billing_state') }}</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                    <div class="buttons clearfix">
                                        <div class="pull-left">
                                            <input type="button" value="Fortsetzen" id="button-shipping-address "
                                                data-loading-text="Loading..." class="btn btn-gray continue-form" />
                                        </div>
                                    </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div><!-- /.panel -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#collapse-shipping-method" data-toggle="collapse"
                                        data-parent="#accordion">Schritt 4: Liefermethode</a></h4>
                            </div>
                            <div class="panel-collapse collapse" id="collapse-shipping-method">
                                <div class="panel-body">
                                    <p>Bitte wählen Sie die bevorzugte Versandart für diese Bestellung aus.</p>
                                    <p><strong>Flatrate</strong></p>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="shipping_rate" value="0.00" checked="checked" />
                                            Versandkostenpauschale - € 0.00
                                        </label>
                                    </div>
                                    <p><strong>Kommentare zu Ihrer Bestellung hinzufügen</strong></p>
                                    <p><textarea name="shipping_comment" rows="8" class="form-control"></textarea></p>
                                    <div class="buttons">
                                        <div class="pull-left">
                                            <input type="button" value="Fortsetzen" id="button-shipping-method "
                                                data-loading-text="Loading..." class="btn btn-gray continue-form" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.panel -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#collapse-payment-method" data-toggle="collapse"
                                        data-parent="#accordion">Schritt 5: Zahlungsmethode</a></h4>
                            </div>
                            <div class="panel-collapse collapse" id="collapse-payment-method">
                                <div class="panel-body">
                                    <!--<p>Bitte wählen Sie die bevorzugte Zahlungsmethode für diese Bestellung aus.</p>-->
                                    <!--<div class="radio">-->
                                    <!--    <label>-->
                                    <!--        <input type="radio" name="payment_method" value="paypal" checked="checked"-->
                                    <!--            required />Paypal-->
                                    <!--    </label>-->
                                    <!--</div> -->
                                    <div class="radio">
                                        <label>
                                            <input type="radio" id="bank" name="payment_method" value="bank" checked="checked"
                                                required />SEPA Payment
                                        </label>
                                    </div>
                                    <div id="bank_data">
                                      
                                        <span><b>ACCOUNT HOLDER NAME :</b>    Aaliya Mohammad Afzal Shaikh </span>
                                        <br>
                                        <span><b>IBAN NUMBER :</b>   BE41 9677 5952 4110 </span>
                                        <br>
                                        
                                        <span><b>BIC Code :</b>  TRWIBEB1XXX </span><br>
                                        <span><b>Bank Name :</b>  Wise </span><br>
                                        <span><b>Bank Address :</b>  Rue du Trône 100, 3rd floor Brussels 1050 Belgium </span><br>
                                    </div>
                                    {{-- <div class="radio">
                                        <label>
                                            <input type="radio" id="bitcoin" name="payment_method" value="bitcoin"
                                                required />Bitcoin
                                        </label>
                                    </div>
                                    <div id="bitcoin-wallet-id" style="display:none;">
                                        <span><b>Bitcoin Wallet Id :</b> 3GyVgsZ1DHVNWBDan5vbegX91jxtojr4xy </span>
                                        <br>
                                    </div>
                                    <label>Tansaction Id</label>
                                    <input type="text" name="bitcoin_transaction_id" required> --}}
                                    <p><strong>Kommentare zu Ihrer Bestellung hinzufügen</strong></p>
                                    <p><textarea name="payment_comment" rows="8" class="form-control"></textarea></p>
                                    <div class="buttons">
                                        <div class="pull-left read-agreement">
                                            <input type="checkbox" name="agree_terms" value="1" required />
                                            &nbsp;Ich habe die <a href="#" class="agree"><b> AGB gelesen und stimme
                                                    ihnen zu</b></a> <br />
                                            <div for="agree_terms" class="error" style="display: none;">Dieses Feld ist
                                                erforderlich.</div>
                                            <input type="button" value="Fortsetzen" id="button-payment-method "
                                                data-loading-text="Loading..." class="btn btn-gray continue-form" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.panel -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#collapse-checkout-confirm" data-toggle="collapse"
                                        data-parent="#accordion">Schritt 6: Bestellung bestätigen</a></h4>
                            </div>
                            <div class="panel-collapse collapse" id="collapse-checkout-confirm">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td class="name">PRODUKTNAME</td>
                                                    <td class="model">PILLENZAHL</td>
                                                    <td class="quantity">MENGE</td>
                                                    <td class="product-price">STÜCKPREIS</td>
                                                    <td class="total">GESAMT</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cart_data['cart_product_list'] as $item)
                                                @php
                                                $product = Product::where('id',$item['product_id'])->first();
                                                @endphp
                                                <tr>
                                                    <td class="name">
                                                        <a href="{{route('client.product.product-preview',$product->slug)}}"
                                                            target="_blank">{{$product->name}}</a>
                                                        {{-- <br /> &nbsp;<small> - Color: Pink</small> --}}
                                                    </td>
                                                    {{-- <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    --}}
                                                    <td class="model">{{$item['count']}}</td>
                                                    {{-- <input type="hidden" name="count" value="{{$item['count']}}">
                                                    --}}
                                                    <td class="quantity">{{$item['quantity']}}</td>
                                                    {{-- <input type="hidden" name="count" value="{{$item['count']}}">
                                                    --}}
                                                    <td class="product-price">€ {{$item['price']}}</td>
                                                    <td class="total">€ {{$item['total_price']}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" class="text-right">Zwischensumme:</td>
                                                    <td class="text-right">€ {{$cart_data['cart_total_price']}}</td>
                                                    <input type="hidden" name="sub_total"
                                                        value="{{$cart_data['cart_total_price']}}">
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">Versandkostenpauschale:</td>
                                                    <td class="text-right">€ 0.00</td>
                                                    <input type="hidden" name="shipping_rate" value="0">
                                                </tr>
                                                {{-- <tr>
                                                    <td colspan="4" class="text-right">Eco Tax (-2.00):</td>
                                                    <td class="text-right">€ 8.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">VAT (20%):</td>
                                                    <td class="text-right">€ 79.00</td>
                                                </tr> --}}
                                                <tr>
                                                    <td colspan="4" class="text-right">Gesamt: </td>
                                                    <td class="text-right">€ {{$cart_data['cart_total_price']}}</td>
                                                    <input type="hidden" name="total"
                                                        value="{{$cart_data['cart_total_price']}}">
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="buttons">
                                        <div class="pull-right">
                                            <input type="submit" value="Bestellung bestätigen" id="button-confirm "
                                                class="btn btn-primary continue-form" data-loading-text="Loading..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.panel -->
                    </form>
                </div>
            </div><!-- /.checkout -->
        </div><!-- /#content -->
    </div><!-- /.row -->
</div><!-- /.container -->

@endsection

@section('scripts')
<script>
$(document).on("click", ".continue-form", function() {
    if ($("#address_form").valid()) {
        console.log('valid');
        $(this).closest('.panel.panel-default').find('.panel-collapse.collapse').removeClass('in');
        if ($(this).closest('.panel.panel-default').hasClass('shipping-panel') && $(
                'input[name="same_billing_address"]').is(':checked')) {
            $(this).closest('.panel.panel-default').next().next().find('.panel-collapse.collapse').addClass(
                'in');
        } else {
            $(this).closest('.panel.panel-default').next().find('.panel-collapse.collapse').addClass('in');
        }
        // $("#address_form").submit();
    }
});
$(document).on("click", ".continue-form1", function() {

    $(this).closest('.panel.panel-default').find('.panel-collapse.collapse').removeClass('in');
    $('.shipping-panel').find('.panel-collapse.collapse').addClass('in');

});

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
        messages: {},
        // submitHandler: function(form){
        //     $.ajax({
        //         url: form.action,
        //         type: form.method,
        //         data: $(form).serialize(),
        //         success: function(response) {
        //             if(response=='1'){
        //                 // window.location.reload();   
        //             }
        //             if(response=='2'){
        //                 alert("Something went wrong");   
        //             }
        //             // $('#answers').html(response);
        //         }            
        //     });		
        // }
    });
    $.validator.addMethod("pwcheck",
        function(value, element) {
            return /^[A-Za-z0-9]+$/.test(value);
        });
    // c
    $("#address_form").validate({
        // ignore: [],
        rules: {
            firstname: {
                required: true,
            },
            lastname: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            telephone: {
                required: true,
                number: true
            },
            fax: {
                required: true,
                number: true
            },
            company: {
                required: true,
            },
            company_number: {
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
        messages: {},
        // submitHandler: function(form){
        //     $.ajax({
        //         url: form.action,
        //         type: form.method,
        //         data: $(form).serialize(),
        //         success: function(response) {
        //             if(response=='1'){
        //                 // window.location.reload();   
        //             }
        //             if(response=='2'){
        //                 alert("Something went wrong");   
        //             }
        //             // $('#answers').html(response);
        //         }            
        //     });		
        // }
    });
    $.validator.addMethod("pwcheck",
        function(value, element) {
            return /^[A-Za-z0-9]+$/.test(value);
        });
    // });
});

$(document).on("change", "#shipping_country", function() {
    var country_id = $(this).val();
    $.ajax({
        url: '{{route("user.getState")}}',
        method: 'post',
        data: {
            "_token": "{{csrf_token()}}",
            country_id: country_id
        },
        success: function(res) {
            $("#shipping_state").html(res);
        }
    });
});

$(document).on("change", "#billing_country", function() {
    var country_id = $(this).val();
    $.ajax({
        url: '{{route("user.getState")}}',
        method: 'post',
        data: {
            "_token": "{{csrf_token()}}",
            country_id: country_id
        },
        success: function(res) {
            $("#billing_state").html(res);
        }
    });
});

$(document).on('change', 'input[name="payment_method"]', function() {
    var pay_mode = $(this).val();
    if (pay_mode == 'bitcoin') {
        $('#bitcoin-wallet-id').show();
    } else {
        $('#bitcoin-wallet-id').hide();
    }
    if (pay_mode == 'bank') {
        $('#bank_data').show();
    } else {
        $('#bank_data').hide();
    }
});

$(document).on('change', 'input[name="account"]', function() {
    var account = $(this).val();
    if (account == 'register') {
        $('input[name="account_type"]').val('register');
        $('.register').show();
    } else {
        $('input[name="account_type"]').val('guest');
        $('.register').hide();
    }
});

$(document).on('change', 'input[name="shipping_address_type"]', function() {
    var shipping_address_type = $(this).val();
    if (shipping_address_type == 'existing') {
        $('#shipping-existing').show();
        $('.new_shipping').hide();
    } else {
        $('.new_shipping').show();
        $('#shipping-existing').hide();
    }
});

$(document).on('change', 'input[name="billing_address_type"]', function() {
    var billing_address_type = $(this).val();
    if (billing_address_type == 'existing') {
        $('#billing-existing').show();
        $('.new_billing').hide();
    } else {
        $('.new_billing').show();
        $('#billing-existing').hide();
    }
});

// $(document).on('change','input[name="same_billing_address"]',function(){      
//     // var same_billing_address = $(this).val();
//     if($(this).is(':checked')){
//         $('.billing-panel').removeClass('panel-collapse collapse');
//     }else{
//         $('.billing-panel').addClass('panel-collapse collapse');
//     }
// });
</script>
@endsection