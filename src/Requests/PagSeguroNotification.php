<?php

namespace BrPayments\Requests;

use BrPayments\OrderInterface as Order;

class PagSeguroNotification extends RequestAbstract
{
    const URL = 'https://ws.pagseguro.uol.com.br/v3/transactions/';
    const URL_SANDBOX = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/';
    const METHOD = 'GET';

    public function config(Order $order = null) :array
    {
        return [];
    }
}