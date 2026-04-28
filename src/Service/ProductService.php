<?php

declare(strict_types=1);

namespace OxidSupport\RestApi\Service;

use OxidEsales\EshopCommunity\Application\Model\ArticleList;
use OxidEsales\Eshop\Core\TableViewNameGenerator;

class ProductService implements ProductServiceInterface {
    public function getActiveProducts(): array
    {   
        $ArticleList = oxNew(ArticleList::class);
        $tableViewNameGenerator = oxNew(TableViewNameGenerator::class);
        $sArticleTable = $tableViewNameGenerator->getViewName('oxarticles');

        $sSelect = "select * from $sArticleTable ";
        $sSelect .= "where " . $ArticleList->getBaseObject()->getSqlActiveSnippet() . "";
        $sSelect .= "and $sArticleTable.oxparentid = ''";

        $ArticleList->selectString($sSelect);
        return $ArticleList->getArray();
    }
}