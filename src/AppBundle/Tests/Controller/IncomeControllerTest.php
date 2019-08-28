<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IncomeControllerTest extends WebTestCase
{
    public function testAddnewincome()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addNewIncome');
    }

    public function testUpdateincome()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updateIncome');
    }

    public function testShowallincomes()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAllIncomes');
    }

    public function testDeleteincome()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteIncome');
    }

}
