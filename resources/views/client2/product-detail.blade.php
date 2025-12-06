@php
use App\ProductVariant;

@endphp
@extends('layouts.client2')


@section('SEO_Part')

    @if (!empty($product_data->meta_title))
        <title> {{$product_data->meta_title}}
        </title>
    @endif
    
    @if (!empty($product_data->meta_title))
    <title>{{ $product_data->meta_title }}</title> 
    <meta name="title" content="{{$product_data->meta_title}}" />
    @endif
    
    @if (!empty($product_data->meta_description))
    <meta name="description" content="{{$product_data->meta_description}}" />
    @endif
    
    @if (!empty($product_data->meta_keyword))
    <meta name="keyword" content="{{$product_data->meta_keyword}}" />
    @endif
    
    
    <meta name="robots" content="{{$product_data->meta_robot}}" />
    <link rel="canonical" href="{{$product_data->canonical_url}}" />
    
    <meta property="og:type" content="{{$product_data->og_type}}" />
    <meta property="og:title" content="{{$product_data->og_title}}" />
    <meta property="og:description" content="{{$product_data->og_description}}" />
    <meta property="og:url" content="{{$product_data->og_url}}" />
    <meta property="og:site_name" content="{{$product_data->og_site_name}}" />
    
    <meta name="twitter:card" content="{{$product_data->twitter_card}}" />
    <meta name="twitter:site" content="{{$product_data->twitter_site}}" />
    <meta name="twitter:title" content="{{$product_data->twitter_title}}" /> 
    <meta name="twitter:description" content="{{$product_data->twitter_description}}" />

@endsection

@section('title')

@endsection
@section('content')

<div class="container">
    <div class="menu_custom row">
        <!-- /.header_category -->
        <!-- /.header_slider -->
    </div>
</div>
</div><!-- /.boss-new-position -->
</div><!-- /#bt_header -->
<div class="container">
    <div class="menu_custom  row">
        <div id="column-left" class="col-sm-3 col-md-3 col-lg-3 hidden-xs d-none d-lg-block">
            <div class="header_category nofloat">
                <div id="boss-menu-category" class="box">
                    <div class="boss_heading">
                        <div class="box-heading medicine-heading-list">
                            <h1>Kategorien <br> </h1>
                        </div>
                    </div>
                    <div class="box-content">

                        <!-- ragini -->
                        <ul class="box-category boss-menu-cate new-iconarrow sidemenu-medicine">
                            @forelse ($categories as $category)
                            <li>
                                <div class="nav_title">
                                    <i class="fa-solid fa-capsules" aria-hidden="true"></i>
                                    <a class="title" href="{{ route('client2.category-product', $category->id) }}">{{ $category->name }}</a>
                                </div>
                            </li>
                            @empty
                            <p>No categories found.</p>
                            @endforelse
                        </ul>

                        <!-- comment by ragini -->
                        <!-- <ul class="box-category boss-menu-cate new-iconarrow sidemenu-medicine">
                            @forelse ($product_list as $item)
                            <li>
                                <div class="nav_title"> <i class="fa-solid fa-capsules"></i> <a
                                        class="title"
                                        href="{{ route('client.product.product-preview', [$item->slug]) }}">{{ $item->name }}</a>
                                </div>
                            </li>
                            @empty

                            @endforelse

                        </ul> -->

                    </div><!-- /.box-content -->
                </div>
            </div>
        </div><!-- /#column-left -->
        <div id="content" class="col-sm-12 col-md-9 col-lg-9">
            <div class="bt-product-category  product-description-div ">

                <div class="box-heading title product-descrip-title">
                    <h1>{{$product_data->name}}</h1>
                </div>
                <div class="bt-featured-pro bt-nprolarge-tabs product-descrip-content">
                    <div id="bt_procate_00" class="box htabs-content boss-category-pro bt-nprolarge-nslider col-xs-12">
                        <div class="product-categories-box">
                            <div class="product-item">
                                <div class="prod-image">
                                    <img src="{{asset('/assets/images/product/').'/'.$product_data->image}}"
                                        alt="Dermalogica">
                                </div>
                                <div class="prod-info">
                                    <div class="prod-title-subtile">
                                        <h5>{{$product_data->name}}</h5>
                                        <p class="subtitle-para">
                                            WIRKSTOFF: <span class="color-green">TADALAFIL</span>
                                        </p>
                                    </div>
                                    <div class="prod-descrip-para">
                                        <p>
                                            <?php echo $product_data->highlights; ?>
                                        </p>
                                        <div class="we-accept">
                                            <span class="subtitle-para">WIR AKZEPTIEREN:</span>
                                            {{-- <img src="{{asset('/assets/client2/images/visa.svg')}}" alt="">
                                            <img src="{{asset('/assets/client2/images/mastercard.svg')}}" alt="">
                                            <img src="{{asset('/assets/client2/images/paypal.svg')}}" alt="">
                                            <img src="{{asset('/assets/client2/images/sepa.svg')}}" alt="">
                                            <img src="{{asset('/assets/client2/images/bitcoin.svg')}}" alt="">
                                            <img src="{{asset('/assets/client2/images/discover.svg')}}" alt=""> --}}
                                            <img src="{{asset('/assets/client2/images/dhl.jpg')}}" alt="">
                                            <img src="{{asset('/assets/client2/images/bank_transfer.jpg')}}" alt="">
                                        </div>
                                        {{-- <p class="subtitle-para mt-15">
                                            OTHER NAMES FOR THIS MEDICATION
                                        </p>
                                        <div class="prod-otherlinks">
                                            <a href="#">TADALAFILO</a>
                                            <a href="#">TADALAFILUM</a>
                                            <a href="#">TADALIS</a>
                                            <a href="#">REGALIS</a>
                                            <a href="#">APCALIS</a>
                                        </div> --}}


                                    </div>
                                </div>
                                <!-- <div class="prod-info prod-info-wishlist">
                                    <a href="javascript:void(0);" class="add-to-wishlist"
                                        data-product="{{$product_data->id}}">Zur Wunschliste hinzufügen</a>
                                </div> -->
                            </div>
                            {{-- <div class="prod-item-bottomdiv">

                                <div class="zoom-image">
                                    <img src="{{asset('/assets/client2/images/product/p5-100x100.jpg')}}"
                            alt="Dermalogica">
                            <span>
                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                                Zoom
                            </span>
                            <div class="zoom-imgbig-div">
                                <div class="close-icon">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </div>
                                <img src="{{asset('/assets/client2/images/product/p5-100x100.jpg')}}" alt="Dermalogica">
                            </div>
                        </div>
                        <div class="prod-date">
                            <p class="date-month">
                                January
                            </p>
                            <p class="date-value">
                                10
                            </p>
                        </div>

                        <div class="prod-delvry-list">
                            <div class="prod-delivery">
                                <img src="{{asset('/assets/client2/images/airmail.png')}}" alt=""
                                    class="delivery-brand-img">

                                <div class="delivery-country">
                                    <img src="{{asset('/assets/client2/images/india.png')}}" alt="">
                                </div>
                                <div class="prod-delivery-time">
                                    <p>
                                        Delivery period <br>
                                        <span class="delivery-value">
                                            14-21 DAYS
                                        </span>
                                    </p>
                                </div>
                                <div class="prod-vharge">
                                    <p> $9.95 </p>
                                </div>
                                <div class="tracking-prod">
                                    <p>
                                        Tracking# <br>
                                        available in 14 days
                                    </p>
                                </div>
                            </div>

                            <div class="prod-delivery">
                                <img src="{{asset('/assets/client2/images/airmail.png')}}" alt=""
                                    class="delivery-brand-img">

                                <div class="delivery-country">
                                    <img src="{{asset('/assets/client2/images/india.png')}}" alt="">
                                </div>
                                <div class="prod-delivery-time">
                                    <p>
                                        Delivery period <br>
                                        <span class="delivery-value">
                                            14-21 DAYS
                                        </span>
                                    </p>
                                </div>
                                <div class="prod-vharge">
                                    <p> $9.95 </p>
                                </div>
                                <div class="tracking-prod">
                                    <p>
                                        Tracking# <br>
                                        available in 14 days
                                    </p>
                                </div>
                            </div>
                        </div>


                    </div> --}}

                    <div class="product-tablediv">
                        <div class="product-table-title">
                            <h5>
                                {{$product_data->name}}
                            </h5>
                            {{-- <p>
                                        Availability: <sapn class="color-green">In Stock (115 packs)</sapn>
                                    </p> --}}
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-light">
                                    <tr class="table__title">
                                        <th>
                                            <span>PAKET</span>
                                        </th>
                                        <th>
                                            <span>PRO EINHEIT</span>
                                        </th>
                                        <th><span>GESAMTPREIS </span></th>
                                        <th><span>SPEICHERN </span></th>
                                        <th><span>BEFEHL </span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $variantData=ProductVariant::where('product_id',$product_data->id)->get();
                                    @endphp
                                    @forelse ($variantData as $item)
                                    <tr>
                                        <td>
                                            {{$item->count}} {{$item->unit_type}}
                                        </td>
                                        <td class="color-red">
                                            €{{$item->price_per_pills}} EUR
                                        </td>
                                        <td>
                                            €{{$item->price}} EUR <br>
                                            <span class="color-golden">+ {{$item->offer}}</span>
                                        </td>
                                        <td>
                                            {{number_format(($item->price_per_pills*$item->count)-$item->price,2)}}
                                        </td>

                                        <td>
                                            <button class="btn-cart add-to-product-cart" type="button"
                                                data-product="{{$item->id}}">in den Warenkorb legen</button>

                                        </td>
                                    </tr>

                                    @empty

                                    @endforelse

                                    {{-- <tr>
                                                <td>
                                                    60mg × 30 Pills
                                                </td>
                                                <td>
                                                    $2.56 USD
                                                </td>
                                                <td>
                                                    $76.92 USD <br>
                                                    <span class="color-green">+ Bonus - 4 Pills</span>
                                                </td>
                                                <td class="delivery-value">
                                                    $30.60 USD
                                                </td>

                                                <td>
                                                    <button class="btn-cart" type="button">Add to Cart</button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    60mg × 30 Pills
                                                </td>
                                                <td>
                                                    $2.56 USD
                                                </td>
                                                <td>
                                                    $76.92 USD <br>
                                                    <span class="color-green">+ Bonus - 4 Pills</span> <br>
                                                    <span class="color-red"><b>Free</b> Trackable Delivery</span>
                                                </td>
                                                <td class="delivery-value">
                                                    $213.60 USD
                                                </td>

                                                <td>
                                                    <button class="btn-cart" type="button">Add to Cart</button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    60mg × 30 Pills
                                                </td>
                                                <td>
                                                    $2.56 USD
                                                </td>
                                                <td>
                                                    $76.92 USD <br>
                                                    <span class="color-green">+ Bonus - 4 Pills</span>
                                                </td>
                                                <td>
                                                    -
                                                </td>

                                                <td>
                                                    <button class="btn-cart" type="button">Add to Cart</button>

                                                </td>
                                            </tr> --}}

                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- <div class="product-tablediv">
                                <div class="product-table-title">
                                    <h5>
                                        Cialis 60mg
                                    </h5>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class="table-light">
                                            <tr class="table__title">
                                                <th>
                                                    <span>Package</span>
                                                </th>
                                                <th>
                                                    <span>Per Pill</span>
                                                </th>
                                                <th><span>Total Price </span></th>
                                                <th><span>Save </span></th>
                                                <th><span>Order </span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    60mg × 30 Pills
                                                </td>
                                                <td>
                                                    $2.56 USD
                                                </td>
                                                <td>
                                                    $76.92 USD <br>
                                                    <span class="color-green">+ Bonus - 4 Pills</span>
                                                </td>
                                                <td>
                                                    -
                                                </td>

                                                <td>
                                                    <button class="btn-cart" type="button">Add to Cart</button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    60mg × 30 Pills
                                                </td>
                                                <td>
                                                    $2.56 USD
                                                </td>
                                                <td>
                                                    $76.92 USD <br>
                                                    <span class="color-green">+ Bonus - 4 Pills</span>
                                                </td>
                                                <td class="delivery-value">
                                                    $30.60 USD
                                                </td>

                                                <td>
                                                    <button class="btn-cart" type="button">Add to Cart</button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    60mg × 30 Pills
                                                </td>
                                                <td>
                                                    $2.56 USD
                                                </td>
                                                <td>
                                                    $76.92 USD <br>
                                                    <span class="color-green">+ Bonus - 4 Pills</span> <br>
                                                    <span class="color-red"><b>Free</b> Trackable Delivery</span>
                                                </td>
                                                <td class="delivery-value">
                                                    $213.60 USD
                                                </td>

                                                <td>
                                                    <button class="btn-cart" type="button">Add to Cart</button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    60mg × 30 Pills
                                                </td>
                                                <td>
                                                    $2.56 USD
                                                </td>
                                                <td>
                                                    $76.92 USD <br>
                                                    <span class="color-green">+ Bonus - 4 Pills</span>
                                                </td>
                                                <td>
                                                    -
                                                </td>

                                                <td>
                                                    <button class="btn-cart" type="button">Add to Cart</button>

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}

                    <div class="product-example-div">
                        <div class="example-content">
                            <h5>Paketbeispiel</h5>
                            <p>
                                Ihre Bestellung wird sicher verpackt und innerhalb von 24 Stunden versandt. Genau so
                                wird Ihr Paket aussehen (Bilder eines echten Versandstücks). Es hat die Größe und das
                                Aussehen eines normalen Privatbriefes (9,4 x 4,3 x 0,3 Zoll oder 24 x 11 x 0,7 cm) und
                                gibt seinen Inhalt nicht preis
                            </p>
                        </div>
                        <div class="examp-viewdiv">
                            <div class="view">
                                <p>Vorderansicht</p>
                                <img src="{{asset('/assets/client2/images/frontview.png')}}" alt="">
                            </div>
                            <div class="view">
                                <p> Seitenansicht</p>
                                <img src="{{asset('/assets/client2/images/frontview.png')}}" alt="">
                            </div>
                            <div class="view">
                                <p>Rückansicht</p>
                                <img src="{{asset('/assets/client2/images/frontview.png')}}" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="prod-descrip-listdetail">
                        <?php echo $product_data->description ?>
                        {{-- <h5>Cialis Product Description</h5>
                                <p>
                                    Drug Uses <br>

                                    Cialis is a reversible and selective phosphodiesterase inhibitor used to treat
                                    erectile dysfunction and symptoms of benign prostatic hyperplasia in adult males.
                                    The mechanism of Cialis action is based on blocking of phosphodiesterase type 5
                                    enzyme, which affects the smooth muscles of the penis and prevents an erection.

                                    When blocking the enzyme, relaxation of muscle fibers and blood vessels occurs that
                                    improves blood flow into the corpora cavernosa of the penis. Due to the blood flow,
                                    the penis increases in volume and gets hard. When using Cialis, it should be noted
                                    that the drug is not a sexual stimulant and has no effect in the absence of sexual
                                    stimulation.

                                    The therapeutic dose of Cialis is matched individually taking into account the
                                    patient’s tolerability of the drug and the treatment efficiency. The recommended
                                    dose of Cialis is 5 mg per day for the patients with active sexual life (more than
                                    twice a week). If necessary, the daily dose can be reduced to 2.5 mg. the patients
                                    with rare sexual activity (less than twice a week) are prescribed with 10 to 20 mg
                                    of Cialis immediately before sexual activity.
                                </p>
                                <p>
                                    Missed dose <br>
                                    If you use Cialis pills to treat benign prostatic hyperplasia and miss a dose of
                                    this drug, take the next dose of Cialis as soon as you remember. If you miss several
                                    Cialis doses, do not take a double dose to make up the missed pill and take the next
                                    dose of Cialis at the regularly scheduled time.
                                </p>
                                <p>


                                    More Information <br>

                                    The use of Cialis pills before or after drinking alcohol is not contraindicated.
                                    However, the man should be cautioned that the combined use of alcohol with Cialis
                                    may cause dizziness, headache, tachycardia and decrease in blood pressure.
                                </p>
                                <p>

                                    Storage <br>

                                    To protect Cialis pills from moisture and warm, they should be stored in an original
                                    package at below 30°C. Do not keep Cialis pills in a place where children could get
                                    them.
                                </p>
                                <h5>Cialis Safety Information</h5>
                                <hr>
                                <p>
                                    Warnings <br>

                                    Men with anatomical deformation of the penis and men with a predisposition to
                                    priapism should take Cialis pills with caution. Do not take Cialis pills in
                                    conjunction with other drugs for the treatment of erectile dysfunction or with
                                    phosphodiesterase type 5 inhibitors used for the treatment of pulmonary arterial
                                    hypertension (such as, Revatio and Adcirca).
                                </p>
                                <p>

                                    Disclaimer <br>

                                    The Cialis review is provided for informational purposes only, so it does not
                                    constitute a substitute for consultation with the licensed medical professional
                                    specializing in treating/ diagnosing erectile dysfunction or benign prostatic
                                    hyperplasia. The online pharmacy disclaims any responsibility for any loss or damage
                                    arising from the use of information on prostate disease, erectile dysfunction
                                    problems and Cialis.


                                </p>
                                <h5>Cialis Side Effects</h5>
                                <hr>
                                <p>
                                    Men using Cialis pills may experience headache, dyspepsia, flushing, back pain and
                                    muscle pain. More commonly, Cialis causes abdominal pain, nausea, vomiting,
                                    arthralgia and diarrhoea. This drug may cause dizziness in elderly men over 70 years
                                    old. Most of Cialis adverse effects are mild to moderate. The clinical study results
                                    of this drug have demonstrated that no more than 3% of men stopped the treatment of
                                    erectile dysfunction and benign prostatic hyperplasia due to serious adverse
                                    effects.
                                </p> --}}
                    </div>
                </div>
            </div><!-- /.htabs-content -->
        </div><!-- /."bt-featured-pro -->
    </div>

</div>
</div><!-- /#content -->
</div>
</div><!-- /.container -->

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // $('.filter-form-checkbox').on('change',function(){
    //     $("#product-filter-form").submit();
    // });

    $('.add-to-product-cart').on('click', function() {
        product = $(this).data('product');
        $.ajax({
            url: "{{ route('product.add-to-cart') }}",
            type: "POST",
            data: {
                product: product,
                quantity: 1,
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                response_data = JSON.parse(data)
                $(".cart-total-quantity").html("");
                $(".cart-total-quantity").html(response_data.cart_total_quantity);
                alert('Product is added to cart successfully');
                window.location.reload();
            },
            error: function(data) {
                alert('Something went wrong please try again');
            }
        });
    });
});
</script>
@endsection