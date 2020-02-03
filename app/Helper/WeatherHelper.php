<?php


namespace App\Helper;


class WeatherHelper
{
    private $url             = 'https://weather-ydn-yql.media.yahoo.com/forecastrss';
    private $app_id          = 'swUjvB32';
    private $consumer_key    = 'dj0yJmk9U2ZjTE51TjNhU3NYJmQ9WVdrOWMzZFZhblpDTXpJbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmc3Y9MCZ4PWVm';
    private $consumer_secret = '3762a21166b3465518b04f860ca82a550a1153f3';

    private function buildBaseString ($baseURI, $method, $params)
    {
        $r = [];
        ksort($params);
        foreach ($params as $key => $value)
        {
            $r[] = "$key=" . rawurlencode($value);
        }

        return $method . "&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
    }

    private function buildAuthorizationHeader ($oauth)
    {
        $r      = 'Authorization: OAuth ';
        $values = [];
        foreach ($oauth as $key => $value)
        {
            $values[] = "$key=\"" . rawurlencode($value) . "\"";
        }
        $r .= implode(', ', $values);

        return $r;
    }

    public function getWeatherData ($location)
    {
        $query                      = ['location' => $location, 'format' => 'json', //xml
            'u' => 'c', //u=f (default) or u=c //Fahrenheit //Celsius
        ];
        $oauth                      = ['oauth_consumer_key' => $this->consumer_key, 'oauth_nonce' => uniqid(mt_rand(1, 1000)), 'oauth_signature_method' => 'HMAC-SHA1', 'oauth_timestamp' => time(), 'oauth_version' => '1.0'];
        $base_info                  = $this->buildBaseString($this->url, 'GET', array_merge($query, $oauth));
        $composite_key              = rawurlencode($this->consumer_secret) . '&';
        $oauth_signature            = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $oauth[ 'oauth_signature' ] = $oauth_signature;
        $header                     = [$this->buildAuthorizationHeader($oauth), 'Yahoo-App-Id: ' . $this->app_id];
        $options                    = [CURLOPT_HTTPHEADER => $header, CURLOPT_HEADER => false, CURLOPT_URL => $this->url . '?' . http_build_query($query), CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER => false];
        $ch                         = curl_init();
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response; //string
    }

    public function change ($day)
    {

        if ($day == "Thu")
        {
            $day = "PRŞ";
        }
        elseif ($day == "Fri")
        {
            $day = "CUM";
        }

        return $day;
    }

}
