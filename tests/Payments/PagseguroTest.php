<?php

namespace BrPayments\Payments;

class PagSeguroTest extends \PHPUnit_Framework_TestCase
{
    public function setUp(): void
    {
        $access = [
            'email'=>'email@email.com',
            'token'=>'token',
            'currency'=>'BRL',
            'reference'=>'REF1234'
        ];

        $this->pag_seguro = new PagSeguro($access);

        //name, areacode, phone, email
        $this->pag_seguro->customer('Jose Comprador', 11, 999999999, 'comprador@comprador.com.br');

        //type, street, number, complement, district, postal_code, city, state, country
        $this->pag_seguro->shipping(
            1,
            'Av. PagSeguro',
            99,
            '1 andar',
            'Jardim Internet',
            99999999,
            'Cidade Exemplo',
            'SP',
            'ATA'
        );

        //id, description, amount, quantity, wheight(optional)
        $this->pag_seguro->addProduct(1, 'Curso PHP', 19.99, 20);
        $this->pag_seguro->addProduct(1, 'Livro de Laravel', 15, 31, 1.5);

    }

    Public function testListarProdutosAdicionadosEmUmArray()
    {
        //$this->assertEquals(true, true);

        $atual = $this->pag_seguro->toArray();
        $expected = [];
    }
}