<?php

declare(strict_types=1);

namespace OxidSupport\RestApi\Service;

interface ProductServiceInterface {
    public function getActiveProducts() : array;
}