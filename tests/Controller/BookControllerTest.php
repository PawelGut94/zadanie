<?php

namespace App\Tests\Controller;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class BookControllerTest extends WebTestCase
{
    public function testListBookStatus ()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testAddBookStatus()
    {
        $client = static::createClient();
        $client->request('GET', '/dodaj-ksiazke');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
    
}
