<?php
include_once('./vendor/autoload.php');

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('fC7GdNMtfiT1JQc805bYzD5hJrhpuqzbZAycdkpdrf2JBIQI82rLzEOoAlMrB0pqIk9Ntu9XFiPw+3vO9v/ZrVdM6d9vH28pIQ8r0ijoNpVfhYEkJo50vxbSOvhgxmBYSBwlu0NTEnBxkirOuqz4jAdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '59335bea847802e3ea1a8b3bb21ca445']);

$data = file_get_contents('php://input');
if ($data == '')
    return;

$data = json_decode($data, true);
$replyToken = $data['events'][0]['replyToken'];
$messageType = $data['events'][0]['message']['type'];

if ($messageType == 'text') {
    $userMessage = $data['events'][0]['message']['text'];
    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('ข้อความคุณคือ ' . $userMessage);
} else if ($messageType == 'sticker') {
    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\StickerMessageBuilder(789, 10856);
} else if ($messageType == 'image') {
    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\ImageMessageBuilder('https://puwanai.com/tutorial/linebot/image.jpeg', 'https://puwanai.com/tutorial/linebot/image.jpeg');
} else if ($messageType == 'location') {
    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\LocationMessageBuilder('ส้มตำไทญ้อ แซ่บเวอร์', '200/641 ถนนแจ้งวัฒนะ ซอย 10 แยก 1, ทุ่งสองห้อง, หลักสี่, Bangkok 10210', 13.8868937, 100.5756333);
} else {
    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('อื่น ๆ');
}

$response = $bot->replyMessage($replyToken, $textMessageBuilder);
if ($response->isSucceeded()) {
    echo 'Succeeded!';
    return;
}

// Failed
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();