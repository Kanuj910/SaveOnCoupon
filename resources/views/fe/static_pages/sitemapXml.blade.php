<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>{{ route('page.home') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>Daily</changefreq>
        <priority>1</priority>
    </url>
    @foreach($data['stores'] as $store)
    <url>
        <loc>{{ route('page.store', $store->seo_url) }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
    @foreach($data['categories'] as $category)
    <url>
        <loc>{{ route('page.category', $category->seo_url) }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>