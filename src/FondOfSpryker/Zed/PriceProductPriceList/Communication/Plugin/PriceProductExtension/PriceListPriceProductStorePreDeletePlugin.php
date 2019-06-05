<?php

namespace FondOfSpryker\Zed\PriceProductPriceList\Communication\Plugin\PriceProductExtension;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PriceProductExtension\Dependency\Plugin\PriceProductStorePreDeletePluginInterface;

/**
 * @method \FondOfSpryker\Zed\PriceProductPriceList\PriceProductPriceListConfig getConfig()
 * @method \FondOfSpryker\Zed\PriceProductPriceList\Business\PriceProductPriceListFacadeInterface getFacade()
 */
class PriceListPriceProductStorePreDeletePlugin extends AbstractPlugin implements PriceProductStorePreDeletePluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @param int $idPriceProductStore
     *
     * @return void
     * @api
     *
     */
    public function preDelete(int $idPriceProductStore): void
    {
        $this->getFacade()
            ->deletePriceProductPriceListByIdPriceProductStore($idPriceProductStore);
    }
}
