<?php


namespace App\Helper;


class Para
{

    public function curlfunc ($url, $key)
    {

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ["authorization: $key", "content-type: application/json"]);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($curl_response, true);

        return $result;

    }

    static function updown ($val)
    {
        if (substr($val, 0, 1) === "-")
        {
            echo "down";
        }
        else
        {
            echo "up";
        }
    }


}
