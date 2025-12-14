<?php

namespace App\Controller\Api;

use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

final class ProductController extends AbstractController
{
    #[Route('/api/products', methods: ["POST"])]
    public function create(EntityManagerInterface $em): JsonResponse
    {
        $products = $em->getRepository(Product::class)->findAll();
        return $this->json($products, Response::HTTP_CREATED);//201
    }

    #[Route('/api/products', methods: ["GET"])]
    public function read(EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $products = $em->getRepository(Product::class)->findAll();

        $options = [ObjectNormalizer::IGNORED_ATTRIBUTES => ["id"]];
        $str = $serializer->serialize($products, 'json', $options);

        return JsonResponse::fromJsonString($str, Response::HTTP_OK);

        //return $this->json($products, Response::HTTP_OK);//200

        /*return $this->render('api/product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);*/
    }

}
