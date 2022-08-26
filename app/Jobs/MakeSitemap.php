<?php

namespace App\Jobs;

use App\Models\Acara;
use App\Models\Artikel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class MakeSitemap implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

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
        foreach ($acara as $item) {
            $sitemap->add(Url::create("/acara/{$item->slug}"));
        }
        $sitemap->writeToFile(public_path('mappingsite.xml'));

        SitemapGenerator::create('https://fajrulislam.or.id')->writeToFile('mappingsite.xml');
        return 'sitemap jadi';
    }
}
