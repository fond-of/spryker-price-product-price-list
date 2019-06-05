<?php

namespace FondOfSpryker\Zed\PriceProductPriceList\Communication\Plugin\PriceProductExtension;

use FondOfSpryker\Shared\PriceProductPriceList\PriceProductPriceListConstants;
use Generated\Shared\Transfer\PriceProductTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PriceProductExtension\Dependency\Plugin\PriceDimensionConcreteSaverPluginInterface;

/**
 * @method \FondOfSpryker\Zed\PriceProductPriceList\PriceProductPriceListConfig getConfig()
 * @method \FondOfSpryker\Zed\PriceProductPriceList\Business\PriceProductPriceListFacadeInterface getFacade()
 */
class PriceListPriceDimensionConcreteWriterPlugin extends AbstractPlugin implements PriceDimensionConcreteSaverPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer
     * @api
     *
     */
    public function savePrice(PriceProductTransfer $priceProductTransfer): PriceProductTransfer
    {
        return $this->getFacade()->savePriceProductPriceList($priceProductTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     * @api
     *
     */
    public function getDimensionName(): string
    {
        return PriceProductPriceListConstants::PRICE_DIMENSION_PRICE_LIST;
    }
}
