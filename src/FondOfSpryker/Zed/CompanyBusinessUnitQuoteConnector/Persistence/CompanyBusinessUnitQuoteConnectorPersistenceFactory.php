<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Persistence;

use FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\CompanyBusinessUnitQuoteConnectorDependencyProvider;
use FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Persistence\Propel\Mapper\CompanyUserMapper;
use FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Persistence\Propel\Mapper\CompanyUserMapperInterface;
use Orm\Zed\CompanyUser\Persistence\Base\SpyCompanyUserQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Persistence\CompanyBusinessUnitQuoteConnectorRepositoryInterface getRepository()
 */
class CompanyBusinessUnitQuoteConnectorPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\CompanyUser\Persistence\Base\SpyCompanyUserQuery
     */
    public function getCompanyUserQuery(): SpyCompanyUserQuery
    {
        return $this->getProvidedDependency(
            CompanyBusinessUnitQuoteConnectorDependencyProvider::PROPEL_QUERY_COMPANY_USER
        );
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Persistence\Propel\Mapper\CompanyUserMapperInterface
     */
    public function createCompanyUserMapper(): CompanyUserMapperInterface
    {
        return new CompanyUserMapper();
    }
}
