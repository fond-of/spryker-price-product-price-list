<?php

namespace FondOfSpryker\Zed\PriceProductPriceList\Persistence;

use Generated\Shared\Transfer\FosPriceProductPriceListEntityTransfer;
use Spryker\Shared\Kernel\Transfer\EntityTransferInterface;

interface PriceProductPriceListEntityManagerInterface
{
    /**
     * Specification:
     * - Create or update a relationship between price product and price list.
     * - Finds a relation by FosPriceProductPriceListEntityTransfer::idPriceProductPriceList.
     * - Persists the relation entity to DB.
     *
     * @param \Generated\Shared\Transfer\FosPriceProductPriceListEntityTransfer $priceProductPriceListEntityTransfer
     *
     * @return \Spryker\Shared\Kernel\Transfer\EntityTransferInterface
     */
    public function persistEntity(
        FosPriceProductPriceListEntityTransfer $priceProductPriceListEntityTransfer
    ): EntityTransferInterface;

    /**
     * @param int $idPriceProductStore
     *
     * @return void
     */
    public function deleteByIdPriceProductStore(int $idPriceProductStore): void;
}
