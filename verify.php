<?php
$access_token = 'ME3YfGVoiHzLsnp3pW1XSSFGmDpXoJPJw+b9dyB4c4kynw5eT+7DJeFzL+hgJ/V8VMAliTSYhy5BkI9HRac/69R/gzoz7iSWMVJEDVlFyNktzm+0+/XdB4ZKXPjLfZqwjJDgnHGbx2AXpAmKEU4zpgdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
