<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    
    <url>
        <loc>{{ route('home.index') }}</loc>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>{{ route('product.product-list') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @foreach ($product_list as $item)
        <url>
            <loc>{{ route('client.product.product-preview', [$item->slug]) }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    
    <url>
        <loc>{{ route('home.blog') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    
    @foreach ($blogs as $value)
        <url>
            <loc>{{route('home.blog-detail',$value->url)}}</loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    
    <url>
        <loc>{{ route('home.free-shipping') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ route('home.satisfaction') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ route('home.delivery-information') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ route('home.privacy-policy') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ route('home.terms-and-refund-policy') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ route('home.contact_us') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ route('home.kamagra-glossary') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ route('home.sexual-enhance') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    
</urlset>