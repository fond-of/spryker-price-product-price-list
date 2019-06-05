<?php

namespace FondOfSpryker\Zed\PriceProductPriceList\Dependency;

interface PriceProductPriceListEvents
{
    /**
     * Specification:
     * - This event will be used for spy_price_product_price_list entity creation
     *
     * @api
     */
    public const ENTITY_SPY_PRICE_PRODUCT_PRICE_LIST_CREATE = 'Entity.spy_price_product_price_list.create';

    /**
     * Specification:
     * - This event will be used for spy_price_product_price_list entity update
     *
     * @api
     */
    public const ENTITY_SPY_PRICE_PRODUCT_PRICE_LIST_UPDATE = 'Entity.spy_price_product_price_list.update';

    /**
     * Specification:
     * - This event will be used for spy_price_product_price_list entity delete
     *
     * @api
     */
    public const ENTITY_SPY_PRICE_PRODUCT_PRICE_LIST_DELETE = 'Entity.spy_price_product_price_list.delete';

    /**
     * Specification:
     * - This event will be used for price_abstract publishing
     *
     * @api
     */
    public const PRICE_ABSTRACT_PUBLISH = 'Price.price_abstract.publish';

    /**
     * Specification:
     * - This event will be used for price_abstract un-publishing
     *
     * @api
     */
    public const PRICE_ABSTRACT_UNPUBLISH = 'Price.price_abstract.unpublish';

    /**
     * Specification:
     * - This event will be used for price_concrete publishing
     *
     * @api
     */
    public const PRICE_CONCRETE_PUBLISH = 'Price.price_concrete.publish';

    /**
     * Specification:
     * - This event will be used for price_concrete un-publishing
     *
     * @api
     */
    public const PRICE_CONCRETE_UNPUBLISH = 'Price.price_concrete.unpublish';

    /**
     * Specification:
     * - This event will be used for spy_price_product entity creation
     *
     * @api
     */
    public const ENTITY_SPY_PRICE_PRODUCT_CREATE = 'Entity.spy_price_product.create';

    /**
     * Specification:
     * - This event will be used for spy_price_product entity changes
     *
     * @api
     */
    public const ENTITY_SPY_PRICE_PRODUCT_UPDATE = 'Entity.spy_price_product.update';

    /**
     * Specification:
     * - This event will be used for spy_price_product entity deletion
     *
     * @api
     */
    public const ENTITY_SPY_PRICE_PRODUCT_DELETE = 'Entity.spy_price_product.delete';

    /**
     * Specification:
     * - This event will be use:d for spy_price_product_store entity creation
     *
     * @api
     */
    public const ENTITY_SPY_PRICE_PRODUCT_STORE_CREATE = 'Entity.spy_price_product_store.create';

    /**
     * Specification:
     * - This event will be used for spy_price_product_store entity changes
     *
     * @api
     */
    public const ENTITY_SPY_PRICE_PRODUCT_STORE_UPDATE = 'Entity.spy_price_product_store.update';

    /**
     * Specification:
     * - This event will be used for spy_price_product_store entity deletion
     *
     * @api
     */
    public const ENTITY_SPY_PRICE_PRODUCT_STORE_DELETE = 'Entity.spy_price_product_store.delete';
}
