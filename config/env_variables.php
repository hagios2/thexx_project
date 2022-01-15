<?php

return [

    'razor_pay_key' => env('RAZOR_KEY'),
    'razor_pay_secret' => env('RAZOR_SECRET'),

    // 'base_url' => sprintf("%s://%s", 
    //     isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    //     $_SERVER['SERVER_NAME']
    // ), // it gives you the base url of the website

    //'upload_path' => '/uploads/', //this path is only for local

    'upload_path' => '/public/uploads/' // this path is for online website

];
