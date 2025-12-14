<?php

namespace App\Controller\Api;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class ProductController extends AbstractController
{
    #[Route('/api/products', methods: ["POST"])]
    public function create(EntityManagerInterface $em,
                           SerializerInterface $serializer,
                           Request $request,
                           ValidatorInterface $validator): JsonResponse
    {
        $str = $request->getContent();

        $p = $serializer->deserialize($str, Product::class, 'json');

        $ve = $validator->validate($p);
        if (count($ve) > 0) {
            $errors = [];
            foreach ($ve as $e) {
                $errors[$e->getPropertyPath()] = $e->getMessage();
            }
            return $this->json(["errors" => $errors], Response::HTTP_UNPROCESSABLE_ENTITY);//422
        }

        $em->persist($p);
        $em->flush();

        return $this->json($p, Response::HTTP_CREATED);//201
    }

    #[Route('/api/products', methods: ["GET"])]
    public function read(EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $products = $em->getRepository(Product::class)->findAll();

        $options = [ObjectNormalizer::IGNORED_ATTRIBUTES => ["pid"]];
        $str = $serializer->serialize($products, 'json', $options);

        return JsonResponse::fromJsonString($str, Response::HTTP_OK);

        //return $this->json($products, Response::HTTP_OK);//200

        /*return $this->render('api/product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);*/
    }

    #[Route('/api/products/{id}', methods: ["GET"])]
    public function readById(Product $p): JsonResponse
    {
        return $this->json($p, Response::HTTP_OK);//200
    }

    #[Route('/api/products/{id}', methods: ["PUT", "PATCH"])]
    public function update(EntityManagerInterface $em,
                           SerializerInterface $serializer,
                           Request $request,
                           Product $product): JsonResponse
    {
        $s = $request->getContent();
        $serializer->deserialize($s, Product::class, 'json', ["object_to_populate" => $product]);
        $em->persist($product);
        $em->flush();

        return $this->json($product, Response::HTTP_ACCEPTED);

    }

    #[Route('/api/products/{id}', methods: ["DELETE"])]
    public function delete(EntityManagerInterface $em,
                           Product $product): JsonResponse
    {
        $em->remove($product);
        $em->flush();

        return $this->json(null, Response::HTTP_NO_CONTENT);//204

    }

    public function __invoke(): JsonResponse
    {
        return new JsonResponse(['message' => 'Custom search logic here']);
    }

}
