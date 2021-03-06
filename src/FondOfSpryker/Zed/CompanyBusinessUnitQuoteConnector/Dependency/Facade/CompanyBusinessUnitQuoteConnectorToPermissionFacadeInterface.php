<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Dependency\Facade;

interface CompanyBusinessUnitQuoteConnectorToPermissionFacadeInterface
{
    /**
     * @param string $permissionKey
     * @param int|string $identifier
     * @param int|string|array|null $context
     *
     * @return bool
     */
    public function can($permissionKey, $identifier, $context = null): bool;
}
