<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="Index")
     */
    public function index(Request $request){
        return new JsonResponse(['status' => True]);
    }

    /**
     * @Route("/test", name="Test")
     */
    public function test(Request $request){
        return new JsonResponse(['test' => True]);
    }
}