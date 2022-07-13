<?php

namespace App\Services\SMS\Kavenegar;

use App\Services\SMS\SmsServiceInterface;
use App\Services\SMS\Utils\ApiHelper;

class Service implements SmsServiceInterface
{

    function send($receptor, $msg): bool
    {
        $url = "https://api.kavenegar.com/v1/".env('KAVEHNEGAR_API_KEY')."/sms/send.json";
        $data = [
            'receptor'=>$receptor,
            'message'=>$msg
        ];

        $res = ApiHelper::callApi($url,$data);
        if($res->json('status')=='200'){
            return true;
        } else {
            return false;
        }
    }
}
