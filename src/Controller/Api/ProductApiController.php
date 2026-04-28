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

    #[Route('api/products/', methods: ['GET'])]
    public function listProducts(): Response
    {
        $products = $this->productService->getActiveProducts();

        return new JsonResponse([
           'test' => "success",
           'total' => count($products),
           'prdocuts' => $products,
           
        ]);
    }
}