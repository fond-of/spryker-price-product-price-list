<?php

namespace FondOfSpryker\Zed\PriceProductPriceList\Communication\Plugin\PriceProductExtension;

use FondOfSpryker\Shared\PriceProductPriceList\PriceProductPriceListConstants;
use Generated\Shared\Transfer\PriceProductCriteriaTransfer;
use Generated\Shared\Transfer\QueryCriteriaTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PriceProductExtension\Dependency\Plugin\PriceDimensionQueryCriteriaPluginInterface;

/**
 * @method \FondOfSpryker\Zed\PriceProductPriceList\PriceProductPriceListConfig getConfig()
 * @method \FondOfSpryker\Zed\PriceProductPriceList\Business\PriceProductPriceListFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListRepositoryInterface getRepository()()
 */
class PriceListPriceQueryCriteriaPlugin extends AbstractPlugin implements PriceDimensionQueryCriteriaPluginInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductCriteriaTransfer $priceProductCriteriaTransfer
     *
     * @return \Generated\Shared\Transfer\QueryCriteriaTransfer|null
     */
    public function buildPriceDimensionQueryCriteria(PriceProductCriteriaTransfer $priceProductCriteriaTransfer): ?QueryCriteriaTransfer
    {
        return $this->getRepository()->buildPriceListPriceDimensionCriteria($priceProductCriteriaTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return string
     */
    public function getDimensionName(): string
    {
        return PriceProductPriceListConstants::PRICE_DIMENSION_PRICE_LIST;
    }
}
