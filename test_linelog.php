<?php
echo "hello world";
date_default_timezone_set(“Asia/Bangkok”);
$date = date("Y-m-d");
$time = date("H:i:s");
$json = file_get_contents('php://input');
$request = json_decode($json, true);
$queryText = $request["queryResult"]["queryText"];
$userId = $request['originalDetectIntentRequest']['payload']['data']['source']['userId'];

require "vendor/autoload.php";

$access_token = '9X89LSe2o0SVcq3UlQZpDgVxMa36OKjDi2GS99Svmthkml2Zf/nB8K5/yxzWq4VOrefvJZQsdHjeBjvLaGozxaU/YJqsKYE0TeeLV7oJgIzWeSEuJ/Ykv7HvXSjCJpTaeJVNuxx/JgZPcqHshvS+LgdB04t89/1O/w1cDnyilFU=';

$channelSecret = '3295b0b1b17e3b0c4f1c1891db6fb289';

//$pushID = '$userId';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($UserId, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
