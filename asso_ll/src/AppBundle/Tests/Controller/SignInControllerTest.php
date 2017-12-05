<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SignInControllerTest extends WebTestCase
{
    public function testSignin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/signIn');
    }

}
