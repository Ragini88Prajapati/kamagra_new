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
                    <li><a href="{{route('home.index')}}"><i class="fa fa-home"></i></a>
                    </li>
                    <li><a href="">Product List</a>
                    </li>
                </ul>

                {{-- <div class="search-bar-list">
                    <input class="" id="" type="text" name="" placeholder="Search your Product " autocomplete="">

                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </div>
                </div> --}}
            </div>

        </div>
    </div>
</div><!-- /.bt-breadcrumb -->

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="bt-product-category product-list-grid">
                @forelse ($product_list as $item)
                <div class="bt-item-extra product-layout">
                    <section class="product-thumb bt-item transition">
                        <div class="image">
                            <a href="{{ route('client.product.product-preview', [$item->slug]) }}"> <img
                                    src="{{asset('/assets/images/product/').'/'.$item->image}}" alt="{{$item->name}}" />
                            </a>
                        </div>
                        <div class="small_detail">
                            <div class="caption">
                                <div class="name"> <a href="{{ route('client.product.product-preview', [$item->slug]) }}">{{$item->name}} </a>
                                </div>
                                <div class="rating"> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span
                                        class="fa fa-stack fa-hidden"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack fa-hidden"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                </div>
                                <p class="price"> ${{$item->price}} </p>
                            </div>
                        </div>
                    </section>
                </div>
                    
                @empty
                    
                @endforelse
                
{{--                 
                <div class="bt-item-extra product-layout">
                    <section class="product-thumb bt-item transition">
                        <div class="image">
                            <a href="product-detail.php"> <img
                                    src="{{asset('/assets/client2/images/product/p22-100x100.jpg')}}"
                                    alt="OxyELITE pro" />
                            </a>
                        </div>
                        <div class="small_detail">
                            <div class="caption">
                                <div class="name"> <a href="product-detail.php">OxyELITE
                                        pro</a>
                                </div>
                                <div class="rating"> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span
                                        class="fa fa-stack fa-hidden"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                </div>
                                <p class="price"> $122.00 </p>
                            </div>
                        </div>
                    </section>
                </div><!-- /.bt-item-extra -->
                <div class="bt-item-extra product-layout">
                    <section class="product-thumb bt-item transition">
                        <div class="image">
                            <a href="product-detail.php"> <img
                                    src="{{asset('/assets/client2/images/product/p16-100x100.jpg')}}" alt="nexafed " />
                            </a>
                        </div>
                        <div class="small_detail">
                            <div class="caption">
                                <div class="name"> <a href="product-detail.php">nexafed </a>
                                </div>
                                <div class="rating"> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span
                                        class="fa fa-stack fa-hidden"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack fa-hidden"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                </div>
                                <p class="price"> $200.00 </p>
                            </div>
                        </div>
                    </section>
                </div><!-- /.bt-item-extra -->
                <div class="bt-item-extra product-layout">
                    <section class="product-thumb bt-item transition">
                        <div class="image">
                            <a href="product-detail.php"> <img
                                    src="{{asset('/assets/client2/images/product/p22-100x100.jpg')}}"
                                    alt="OxyELITE pro" />
                            </a>
                        </div>
                        <div class="small_detail">
                            <div class="caption">
                                <div class="name"> <a href="product-detail.php">OxyELITE
                                        pro</a>
                                </div>
                                <div class="rating"> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span
                                        class="fa fa-stack fa-hidden"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                </div>
                                <p class="price"> $122.00 </p>
                            </div>
                        </div>
                    </section>
                </div><!-- /.bt-item-extra -->
                <div class="bt-item-extra product-layout">
                    <section class="product-thumb bt-item transition">
                        <div class="image">
                            <a href="product-detail.php"> <img
                                    src="{{asset('/assets/client2/images/product/p16-100x100.jpg')}}" alt="nexafed " />
                            </a>
                        </div>
                        <div class="small_detail">
                            <div class="caption">
                                <div class="name"> <a href="product-detail.php">nexafed </a>
                                </div>
                                <div class="rating"> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span
                                        class="fa fa-stack fa-hidden"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack fa-hidden"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                </div>
                                <p class="price"> $200.00 </p>
                            </div>
                        </div>
                    </section>
                </div><!-- /.bt-item-extra -->
                <div class="bt-item-extra product-layout">
                    <section class="product-thumb bt-item transition">
                        <div class="image">
                            <a href="product-detail.php"> <img
                                    src="{{asset('/assets/client2/images/product/p22-100x100.jpg')}}"
                                    alt="OxyELITE pro" />
                            </a>
                        </div>
                        <div class="small_detail">
                            <div class="caption">
                                <div class="name"> <a href="product-detail.php">OxyELITE
                                        pro</a>
                                </div>
                                <div class="rating"> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span
                                        class="fa fa-stack fa-hidden"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                </div>
                                <p class="price"> $122.00 </p>
                            </div>
                        </div>
                    </section>
                </div><!-- /.bt-item-extra --> --}}
            </div>

        </div>
    </div>
</div>


@endsection

@section('scripts')

@endsection