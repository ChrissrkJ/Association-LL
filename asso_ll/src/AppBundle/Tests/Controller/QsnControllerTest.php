<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class QsnControllerTest extends WebTestCase
{
    public function testQsn()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/qsn');
    }

}
