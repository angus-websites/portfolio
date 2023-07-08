<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>{{ route('index') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('projects.index') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('about') }}</loc>
        <changefreq>yearly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ route('contact') }}</loc>
        <changefreq>never</changefreq>
        <priority>0.6</priority>
    </url>
</urlset> 