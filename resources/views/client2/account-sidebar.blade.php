<div class="box account">
    <div class="box-heading">KONTO</div>
    <div class="box-content">
        <ul>
            @if(Auth::check())
            <li class="{{ Request::fullUrl('home.forgetPassPage') == route('home.forgetPassPage') ? 'active' : '' }}"><a
                    href="{{route('home.forgetPassPage')}}">Passwort vergessen</a></li>
            <li class="{{ Request::fullUrl('home.user-profile') == route('home.user-profile') ? 'active' : '' }}"><a
                    href="{{route('home.user-profile')}}">Mein Konto</a></li>
            <li
                class="{{ Request::fullUrl('client.user.address.list') == route('client.user.address.list') ? 'active' : '' }}">
                <a href="{{route('client.user.address.list')}}">Adressbuch</a>
            </li>
            <li class="{{ Request::fullUrl('home.viewWishlist') == route('home.viewWishlist') ? 'active' : '' }}"><a
                    href="{{route('home.viewWishlist')}}">Wunschzettel</a> </li>
            <li
                class="{{ Request::fullUrl('client.user.order_history') == route('client.user.order_history') ? 'active' : '' }}">
                <a href="{{route('client.user.order_history')}}">Bestellverlauf</a>
            </li>
            <li><a href="#">Downloads</a></li>
            {{-- <li><a href="#">Reward Points</a></li> --}}
            <li><a href="#">Kehrt zurück</a></li>
            <li><a href="#">Transaktionen</a></li>
            <li><a href="#">Newsletter</a></li>
            <li><a href="#">Wiederkehrende Zahlungen</a></li>
            @else
            <li class="{{ Request::fullUrl('login') == route('login') ? 'active' : '' }}"><a
                    href="{{route('login')}}">Anmeldung</a></li>
            <li class="{{ Request::fullUrl('home.signup') == route('home.signup') ? 'active' : '' }}"><a
                    href="{{route('home.signup')}}">Registrieren</a></li>
            @endif
        </ul>
    </div>
</div>