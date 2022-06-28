<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($products as $product)
        <url>
            <loc>{{route('product',$product->slug_2 ??$product->slug )}}</loc>
        </url>
    @endforeach
</urlset>
