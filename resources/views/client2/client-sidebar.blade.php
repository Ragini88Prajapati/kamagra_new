<div class="header_category  nofloat ">
    <div id="boss-menu-category" class="box">
        <div class="boss_heading">
            <div class="box-heading">
                <h1>Kategorien <br> (Sildenafil Citrate)</h1>
            </div>
        </div>
        <div class="box-content">
            <ul class="box-category boss-menu-cate new-iconarrow">
                @forelse ($product_list as $item)
                    <li>
                        <div class="nav_title"> <i class="fa-solid fa-capsules"></i> <a
                                class="title" href="{{ route('client.product.product-preview', [$item->slug]) }}">{{ $item->name }}</a>
                        </div>
                    </li>
                @empty
                    
                @endforelse

                
            </ul>
        </div><!-- /.box-content -->
    </div>
</div>