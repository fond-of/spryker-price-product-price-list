<?php

namespace FondOfSpryker\Zed\PriceProductPriceList\Persistence\Propel\PriceDimensionQueryExpander;

use Generated\Shared\Transfer\PriceProductCriteriaTransfer;
use Generated\Shared\Transfer\PriceProductDimensionTransfer;
use Generated\Shared\Transfer\QueryCriteriaTransfer;
use Generated\Shared\Transfer\QueryJoinTransfer;
use Orm\Zed\PriceProductPriceList\Persistence\Map\FosPriceProductPriceListTableMap;
use Propel\Runtime\ActiveQuery\Criteria;

class PriceListPriceQueryExpander implements PriceListPriceQueryExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\PriceProductCriteriaTransfer $priceProductCriteriaTransfer
     *
     * @return \Generated\Shared\Transfer\QueryCriteriaTransfer|null
     */
    public function buildPriceListPriceDimensionQueryCriteria(
        PriceProductCriteriaTransfer $priceProductCriteriaTransfer
    ): ?QueryCriteriaTransfer {
        $idPriceList = null;

        if ($priceProductCriteriaTransfer->getPriceDimension() !== null) {
            $idPriceList = $priceProductCriteriaTransfer->getPriceDimension()->getIdPriceList();
        }

        if ($idPriceList) {
            return $this->createQueryCriteriaTransfer([$idPriceList]);
        }

        $idPriceListIds = $this->findPriceListIds($priceProductCriteriaTransfer);
        if (!$idPriceListIds) {
            return null;
        }

        return $this->createQueryCriteriaTransfer($idPriceListIds);
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductCriteriaTransfer $priceProductCriteriaTransfer
     *
     * @return array
     */
    protected function findPriceListIds(PriceProductCriteriaTransfer $priceProductCriteriaTransfer): array
    {
        if (!$priceProductCriteriaTransfer->getQuote()) {
            return [];
        }

        $companyUserTransfer = $priceProductCriteriaTransfer->getQuote()->getCompanyUser();
        if ($companyUserTransfer === null) {
            return [];
        }

        $companyBusinessUnitTransfer = $companyUserTransfer->getCompanyBusinessUnit();
        if ($companyBusinessUnitTransfer === null) {
            return [];
        }

        $companyTransfer = $companyBusinessUnitTransfer->getCompany();
        if ($companyTransfer === null) {
            return [];
        }

        $fkPriceList = $companyTransfer->getFkPriceList();
        if ($companyTransfer->getFkPriceList() === null) {
            return [];
        }

        return [$fkPriceList];
    }

    /**
     * @param int[] $priceListIds
     *
     * @return \Generated\Shared\Transfer\QueryCriteriaTransfer
     */
    protected function createQueryCriteriaTransfer(array $priceListIds): QueryCriteriaTransfer
    {
        return (new QueryCriteriaTransfer())
            ->setWithColumns([
                FosPriceProductPriceListTableMap::COL_FK_PRICE_LIST => PriceProductDimensionTransfer::ID_PRICE_LIST,
            ])->addJoin(
                (new QueryJoinTransfer())
                    ->setRelation('PriceProductPriceList')
                    ->setCondition(FosPriceProductPriceListTableMap::COL_FK_PRICE_LIST
                        . ' IN (' . implode(',', $priceListIds) . ')')
                    ->setJoinType(Criteria::LEFT_JOIN)
            );
    }
}
