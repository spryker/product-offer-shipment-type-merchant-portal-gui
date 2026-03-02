<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductOfferShipmentTypeMerchantPortalGui\Dependency\Facade;

use Generated\Shared\Transfer\ShipmentTypeCollectionTransfer;
use Generated\Shared\Transfer\ShipmentTypeCriteriaTransfer;

class ProductOfferShipmentTypeMerchantPortalGuiToShipmentTypeFacadeBridge implements ProductOfferShipmentTypeMerchantPortalGuiToShipmentTypeFacadeInterface
{
    /**
     * @var \Spryker\Zed\ShipmentType\Business\ShipmentTypeFacadeInterface
     */
    protected $shipmentTypeFacade;

    /**
     * @param \Spryker\Zed\ShipmentType\Business\ShipmentTypeFacadeInterface $shipmentTypeFacade
     */
    public function __construct($shipmentTypeFacade)
    {
        $this->shipmentTypeFacade = $shipmentTypeFacade;
    }

    public function getShipmentTypeCollection(
        ShipmentTypeCriteriaTransfer $shipmentTypeCriteriaTransfer
    ): ShipmentTypeCollectionTransfer {
        return $this->shipmentTypeFacade->getShipmentTypeCollection($shipmentTypeCriteriaTransfer);
    }
}
