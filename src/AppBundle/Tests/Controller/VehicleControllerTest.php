<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VehicleControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user');
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user');
    }

}
