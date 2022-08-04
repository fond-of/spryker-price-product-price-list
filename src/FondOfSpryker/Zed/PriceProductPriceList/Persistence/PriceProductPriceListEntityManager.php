<?php

namespace FondOfSpryker\Zed\PriceProductPriceList\Persistence;

use Generated\Shared\Transfer\FosPriceProductPriceListEntityTransfer;
use Propel\Runtime\Collection\ObjectCollection;
use Spryker\Shared\Kernel\Transfer\EntityTransferInterface;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListPersistenceFactory getFactory()
 */
class PriceProductPriceListEntityManager extends AbstractEntityManager implements PriceProductPriceListEntityManagerInterface
{
    /**
     * {@inheritDoc}
     *
     * @param \Generated\Shared\Transfer\FosPriceProductPriceListEntityTransfer $priceProductPriceListEntityTransfer
     *
     * @return \Spryker\Shared\Kernel\Transfer\EntityTransferInterface
     */
    public function persistEntity(
        FosPriceProductPriceListEntityTransfer $priceProductPriceListEntityTransfer
    ): EntityTransferInterface {
        $priceProductPriceListEntity = $this->getFactory()
            ->createPriceProductPriceListQuery()
            ->filterByIdPriceProductPriceList($priceProductPriceListEntityTransfer->getIdPriceProductPriceList())
            ->findOneOrCreate();

        $priceProductPriceListEntity->fromArray($priceProductPriceListEntityTransfer->toArray());

        $priceProductPriceListEntity->save();

        $priceProductPriceListEntityTransfer->setIdPriceProductPriceList(
            $priceProductPriceListEntity->getIdPriceProductPriceList(),
        );

        return $priceProductPriceListEntityTransfer;
    }

    /**
     * @param int $idPriceProductStore
     *
     * @return void
     */
    public function deleteByIdPriceProductStore(int $idPriceProductStore): void
    {
        $priceProductPriceListEntities = $this->getFactory()
            ->createPriceProductPriceListQuery()
            ->filterByFkPriceProductStore($idPriceProductStore)
            ->find();

        $this->deleteEntitiesAndTriggerEvents($priceProductPriceListEntities);
    }

    /**
     * @param \Propel\Runtime\Collection\ObjectCollection<\Orm\Zed\PriceProductPriceList\Persistence\FosPriceProductPriceList> $priceProductPriceListEntities
     *
     * @return void
     */
    protected function deleteEntitiesAndTriggerEvents(ObjectCollection $priceProductPriceListEntities): void
    {
        foreach ($priceProductPriceListEntities as $priceProductPriceListEntity) {
            $priceProductPriceListEntity->delete();
        }
    }
}
