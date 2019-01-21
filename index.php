<?php 
require_once('./vendor/autoload.php'); 
use \LINE\LINEBot\HTTPClient\CurlHTTPClient; 
use \LINE\LINEBot; 
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder; 
$channel_token = 'eYl7FdkSJdfJFLklZ3+spXp9UYinc0UL9gzMeY+ljuyErQBr67nNloi2YjPMFUBRKMq+ECtQ9QXZheV/PwCyzpcjNcPnD4TYboH1hGNsIMyrE7BkgJvqENoicxdSOHAs9Tg36U40VDs85EIPNl9zGQdB04t89/1O/w1cDnyilFU='; 
$channel_secret = '11c5937f8f7deeddd86bd9f584106a85'; 
// Get message from Line API 
$content = file_get_contents('php://input'); 
$events = json_decode($content, true); 
if (!is_null($events['events'])) { 
// Loop through each event 
foreach ($events['events'] as $event) { 
// Line API send a lot of event type, we interested in message only. 
if ($event['type'] == 'message') { 
// Get replyToken 
$replyToken = $event['replyToken']; 
switch($event['message']['type']) { 
case 'image': 
$messageID = $event['message']['id']; 
$respMessage = 'Hello, your image ID is '. $messageID; 
 
break; 
default: 
$respMessage = 'Please send image only'; 
break; 
} 
$httpClient = new CurlHTTPClient($channel_token); 
$bot = new LINEBot($httpClient, array('channelSecret' => $channel_secret)); 100 

 
$textMessageBuilder = new TextMessageBuilder($respMessage); 
$response = $bot->replyMessage($replyToken, $textMessageBuilder); 
} 
} 
} 
echo "OK";
