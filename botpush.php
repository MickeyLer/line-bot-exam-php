<?php



require "vendor/autoload.php";

$access_token = 'L/pHCkpuK7L/hF405h4FRUFhWNhUzrRcWeDivFZLJQVs6PPm/6H036xXPij3pK5qM+ZQznZUIL8prSSmy6tckvNUahXr1gW2TsT+mntVkvMrt3GDrFYmCBYBv/1YxN790+lTIvabyu6HkrHTFrF17QdB04t89/1O/w1cDnyilFU=';

$channelSecret = '480edac7fe92562260ced038b43a4ec2';

$pushID = 'Uce29194becf60fa656fd9479b577b396';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('สวัสดี นี้คือระบบแจ้งเตือนอัตโนมัติ');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







