<?php
function getLINEProfile($datas)
{
   $datasReturn = [];
   $curl = curl_init();
   curl_setopt_array($curl, array(
     CURLOPT_URL => $datas['url'],
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 30,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "GET",
     CURLOPT_HTTPHEADER => array(
       "Authorization: Bearer ".$datas['token'],
       "cache-control: no-cache"
     ),
   ));
   $response = curl_exec($curl);
   $err = curl_error($curl);
   curl_close($curl);
   if($err){
      $datasReturn['result'] = 'E';
      $datasReturn['message'] = $err;
   }else{
      if($response == "{}"){
          $datasReturn['result'] = 'S';
          $datasReturn['message'] = 'Success';
      }else{
          $datasReturn['result'] = 'E';
          $datasReturn['message'] = $response;
      }
   }
   return $datasReturn;
}

$userId = "U5bf110dae6585f2fdf72f5f0a3fe9b09";
$LINEDatas['url'] = "https://api.line.me/v2/bot/profile/".$userId;
$LINEDatas['token'] = "ME3YfGVoiHzLsnp3pW1XSSFGmDpXoJPJw+b9dyB4c4kynw5eT+7DJeFzL+hgJ/V8VMAliTSYhy5BkI9HRac/69R/gzoz7iSWMVJEDVlFyNktzm+0+/XdB4ZKXPjLfZqwjJDgnHGbx2AXpAmKEU4zpgdB04t89/1O/w1cDnyilFU=";
$results = getLINEProfile($LINEDatas);
file_put_contents('log-profile.txt', $results['message'] . PHP_EOL, FILE_APPEND);

require "vendor/autoload.php";

$access_token = '9X89LSe2o0SVcq3UlQZpDgVxMa36OKjDi2GS99Svmthkml2Zf/nB8K5/yxzWq4VOrefvJZQsdHjeBjvLaGozxaU/YJqsKYE0TeeLV7oJgIzWeSEuJ/Ykv7HvXSjCJpTaeJVNuxx/JgZPcqHshvS+LgdB04t89/1O/w1cDnyilFU=';

$channelSecret = '3295b0b1b17e3b0c4f1c1891db6fb289';

$pushID = 'U5bf110dae6585f2fdf72f5f0a3fe9b09';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('รหัสของคุณคือ '.$result);
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
