<?php

namespace FondOfSpryker\Zed\PriceProductPriceList\Business;

use FondOfSpryker\Zed\PriceProductPriceList\Business\Model\PriceListPriceWriter;
use FondOfSpryker\Zed\PriceProductPriceList\Business\Model\PriceListPriceWriterInterface;
use FondOfSpryker\Zed\PriceProductPriceList\Business\Model\PriceProductDimensionExpander;
use FondOfSpryker\Zed\PriceProductPriceList\Business\Model\PriceProductDimensionExpanderInterface;
use FondOfSpryker\Zed\PriceProductPriceList\Dependency\Facade\PriceProductPriceListToPriceListFacadeInterface;
use FondOfSpryker\Zed\PriceProductPriceList\Dependency\Facade\PriceProductPriceListToPriceProductFacadeInterface;
use FondOfSpryker\Zed\PriceProductPriceList\PriceProductPriceListDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListEntityManagerInterface getEntityManager()
 * @method \FondOfSpryker\Zed\PriceProductPriceList\PriceProductPriceListConfig getConfig()
 * @method \FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListRepositoryInterface getRepository()
 */
class PriceProductPriceListBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\PriceProductPriceList\Business\Model\PriceProductDimensionExpanderInterface
     */
    public function createPriceProductDimensionExpander(): PriceProductDimensionExpanderInterface
    {
        return new PriceProductDimensionExpander(
            $this->getPriceListFacade(),
        );
    }

    /**
     * @return \FondOfSpryker\Zed\PriceProductPriceList\Dependency\Facade\PriceProductPriceListToPriceListFacadeInterface
     */
    protected function getPriceListFacade(): PriceProductPriceListToPriceListFacadeInterface
    {
        return $this->getProvidedDependency(PriceProductPriceListDependencyProvider::FACADE_PRICE_LIST);
    }

    /**
     * @return \FondOfSpryker\Zed\PriceProductPriceList\Business\Model\PriceListPriceWriterInterface
     */
    public function createPriceListPriceWriter(): PriceListPriceWriterInterface
    {
        return new PriceListPriceWriter(
            $this->getPriceProductFacade(),
            $this->getRepository(),
            $this->getEntityManager(),
        );
    }

    /**
     * @return \FondOfSpryker\Zed\PriceProductPriceList\Dependency\Facade\PriceProductPriceListToPriceProductFacadeInterface
     */
    protected function getPriceProductFacade(): PriceProductPriceListToPriceProductFacadeInterface
    {
        return $this->getProvidedDependency(PriceProductPriceListDependencyProvider::FACADE_PRICE_PRODUCT);
    }
}
