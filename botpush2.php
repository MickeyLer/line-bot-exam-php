<?php

date_default_timezone_set("Asia/Bangkok");

 $serverName = "localhost";

 $userName = "u136290615_user";

 $userPassword = "HYIegy`b";

 $dbName = "u136290615_sub";



 $connect = mysqli_connect($serverName,$userName,$userPassword,$dbName) or die ("connect error".mysqli_error());

 mysqli_set_charset($connect, "utf8");
 $query ="SELECT  name,dueday   FROM sub_autonotify  WHERE  dueday = DAY(NOW())  ";

 $resource = mysqli_query($connect,$query) or  die ("error".mysqli_error());

 $count_row = mysqli_num_rows($resource);

if($count_row > 0) {


require "vendor/autoload.php";

$access_token = '3ALKAbKFoGuJyJnoDdn0HeyfbxLFtEXBKiC0lFeoNl/XbL4WhoCZzefp2n7UDuXaCWfErIDro07BnZNggJmXJChXTIlMPo8LRJ+n1LEgbRUaKehDkiCr5p5CakHrPX+gauOGX/R5bB2e5yi7xjnHDAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '75c03f392f6e53d662d6f5a8db9e421f';

$pushID = 'U7ef7a449f2a5c2057eacfc02ba2eb286';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







