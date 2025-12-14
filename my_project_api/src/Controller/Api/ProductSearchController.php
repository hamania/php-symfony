<?php

namespace App\Controller\Api;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ProductSearchController
{
    public function __invoke(EntityManagerInterface $em, Request $request): JsonResponse
    {
        $minSize = $request->query->get('minSize', 0);
        $maxSize = $request->query->get('maxSize', 999);

        $products = $em->getRepository(Product::class)
            ->createQueryBuilder('p')
            ->where('p.size >= :minSize')
            ->andWhere('p.size <= :maxSize')
            ->setParameter('minSize', $minSize)
            ->setParameter('maxSize', $maxSize)
            ->getQuery()
            ->getResult();

        $data = array_map(fn(Product $p) => [
            'id' => $p->getId(),
            'name' => $p->getName(),
            'size' => $p->getSize(),
        ], $products);
        return new JsonResponse($data, Response::HTTP_OK);
    }
}
