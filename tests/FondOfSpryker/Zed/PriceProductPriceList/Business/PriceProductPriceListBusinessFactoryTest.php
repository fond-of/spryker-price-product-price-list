<?php

namespace FondOfSpryker\Zed\PriceProductPriceList\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\PriceProductPriceList\Business\Model\PriceListPriceWriterInterface;
use FondOfSpryker\Zed\PriceProductPriceList\Business\Model\PriceProductDimensionExpanderInterface;
use FondOfSpryker\Zed\PriceProductPriceList\Dependency\Facade\PriceProductPriceListToPriceListFacadeInterface;
use FondOfSpryker\Zed\PriceProductPriceList\Dependency\Facade\PriceProductPriceListToPriceProductFacadeInterface;
use FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListEntityManager;
use FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListRepository;
use FondOfSpryker\Zed\PriceProductPriceList\PriceProductPriceListDependencyProvider;
use Spryker\Zed\Kernel\Container;

class PriceProductPriceListBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\PriceProductPriceList\Business\PriceProductPriceListBusinessFactory
     */
    protected $priceProductPriceListBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListRepository
     */
    protected $priceProductPriceListRepositoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceProductPriceList\Persistence\PriceProductPriceListEntityManager
     */
    protected $priceProductPriceListEntityManagerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceProductPriceList\Dependency\Facade\PriceProductPriceListToPriceListFacadeInterface
     */
    protected $priceProductPriceListToPriceListFacadeInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceProductPriceList\Dependency\Facade\PriceProductPriceListToPriceProductFacadeInterface
     */
    protected $priceProductPriceListToPriceProductFacadeInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceProductPriceListRepositoryMock = $this->getMockBuilder(PriceProductPriceListRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceProductPriceListEntityManagerMock = $this->getMockBuilder(PriceProductPriceListEntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceProductPriceListToPriceListFacadeInterfaceMock = $this->getMockBuilder(PriceProductPriceListToPriceListFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceProductPriceListToPriceProductFacadeInterfaceMock = $this->getMockBuilder(PriceProductPriceListToPriceProductFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceProductPriceListBusinessFactory = new PriceProductPriceListBusinessFactory();
        $this->priceProductPriceListBusinessFactory->setRepository($this->priceProductPriceListRepositoryMock);
        $this->priceProductPriceListBusinessFactory->setEntityManager($this->priceProductPriceListEntityManagerMock);
        $this->priceProductPriceListBusinessFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreatePriceProductDimensionExpander(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(PriceProductPriceListDependencyProvider::FACADE_PRICE_LIST)
            ->willReturn($this->priceProductPriceListToPriceListFacadeInterfaceMock);

        $this->assertInstanceOf(PriceProductDimensionExpanderInterface::class, $this->priceProductPriceListBusinessFactory->createPriceProductDimensionExpander());
    }

    /**
     * @return void
     */
    public function testCreatePriceListPriceWrite(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(PriceProductPriceListDependencyProvider::FACADE_PRICE_PRODUCT)
            ->willReturn($this->priceProductPriceListToPriceProductFacadeInterfaceMock);

        $this->assertInstanceOf(PriceListPriceWriterInterface::class, $this->priceProductPriceListBusinessFactory->createPriceListPriceWriter());
    }
}
