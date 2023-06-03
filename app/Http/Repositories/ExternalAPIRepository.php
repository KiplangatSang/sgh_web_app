<?php

namespace App\Http\Repositories;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Factory;
use Illuminate\Support\Str;

class ExternalAPIRepository
{
    public function __construct()
    {
    }

    public function fetchNews($fetchNewsContract, $param, $url)
    {
        //

        $request = new Request();
        $news = null;
        $articles = null;

        $news = $fetchNewsContract->fetchItems($param);

        //header
        $category = $news->header;

        //link not useful
        $link = $news->link;

        //articles
        $articles = $news->articles;

        foreach ($articles as $article) {

            $request['post_id'] = Str::random(12);
            $request['post_category'] = "Sports";
            $request['post_title'] = $category . ". <br> <br>  " .  $article->headline . ". <br>";

            // return $request['post_title'];
            $images =  array();
            $item = array();

            if ($article->images) {
                foreach ($article->images as $post_image) {
                    try {

                        $alt =  $post_image->alt ?? $post_image->caption;
                        $url = $post_image->url;

                        array_push($images, $url);
                    } catch (Exception $e) {
                        info($e->getMessage());
                    }
                }
            }
            try {
                $request['post_top_image'] = json_encode($images);

                $request['post_subtitle'] = $article->description;
                $links  = $article->links;
                $apilinks =  $links->api;
                $item = $fetchNewsContract->fetchItem(null, $apilinks->self->href);

                $post_body = null;
                if (isset($item->headlines)) {
                    //return "item";
                    $post_body = $item->headlines[0]->description . " <br> " . $item->headlines[0]->story;
                } else if (isset($item->videos)) {

                    //return "true";
                    $post_body = $item->videos[0]->headline . ". \n " . '<br><video width="500" height="300"  muted controls>
                <source src="' . $item->videos[0]->links->source->mezzanine->href . '" type="video/mp4"> Your browser does not support the video tag
              </video><br>' . $item->videos[0]->description;
                } else {
                    return "item->videos";
                    continue;
                }

                // $post_body = $item->headlines[0]->description;
                $request['post_body'] = $post_body;
                // return  $post_body;
                $request['post_verification'] = true;
                $request['post_date_published'] = (now());
                $request['post_regulation'] = true;
                $request['post_publish_status'] = true;

                return $request;
            } catch (Exception $e) {

                return $e->getMessage();
                //  return $item;
                info($e->getMessage());
            }
        }

        return "success";
    }
}
