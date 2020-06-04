<?php

namespace FondOfSpryker\Zed\PriceProductPriceList\Communication\Plugin\PriceProductExtension;

use FondOfSpryker\Shared\PriceProductPriceList\PriceProductPriceListConstants;
use Generated\Shared\Transfer\PriceProductTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PriceProductExtension\Dependency\Plugin\PriceDimensionAbstractSaverPluginInterface;

/**
 * @method \FondOfSpryker\Zed\PriceProductPriceList\PriceProductPriceListConfig getConfig()
 * @method \FondOfSpryker\Zed\PriceProductPriceList\Business\PriceProductPriceListFacadeInterface getFacade()
 */
class PriceListPriceDimensionAbstractWriterPlugin extends AbstractPlugin implements PriceDimensionAbstractSaverPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer
     */
    public function savePrice(PriceProductTransfer $priceProductTransfer): PriceProductTransfer
    {
        return $this->getFacade()->savePriceProductPriceList($priceProductTransfer);
    }

    /**
     * {@inheritDoc}
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
