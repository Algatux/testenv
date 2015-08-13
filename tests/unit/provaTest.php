<?php

use Test\Code\Prova;
use TestCases\BaseTestCase;

class provaTest extends BaseTestCase
{

    public function test_prova_class()
    {
        $prova = new Prova();
        $this->assertInstanceOf(Prova::class,$prova);
    }
    
}