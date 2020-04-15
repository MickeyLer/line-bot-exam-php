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

//$userId = "U1a81dc36b7c95042c6ee4718cd5a7c18";
//$LINEDatas['url'] = "https://api.line.me/v2/bot/profile/".$userId;
$LINEDatas['token'] = "ME3YfGVoiHzLsnp3pW1XSSFGmDpXoJPJw+b9dyB4c4kynw5eT+7DJeFzL+hgJ/V8VMAliTSYhy5BkI9HRac/69R/gzoz7iSWMVJEDVlFyNktzm+0+/XdB4ZKXPjLfZqwjJDgnHGbx2AXpAmKEU4zpgdB04t89/1O/w1cDnyilFU=";
$results = getLINEProfile($LINEDatas);
file_put_contents('log-profile.txt', $results['message'] . PHP_EOL, FILE_APPEND);
?>
