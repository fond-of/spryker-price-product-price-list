<?php

namespace FondOfSpryker\Zed\PriceProductPriceList\Persistence;

use Generated\Shared\Transfer\PriceProductCriteriaTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\QueryCriteriaTransfer;

interface PriceProductPriceListRepositoryInterface
{
    /**
     * Specification:
     * - Build price list price dimension criteria.
     *
     * @param \Generated\Shared\Transfer\PriceProductCriteriaTransfer $priceProductCriteriaTransfer
     *
     * @return \Generated\Shared\Transfer\QueryCriteriaTransfer|null
     */
    public function buildPriceListPriceDimensionCriteria(
        PriceProductCriteriaTransfer $priceProductCriteriaTransfer
    ): ?QueryCriteriaTransfer;

    /**
     * Specification:
     * - Returns an ID by PriceProductTransfer.
     * - Returns null in case a record is not found.
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return string|null
     */
    public function findIdByPriceProductTransfer(PriceProductTransfer $priceProductTransfer): ?string;
}
