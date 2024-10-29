<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BeneficenteControllerTest extends WebTestCase
{
    public function testeRegistrarBeneficente(): void
    {
        $client = static::createClient();
        $client->request('POST', '/registrar-beneficente', ['nome' => 'Gesuas - Teste Unitário']);

        $this->assertSelectorTextContains('h4', 'Nome: Gesuas - Teste Unitário');
    }
    
    public function testeBuscarBeneficenteFail(): void
    {
        $client = static::createClient();
        $client->request('POST', '/buscar-beneficente', ['nis' => '5697']);
        
        $this->assertSelectorTextContains('h4', 'Não encontrado');
    }
    
    public function testeBuscarBeneficenteOK(): void
    {
        $client = static::createClient();
        $client->request('POST', '/buscar-beneficente', ['nis' => '42545478401']);
        
        $this->assertSelectorTextContains('h4', 'Nome: Gesuas Teste');
    }
    
}
