<?php

namespace App\Http\APIPosts;

use Exception;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ESPNGateway implements FetchNewsContract
{
    private $params = null;

    public function __construct($params = null)
    {

        $this->params = $params;
    }

    public function fetchItems($params = null, $url = null)
    {

        return $this->getNews($params, $url);
    }
    public function fetchItem($params = null, $url = null)
    {
        // return $url;

        return  $this->getNews($params, $url);
    }
    public function fetchSports($params = null)
    {
    }
    public function fetchTechnology($params = null)
    {
    }



    /* get from   safaricom app*/
    public function makeHttp($url, $params)
    {
        $token = "";

        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => array('Content-Type: application/json', 'Authorization:Bearer ' . $token),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($params),

            )

        );
        $curl_response = curl_exec($curl);
        curl_close($curl);
        if (!$curl_response)
            return "error";


        return $curl_response;
    }

    public function getNews($params = null, $url = null)
    {
        $parameters = $params ?? $this->params;

        // $url = "http://site.api.espn.com/apis/site/v2/sports/soccer/:league/news?league=".$parameters;

        $url = $url ?? "http://site.api.espn.com/apis/site/v2/sports/soccer/:league/news?league=" . $parameters;


        try {
            $curl = curl_init($url);
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset=utf8'],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_HEADER => false,
                    // CURLOPT_USERPWD => env('MPESA_CONSUMER_KEY') . ":" . env('MPESA_CONSUMER_SECRET')
                )
            );

            $response = json_decode(curl_exec($curl));
            curl_close($curl);
            if (!$response)
                return false;
            return $response;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
