<?php

namespace FondOfSpryker\Zed\PriceProductPriceList\Persistence;

use Generated\Shared\Transfer\PriceProductCriteriaTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\QueryCriteriaTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListPersistenceFactory getFactory()
 */
class PriceProductPriceListRepository extends AbstractRepository implements PriceProductPriceListRepositoryInterface
{
    /**
     * {@inheritdoc}
     *
     * @param \Generated\Shared\Transfer\PriceProductCriteriaTransfer $priceProductCriteriaTransfer
     *
     * @return \Generated\Shared\Transfer\QueryCriteriaTransfer|null
     */
    public function buildPriceListPriceDimensionCriteria(
        PriceProductCriteriaTransfer $priceProductCriteriaTransfer
    ): ?QueryCriteriaTransfer {
        return $this->getFactory()
            ->createPriceListPriceQueryExpander()
            ->buildPriceListPriceDimensionQueryCriteria($priceProductCriteriaTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @throws
     *
     * @return int|null
     */
    public function findIdByPriceProductTransfer(PriceProductTransfer $priceProductTransfer): ?int
    {
        $query = $this->getFactory()
            ->createPriceProductPriceListQuery()
            ->usePriceProductStoreQuery()
                ->filterByFkStore($priceProductTransfer->getMoneyValue()->getFkStore())
                ->filterByFkCurrency($priceProductTransfer->getMoneyValue()->getFkCurrency())
                ->filterByFkPriceProduct($priceProductTransfer->getIdPriceProduct())
            ->endUse()
            ->filterByFkPriceList($priceProductTransfer->getPriceDimension()->getIdPriceList());

        if ($priceProductTransfer->getIdProduct()) {
            $query->filterByFkProduct($priceProductTransfer->getIdProduct());
        } else {
            $query->filterByFkProductAbstract($priceProductTransfer->getIdProductAbstract());
        }

        $entity = $query->findOne();

        if ($entity === null) {
            return null;
        }

        return $entity->getIdPriceProductPriceList();
    }
}
