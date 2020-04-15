<?php 
 /*Return HTTP Request 200*/
 http_response_code(200);

$datas = file_get_contents('php://input');
$deCode = json_decode($datas,true);

file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);
?>
