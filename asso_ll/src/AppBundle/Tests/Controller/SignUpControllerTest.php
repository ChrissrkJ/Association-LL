<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SignUpControllerTest extends WebTestCase
{
    public function testSignup()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/signUp');
    }

}
