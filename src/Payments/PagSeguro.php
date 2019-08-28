<?php

namespace BrPayments\Payments;

class PagSeguro
{

    protected $config;
    protected $sender;
    protected $shipping;
    protected $addProducts;

    public function __construct(array $config) {
        $this->config = $config;
    }

    public function customer(...$customer) {
        $this->sender = [
            'senderName' =>$customer[0],
            'sendeerAreaCode' =>$customer[1],
            'senderPhone' =>$customer[2],
            'senderEmail' => $customer[3],
        ]; 
    }

    public function shipping(...$shipping) {
        $this->shipping = [
            'ShippingType' => $shipping[0],
            'ShippingAddressStreet' => $shipping[1],
            'ShippingAddressNumber' => $shipping[2],
            'ShippingAddressComplement' => $shipping[3],
            'ShippingAddressDistrict' => $shipping[4],
            'ShippingAddressPostalCode' => $shipping[5],
            'ShippingAddressCity' => $shipping[6],
            'ShippingAddressState' => $shipping[7],
            'ShippingAddressCountry' => $shipping[8],           
        ];
    }

    public function addProduct(...$product) {

        $index = count($this->products);
        $this->products[$index] = [
            'id'=> $product[0],
            'description'=> $product[1],
            'amount'=> $product[2],
            'quantity'=> $product[3],        
        ];

        if (!empty($product[4])){
            $this->products[$index]['wheight'] = $product[4];
        }
    }

}