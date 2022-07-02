<?php
Route::get('/sitemap', function () {
    $sitemap = Sitemap::create()
        ->add(Url::create('/tentang'))
        ->add(Url::create('/blog'))
        ->add(Url::create('/acara'))
        ->add(Url::create('/proyek'));

    $post = Artikel::all();
    foreach ($post as $post) {
        $sitemap->add(Url::create("/blog/{$post->slug}"));
    }
    $acara = Acara::all();
    foreach($acara as $item){
        $sitemap->add(Url::create("/acara/{$item->slug}"));
    }
    $sitemap->writeToFile(public_path('mappingsite.xml'));

    SitemapGenerator::create('https://fajrulislam.or.id')->writeToFile('mappingsite.xml');
    return 'sitemap jadi';
});
