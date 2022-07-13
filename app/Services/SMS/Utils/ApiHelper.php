<?php

namespace App\Services\SMS\Utils;
use Illuminate\Support\Facades\Http;

class ApiHelper{

    public static function callApi(String $url,array $data){
        return Http::post($url,$data);
    }
}
