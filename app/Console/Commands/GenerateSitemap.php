<?php

namespace App\Console\Commands;

use App\Models\Posts\Posts;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $postsitmap = Sitemap::create(env('APP_URL'));

        info(env('APP_DEBUG'));
        Posts::get()->each(function (Posts $post) use ($postsitmap) {
            $postsitmap->add(
                Url::create("/{$post->post_title}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });

        if (env('APP_DEBUG') || env('APP_DEBUG') == "true")
            $postsitmap->writeToFile(public_path('sitemap.xml'));
        else
            $postsitmap->writeToFile("/home/stormsco/public_html/new_sgh_public/sitemap.xml");
    }
}
