@php
use App\ProductVariant;
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
                <li><a href="#">MEINE WUNSCHLISTE</a>
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
        <div id="content" class="col-sm-10 col-md-9 col-lg-9">
            <h1 class="block-title">MEINE WUNSCHLISTE</h1>
            <div class="wishlist-info">
                <table class="table">
                    <thead>
                        <tr>
                            <td class="image">BILD</td>
                            <td class="model">PRODUKTNAME</td>
                            <td class="product-price">STÜCKPREIS</td>
                            <td class="action">AKTION</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($wishlist as $item)
                        @php
                        $prod_wish=Product::where('id',$item->product_id)->first();
                        @endphp
                        <tr>
                            <td class="image">
                                <a href="{{ route('client.product.product-preview', [$prod_wish->slug]) }}">
                                    <img src="{{asset('/assets/images/product/').'/'.$prod_wish->image}}"
                                        alt="{{$prod_wish->name}}" title="{{$prod_wish->name}}" style="width: 100px;" />
                                </a>
                            </td>
                            <td class="name">
                                <a
                                    href="{{ route('client.product.product-preview', [$prod_wish->slug]) }}">{{$prod_wish->name}}</a>
                            </td>

                            <td class="product-price">
                                <div class="price"> €{{$prod_wish->price}} </div>
                            </td>
                            <td class="action">
                                {{-- <button type="button" data-toggle="tooltip" title="Add to Cart" class="btn btn-cart"><i
                                        class="fa fa-shopping-cart"></i>
                                </button> --}}
                                <a href="javascript:void(0);" data-toggle="tooltip" title="Remove"
                                    class="btn btn-remove remove-from-wishlist" data-product="{{$prod_wish->id}}">
                                    <i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @empty

                        @endforelse

                        {{-- <tr>
                            <td class="image">
                                <a href="product-detail.php"><img src="images/product/p2-101x125.jpg"
                                        alt="Cashmere cuff vintage Levi maxi" title="Cashmere cuff vintage Levi maxi" />
                                </a>
                            </td>
                            <td class="name"><a href="product-detail.php">Cashmere cuff vintage Levi maxi</a>
                            </td>
                            <td class="model">Product 5</td>
                            <td class="stock">In Stock</td>
                            <td class="product-price">
                                <div class="price"> $122.00 </div>
                            </td>
                            <td class="action">
                                <button type="button" data-toggle="tooltip" title="Add to Cart" class="btn btn-cart"><i
                                        class="fa fa-shopping-cart"></i>
                                </button>
                                <a href="#" data-toggle="tooltip" title="Remove" class="btn btn-remove"><i
                                        class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="image">
                                <a href="product-detail.php"><img src="images/product/p2-101x125.jpg"
                                        alt="Cashmere cuff vintage Levi maxi" title="Cashmere cuff vintage Levi maxi" />
                                </a>
                            </td>
                            <td class="name"><a href="product-detail.php">Cashmere cuff vintage Levi maxi</a>
                            </td>
                            <td class="model">Product 5</td>
                            <td class="stock">In Stock</td>
                            <td class="product-price">
                                <div class="price"> $122.00 </div>
                            </td>
                            <td class="action">
                                <button type="button" data-toggle="tooltip" title="Add to Cart" class="btn btn-cart"><i
                                        class="fa fa-shopping-cart"></i>
                                </button>
                                <a href="#" data-toggle="tooltip" title="Remove" class="btn btn-remove"><i
                                        class="fa fa-times"></i></a>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
            <div class="buttons clearfix">
                <div class="pull-right"><a href="{{route('home.index')}}" class="btn btn-blue">Fortsetzen</a></div>
            </div>
        </div><!-- /#content -->
    </div><!-- /.row -->
</div><!-- /.container -->

@endsection

@section('scripts')

@endsection