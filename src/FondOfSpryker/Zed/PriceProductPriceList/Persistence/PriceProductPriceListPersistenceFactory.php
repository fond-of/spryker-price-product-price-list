<?php

namespace FondOfSpryker\Zed\PriceProductPriceList\Persistence;

use FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceDimensionQueryExpander\PriceListPriceQueryExpander;
use FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceDimensionQueryExpander\PriceListPriceQueryExpanderInterface;
use Orm\Zed\PriceProductPriceList\Persistence\FosPriceProductPriceListQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListEntityManagerInterface getEntityManager()
 * @method \FondOfSpryker\Zed\PriceProductPriceList\PriceProductPriceListConfig getConfig()
 * @method \FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListRepositoryInterface getRepository()
 */
class PriceProductPriceListPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceDimensionQueryExpander\PriceListPriceQueryExpanderInterface
     */
    public function createPriceListPriceQueryExpander(): PriceListPriceQueryExpanderInterface
    {
        return new PriceListPriceQueryExpander();
    }

    /**
     * @return \Orm\Zed\PriceProductPriceList\Persistence\FosPriceProductPriceListQuery
     */
    public function createPriceProductPriceListQuery(): FosPriceProductPriceListQuery
    {
        return FosPriceProductPriceListQuery::create();
    }
}
