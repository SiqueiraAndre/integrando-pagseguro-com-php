<?php

namespace BrPayments\MakeRequest\PagSeguro;

use PHPUnit\Framework\TestCase;

use BrPayments\Notifications\PagSeguro;
use BrPayments\Requests\testPagSeguroNotification;
use BrPayments\MakeRequest;

class PagSeguroNotificationTest extends TestCase
{
    public function testPagSeguroRequest()
    {
        $access = [
            'email'=>'siqueira.andre@gmail.com',
            'token'=>'E7BF42DA87084D269F07467B5C0D3F27',
            'notificationCode'=>'59C38929E7AF4DD89551B6361F1A0D13'
        ];
        $pag_seguro = new PagSeguro($access);
        $pag_seguro_request = new PagSeguroNotification;

        $response = (new MakeRequest($pag_seguro_request))->make($pag_seguro, true);

        $result = (string)$response;
        
        $this->assertTrue(is_string($result));
    }
}