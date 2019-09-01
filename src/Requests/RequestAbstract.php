<?php

namespace BrPayments\Requests;

use BrPayments\OrderInterface as Order;

abstract class RequestAbstract implements RequestInterface
{
    private $chield_const;

    public function getUrl(Order $order, bool $sandbox = null) : string
    {
        if ($sandbox) {
            return $this->getChildConstant('url_sandbox') . (string)$order;
        }
        return $this->getChildConstant('url') . (string)$order;
    }

    public function getMethod() : string
    {
        return $this->getChildConstant('method');;
    }

    private function getChildConstant($const)
    {
        if (!$this->chield_const){
            $chield = get_class($this);
            $this->chield_const = [
                'url' => constant($chield . '::URL'),
                'url_sandbox' => constant($chield . '::URL_SANDBOX'),
                'method' => constant($chield . '::METHOD'),
            ];
        }

        return $this->chield_const[$const];
    }
}