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
        // $postsitmap = Sitemap::create(env('APP_URL'));

        info("sitemap generated");
        // Posts::get()->each(function (Posts $post) use ($postsitmap) {
        //     $postsitmap->add(
        //         Url::create("/{$post->post_id}")
        //             ->setPriority(0.9)
        //             ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        //     );
        // });

        // $postsitmap->writeToFile(public_path('sitemap.xml'));
    }
}
