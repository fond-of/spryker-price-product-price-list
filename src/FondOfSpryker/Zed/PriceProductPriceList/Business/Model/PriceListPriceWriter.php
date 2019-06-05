<?php

namespace FondOfSpryker\Zed\PriceProductPriceList\Business\Model;

use FondOfSpryker\Zed\PriceProductPriceList\Dependency\Facade\PriceProductPriceListToPriceProductFacadeInterface;
use FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListEntityManagerInterface;
use FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListRepositoryInterface;
use Generated\Shared\Transfer\FosPriceProductPriceListEntityTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;

class PriceListPriceWriter implements PriceListPriceWriterInterface
{
    /**
     * @var \FondOfSpryker\Zed\PriceProductPriceList\Dependency\Facade\PriceProductPriceListToPriceProductFacadeInterface
     */
    protected $priceProductFacade;

    /**
     * @var \FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListRepositoryInterface
     */
    protected $repository;

    /**
     * @var \FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListEntityManagerInterface
     */
    protected $entityManager;

    /**
     * @param \FondOfSpryker\Zed\PriceProductPriceList\Dependency\Facade\PriceProductPriceListToPriceProductFacadeInterface $priceProductFacade
     * @param \FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListRepositoryInterface $repository
     * @param \FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListEntityManagerInterface $entityManager
     */
    public function __construct(
        PriceProductPriceListToPriceProductFacadeInterface $priceProductFacade,
        PriceProductPriceListRepositoryInterface $repository,
        PriceProductPriceListEntityManagerInterface $entityManager
    ) {
        $this->priceProductFacade = $priceProductFacade;
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer
     */
    public function persist(PriceProductTransfer $priceProductTransfer): PriceProductTransfer
    {
        $priceProductTransfer
            ->requireMoneyValue()
            ->requirePriceDimension();

        $priceDimensionTransfer = $priceProductTransfer->getPriceDimension();
        $priceDimensionTransfer->requireIdPriceList();

        if (!$priceProductTransfer->getIdPriceProduct()) {
            $priceProductTransfer = $this->priceProductFacade->persistPriceProductStore($priceProductTransfer);
        }

        $priceProductPriceListEntityTransfer = $this->getPriceProductPriceListEntityTransfer($priceProductTransfer);

        $this->entityManager->persistEntity($priceProductPriceListEntityTransfer);

        return $priceProductTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return \Generated\Shared\Transfer\FosPriceProductPriceListEntityTransfer
     */
    protected function getPriceProductPriceListEntityTransfer(PriceProductTransfer $priceProductTransfer): FosPriceProductPriceListEntityTransfer
    {
        $idPriceProductMerchantRelationship = $this->repository
            ->findIdByPriceProductTransfer($priceProductTransfer);

        $priceProductMerchantRelationshipEntityTransfer = (new FosPriceProductPriceListEntityTransfer())
            ->setIdPriceProductPriceList($idPriceProductMerchantRelationship)
            ->setFkPriceList($priceProductTransfer->getPriceDimension()->getIdPriceList())
            ->setFkPriceProductStore((string)$priceProductTransfer->getMoneyValue()->getIdEntity());

        if ($priceProductTransfer->getIdProduct()) {
            $priceProductMerchantRelationshipEntityTransfer->setFkProduct($priceProductTransfer->getIdProduct());

            return $priceProductMerchantRelationshipEntityTransfer;
        }

        $priceProductMerchantRelationshipEntityTransfer->setFkProductAbstract($priceProductTransfer->getIdProductAbstract());

        return $priceProductMerchantRelationshipEntityTransfer;
    }

    /**
     * @param int $idPriceProductStore
     *
     * @return void
     */
    public function deleteByIdPriceProductStore(int $idPriceProductStore): void
    {
        $this->entityManager->deleteByIdPriceProductStore($idPriceProductStore);
    }
}
