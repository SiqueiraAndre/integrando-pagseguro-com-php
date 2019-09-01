<?php

require __DIR__.'/../../vendor/autoload.php';

$notificationCode = filter_input(INPUT_POST, 'notificationCode');
if (is_null($notificationCode)) {
    $notificationCode = 'F74E81D558064446ADA3BBEBCA87F1FB';
}

$access = [
    'email'=>'siqueira.andre@gmail.com',
    'token'=>'E7BF42DA87084D269F07467B5C0D3F27',
    'notificationCode'=>$notificationCode,
];

$pag_seguro = new BrPayments\Notifications\PagSeguro($access);
$pag_seguro_request = new BrPayments\Requests\PagSeguroNotification;

$response = (new BrPayments\MakeRequest($pag_seguro_request))->make($pag_seguro, true);

header("Content-type: text/xml");
echo $response;