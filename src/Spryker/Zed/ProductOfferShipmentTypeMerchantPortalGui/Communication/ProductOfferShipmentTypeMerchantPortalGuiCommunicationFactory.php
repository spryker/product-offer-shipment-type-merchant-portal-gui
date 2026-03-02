<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductOfferShipmentTypeMerchantPortalGui\Communication;

use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Spryker\Zed\ProductOfferShipmentTypeMerchantPortalGui\Communication\Expander\ShipmentTypeProductOfferFormExpander;
use Spryker\Zed\ProductOfferShipmentTypeMerchantPortalGui\Communication\Expander\ShipmentTypeProductOfferFormExpanderInterface;
use Spryker\Zed\ProductOfferShipmentTypeMerchantPortalGui\Communication\Expander\ShipmentTypeProductOfferFormViewExpander;
use Spryker\Zed\ProductOfferShipmentTypeMerchantPortalGui\Communication\Expander\ShipmentTypeProductOfferFormViewExpanderInterface;
use Spryker\Zed\ProductOfferShipmentTypeMerchantPortalGui\Communication\Form\DataProvider\ShipmentTypeProductOfferDataProvider;
use Spryker\Zed\ProductOfferShipmentTypeMerchantPortalGui\Communication\Form\DataProvider\ShipmentTypeProductOfferDataProviderInterface;
use Spryker\Zed\ProductOfferShipmentTypeMerchantPortalGui\Communication\Form\Transformer\ShipmentTypeDataTransformer;
use Spryker\Zed\ProductOfferShipmentTypeMerchantPortalGui\Dependency\Facade\ProductOfferShipmentTypeMerchantPortalGuiToShipmentTypeFacadeInterface;
use Spryker\Zed\ProductOfferShipmentTypeMerchantPortalGui\ProductOfferShipmentTypeMerchantPortalGuiDependencyProvider;
use Symfony\Component\Form\DataTransformerInterface;
use Twig\Environment;

/**
 * @method \Spryker\Zed\ProductOfferShipmentTypeMerchantPortalGui\ProductOfferShipmentTypeMerchantPortalGuiConfig getConfig()
 */
class ProductOfferShipmentTypeMerchantPortalGuiCommunicationFactory extends AbstractCommunicationFactory
{
    public function createShipmentTypeProductOfferFormExpander(): ShipmentTypeProductOfferFormExpanderInterface
    {
        return new ShipmentTypeProductOfferFormExpander(
            $this->createShipmentTypeProductOfferDataProvider(),
            $this->createShipmentTypeDataTransformer(),
        );
    }

    public function createShipmentTypeProductOfferDataProvider(): ShipmentTypeProductOfferDataProviderInterface
    {
        return new ShipmentTypeProductOfferDataProvider($this->getShipmentTypeFacade());
    }

    /**
     * @return \Symfony\Component\Form\DataTransformerInterface<\ArrayObject<int, \Generated\Shared\Transfer\ShipmentTypeTransfer>|null, list<string>|null>
     */
    public function createShipmentTypeDataTransformer(): DataTransformerInterface
    {
        return new ShipmentTypeDataTransformer();
    }

    public function createShipmentTypeProductOfferFormViewExpander(): ShipmentTypeProductOfferFormViewExpanderInterface
    {
        return new ShipmentTypeProductOfferFormViewExpander($this->getTwigEnvironment());
    }

    public function getShipmentTypeFacade(): ProductOfferShipmentTypeMerchantPortalGuiToShipmentTypeFacadeInterface
    {
        return $this->getProvidedDependency(ProductOfferShipmentTypeMerchantPortalGuiDependencyProvider::FACADE_SHIPMENT_TYPE);
    }

    public function getTwigEnvironment(): Environment
    {
        return $this->getProvidedDependency(ProductOfferShipmentTypeMerchantPortalGuiDependencyProvider::SERVICE_TWIG);
    }
}
