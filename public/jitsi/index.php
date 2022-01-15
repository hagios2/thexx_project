<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-CSRF-Token, dataType');

$url_components = parse_url($url);
parse_str($url_components['query'], $params);

$mid = rand(100000,100000000);
$mUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/jitsi/meeting.html?mid=' . $mid . '&type=';
$meetingArray = [
  "meetingUrl" => $mUrl
];

echo $meetingArray['meetingUrl'];

// Not needed right now , it is used to get the content of external website.
// function get_content($URL)
// {
//   $ch = curl_init();
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//   curl_setopt($ch, CURLOPT_URL, $URL);
//   curl_setopt($ch, CURLOPT_HEADER, 0);
//   $data = curl_exec($ch);
//   curl_close($ch);
//   return $data;
// }
