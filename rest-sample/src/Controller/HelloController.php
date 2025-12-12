<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HelloController extends AbstractController
{
    #[Route('/hello', name: 'app_hello')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/HelloController.php',
        ]);
    } 
    
    #[Route('/hello/template', name: 'app_hello_template')]
    public function template(): Response
    {
        return $this->render('hello/template.html.twig', [
            'message' => 'Hello Symfony + Vue.js! from Twig!',
        ]);
    }

    #[Route('/hello/{name}', name: 'app_hello_name')]
    public function helloName(string $name): Response
    {
        return $this->render('hello/greet.html.twig', [
            'name' => 'Hello ' . $name,
        ]);
    }
}
