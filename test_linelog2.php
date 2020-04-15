<?php 
	/*Get Data From POST Http Request*/
	$datas = file_get_contents('php://input');
	/*Decode Json From LINE Data Body*/
	$deCode = json_decode($datas,true);

	$id = $deCode['events'][0]['source']['userId'];
      
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "userid=".$id;
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "34";

      $arrayHeader = array();
      $arrayHeader[] = "Content-Type: application/json";
      $arrayHeader[] = "Authorization: Bearer xXaIsxxOCAVjG0lux2aJM02idLsRidUSpiCMPVyL2D+gBoJkyv2Ucj0hS0VHc426pQ29V0BMb77jmHeNqP0sHmxfjK1a7BrjsAPmXpCWB7rwuTVGdMn+UfzI3fEDEDWad8m0TN0waOYzbPFVdNcLDgdB04t89/1O/w1cDnyilFU=";

      pushMsg($arrayHeader,$arrayPostData);

   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   exit;
?>
