<?php

declare(strict_types=1);

namespace OxidSupport\RestApi\Controller\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OxidSupport\RestApi\Service\ProductServiceInterface;

readonly class ProductApiController
{
    public function __construct(
        private ProductServiceInterface $productService
    ) {
    }

    #[Route('/api/products', methods: ['GET'])]
    public function listProducts(): Response
    {
        $products = $this->productService->getActiveProducts();

        return new JsonResponse([
           'test' => "success",
           'total' => count($products),
           'products' => $products,
           
        ]);
    }
    #[Route('/api/products/', methods: ['GET'])]
    public function testOne(): Response
    {
        return new JsonResponse(
            [
                'test' => "success",
            ]
        );
    }
    #[Route('api/shouldnotwork', methods: ['GET'])]
    public function testSecond(): Response
    {
        return new JsonResponse(
            [
                'test' => "success - but actually should not work",
            ]
        );
    }

    #[Route('shouldnotworktoo', methods: ['GET'])]
    public function testThird(): Response
    {
        return new JsonResponse(
            [
                'test' => "success - but actually should not work, and does not work, rightly so!",
            ]
        );
    }
}
