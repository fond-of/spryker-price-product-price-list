<?php

namespace FondOfSpryker\Zed\PriceProductPriceList\Business\Model;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\PriceProductPriceList\Dependency\Facade\PriceProductPriceListToPriceProductFacadeInterface;
use FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListEntityManagerInterface;
use FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListRepositoryInterface;
use Generated\Shared\Transfer\MoneyValueTransfer;
use Generated\Shared\Transfer\PriceProductDimensionTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Spryker\Shared\Kernel\Transfer\EntityTransferInterface;

class PriceListPriceWriterTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\PriceProductPriceList\Business\Model\PriceListPriceWriter
     */
    protected $priceListPriceWriter;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceProductPriceList\Dependency\Facade\PriceProductPriceListToPriceProductFacadeInterface
     */
    protected $priceProductFacadeMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListRepositoryInterface
     */
    protected $repositoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListEntityManagerInterface
     */
    protected $entityManagerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\PriceProductTransfer
     */
    protected $priceProductTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\PriceProductDimensionTransfer
     */
    protected $priceProductDimensionTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\MoneyValueTransfer
     */
    protected $moneyValueTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Shared\Kernel\Transfer\EntityTransferInterface
     */
    protected $entityTransferInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->priceProductFacadeMock = $this->getMockBuilder(PriceProductPriceListToPriceProductFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->repositoryMock = $this->getMockBuilder(PriceProductPriceListRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->entityManagerMock = $this->getMockBuilder(PriceProductPriceListEntityManagerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceProductTransferMock = $this->getMockBuilder(PriceProductTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceProductDimensionTransferMock = $this->getMockBuilder(PriceProductDimensionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->moneyValueTransferMock = $this->getMockBuilder(MoneyValueTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->entityTransferInterfaceMock = $this->getMockBuilder(EntityTransferInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListPriceWriter = new PriceListPriceWriter(
            $this->priceProductFacadeMock,
            $this->repositoryMock,
            $this->entityManagerMock
        );
    }

    /**
     * @return void
     */
    /*
    public function testPersist(): void
    {
        $this->priceProductTransferMock->expects($this->atLeastOnce())
            ->method('requireMoneyValue')
            ->willReturn($this->priceProductTransferMock);

        $this->priceProductTransferMock->expects($this->atLeastOnce())
            ->method('requirePriceDimension')
            ->willReturn($this->priceProductTransferMock);

        $this->priceProductTransferMock->expects($this->atLeastOnce())
            ->method('getPriceDimension')
            ->willReturn($this->priceProductDimensionTransferMock);

        $this->repositoryMock->expects($this->atLeastOnce())
            ->method('findIdByPriceProductTransfer')
            ->with($this->priceProductTransferMock)
            ->willReturn(1);

        $this->priceProductTransferMock->expects($this->atLeastOnce())
            ->method('getPriceDimension')
            ->willReturn($this->priceProductDimensionTransferMock);

        $this->priceProductDimensionTransferMock->expects($this->atLeastOnce())
            ->method('getIdPriceList')
            ->willReturn(1);

        $this->priceProductTransferMock->expects($this->atLeastOnce())
            ->method('getMoneyValue')
            ->willReturn($this->moneyValueTransferMock);

        $this->moneyValueTransferMock->expects($this->atLeastOnce())
            ->method('getIdEntity')
            ->willReturn(1);

        $this->priceProductTransferMock->expects($this->atLeastOnce())
            ->method('getIdProduct')
            ->willReturn(1);

        $this->entityManagerMock->expects($this->atLeastOnce())
            ->method('persistEntity')
            ->willReturn($this->entityTransferInterfaceMock);

        $this->assertInstanceOf(PriceProductTransfer::class, $this->priceListPriceWriter->persist($this->priceProductTransferMock));
    }
    */

    /**
     * @return void
     */
    public function testDeleteByIdPriceProductStore(): void
    {
        $this->priceListPriceWriter->deleteByIdPriceProductStore(1);
    }
}
