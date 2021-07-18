<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TestController
{
    /**
     * @Route("/Test")
     */
    public function TestName(): Response
    {
        return new Response("Hello World!");
    }
}
