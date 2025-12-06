<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Estonia&display=swap" rel="stylesheet">
    <title>Online Kamagra Store</title>
</head>

<body
    style="margin: 0 !important;padding: 0 0px;background-color: #dbdbdb7d;display: flex;align-items: center;justify-content: center;height: 100vh;">
    <div class="main"
        style="border-top: 1px solid #80808014;margin: 0 auto;background: white;width: 600px;max-width: 600px;padding: 60px 25px;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;">
        <div class="images-logo">
            {{-- <img src="http://wedtastik.aio-groups.com/images/img/logonew.png" alt="Wedtastik"
                style="height: 104px;object-fit: contain;margin: 0 auto;display: block;"> --}}
        </div>
        <div class="thank-you-acc">
            <p
                style="    font-family: 'Estonia', cursive;text-align: center;margin-top: 30px;margin-bottom: 0;font-size: 52px;padding: 8px 20px 0 20px;line-height: 42px;text-transform: capitalize;color: #000000;">
                Bestellung bestätigen.
            </p>
            <p
                style="margin-bottom: 0 !important;text-align: center;margin-top: 11px;margin-bottom: 0;font-size: 18px;padding: 8px 54px 0 54px;">
                <p>Lieber {{ $shipping_firstname }},</p>
            </p>
            <p>Wir haben Ihre Bestellungen erhalten und Ihre Bestellnummer lautet <strong>{{$auto_order_id}}</strong> .
                Wir werden es schnellstmöglich bearbeiten.
                
                Vielen Dank für den Kauf
                onlinekamagrastore.com</p>
                <p><b>Bitcoin Transfer</b></p>
                <!--<p><span><b>ACCOUNT HOLDER NAME :</b>  Anil Pawar </span></p>-->
                <!--<p><span><b>IBAN NUMBER :</b>  920010016249077 </span></p>-->
                <!--<p><span><b>Swift Code :</b>  AXISINBB183 </span></p>-->
                <span><b>Bitcoin Wallet :</b>  3GyVgsZ1DHVNWBDan5vbegX91jxtojr4xy </span>
                <img src="https://onlinekamagrastore.com/assets/client2/images/bitcoin.jpeg"
                alt="OnlineKamagraStore" style="
                                    width: 150px;
                                ">
                <div style="border: 1px solid gray">

                    <div style="width: 100%;display:flex">
                        <div style="border-left: 1px solid gray;width: 25%;text-align:center;">Product</div>
                        <div style="border-left: 1px solid gray;width: 25%;text-align:center;">Quantity}</div>
                        <div style="border-left: 1px solid gray;width: 25%;text-align:center;">Price</div>
                    </div>
                    @foreach ($orders as $item)
                    <div style="width: 100%;display:flex">
                        <div style="border-left: 1px solid gray;width: 25%;text-align:center;">{{$item['variant']['product']['name']}} ({{$item['variant']['count']}} {{$item['variant']['unit_type']}})</div>
                        <div style="border-left: 1px solid gray;width: 25%;text-align:center;">{{$item['quantity']}}</div>
                        <div style="border-left: 1px solid gray;width: 25%;text-align:center;">€ {{$item['total_price']}}</div>
                    </div>
                    @endforeach
                </div>
                <div style="width: 100%;display:flex;border: 1px solid gray;">
                    <div style="width: 25%;text-align:center;"></div>
                    <div style="border-left: 1px solid gray;width: 25%;text-align:center;">Total</div>
                    <div style="border-left: 1px solid gray;width: 25%;text-align:center;">€ {{$total_amount_paid}}</div>
                </div>
                
        </div>
    </div>
</body>

</html>


