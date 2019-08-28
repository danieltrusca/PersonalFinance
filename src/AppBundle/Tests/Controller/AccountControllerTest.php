<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AccountControllerTest extends WebTestCase
{
    public function testAddnewaccount()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addNewAccount');
    }

    public function testShowallaccount()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAllAccount');
    }

    public function testUpdateaccount()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updateAccount');
    }

    public function testDeleteaccount()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteAccount');
    }

}
