<?php
namespace App\Services\SMS;

Interface SmsServiceInterface{
    function send($receptor,$msg):bool;
}
