<?php
/**
 * Created by PhpStorm.
 * User: jmanihuariy
 * Date: 9/04/2020
 * Time: 18:12
 */

namespace App\Services;


class GeolocalizationService
{
    public static function get($latitude,$longituted){

        $cURLConnection = curl_init();
        curl_setopt($cURLConnection, CURLOPT_URL, "https://neutrinoapi.net/geocode-reverse");
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($cURLConnection);
        curl_close($cURLConnection);
        return $response;
    }

    public static function getAll($latitude,$longituted){
        $data = array(
            "user-id" => env('USER_ID_GEO'),
            "api-key" => env('MATER_KEY_GEO'),
            "ip" => request()->ip(),
            'latitude'=>$latitude,
            'longitude'=>$longituted,
            'language-code'=>'es'
        );
        $ch = curl_init(env('URL_GEO'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }

}
