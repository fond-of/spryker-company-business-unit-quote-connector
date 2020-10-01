<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Business;

use FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Business\Model\CompanyUserReader;
use FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Business\Model\CompanyUserReaderInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Business\Model\QuoteReader;
use FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Business\Model\QuoteReaderInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\CompanyBusinessUnitQuoteConnectorDependencyProvider;
use FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Dependency\Facade\CompanyBusinessUnitQuoteConnectorToCompanyUserReferenceQuoteConnectorFacadeInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Dependency\Facade\CompanyBusinessUnitQuoteConnectorToPermissionFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Persistence\CompanyBusinessUnitQuoteConnectorRepositoryInterface getRepository()
 */
class CompanyBusinessUnitQuoteConnectorBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Business\Model\QuoteReaderInterface
     */
    public function createQuoteReader(): QuoteReaderInterface
    {
        return new QuoteReader(
            $this->createCompanyUserReader(),
            $this->getCompanyUserReferenceQuoteConnectorFacade()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Business\Model\CompanyUserReaderInterface
     */
    protected function createCompanyUserReader(): CompanyUserReaderInterface
    {
        return new CompanyUserReader(
            $this->getRepository(),
            $this->getPermissionFacade()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Dependency\Facade\CompanyBusinessUnitQuoteConnectorToPermissionFacadeInterface
     */
    protected function getPermissionFacade(): CompanyBusinessUnitQuoteConnectorToPermissionFacadeInterface
    {
        return $this->getProvidedDependency(CompanyBusinessUnitQuoteConnectorDependencyProvider::FACADE_PERMISSION);
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Dependency\Facade\CompanyBusinessUnitQuoteConnectorToCompanyUserReferenceQuoteConnectorFacadeInterface
     */
    protected function getCompanyUserReferenceQuoteConnectorFacade(): CompanyBusinessUnitQuoteConnectorToCompanyUserReferenceQuoteConnectorFacadeInterface
    {
        return $this->getProvidedDependency(CompanyBusinessUnitQuoteConnectorDependencyProvider::FACADE_COMPANY_USER_REFERENCE_QUOTE_CONNECTOR);
    }
}
