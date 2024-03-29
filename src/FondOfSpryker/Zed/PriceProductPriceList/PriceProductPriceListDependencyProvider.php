<?php

namespace FondOfSpryker\Zed\PriceProductPriceList;

use FondOfSpryker\Zed\PriceProductPriceList\Dependency\Facade\PriceProductPriceListToPriceListFacadeBridge;
use FondOfSpryker\Zed\PriceProductPriceList\Dependency\Facade\PriceProductPriceListToPriceProductFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class PriceProductPriceListDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_PRICE_LIST = 'FACADE_PRICE_LIST';

    /**
     * @var string
     */
    public const FACADE_PRICE_PRODUCT = 'FACADE_PRICE_PRODUCT';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addPriceListFacade($container);
        $container = $this->addPriceProductFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addPriceListFacade(Container $container): Container
    {
        $container[static::FACADE_PRICE_LIST] = static function (Container $container) {
            return new PriceProductPriceListToPriceListFacadeBridge(
                $container->getLocator()->priceList()->facade(),
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addPriceProductFacade(Container $container): Container
    {
        $container[static::FACADE_PRICE_PRODUCT] = static function (Container $container) {
            return new PriceProductPriceListToPriceProductFacadeBridge(
                $container->getLocator()->priceProduct()->facade(),
            );
        };

        return $container;
    }
}
