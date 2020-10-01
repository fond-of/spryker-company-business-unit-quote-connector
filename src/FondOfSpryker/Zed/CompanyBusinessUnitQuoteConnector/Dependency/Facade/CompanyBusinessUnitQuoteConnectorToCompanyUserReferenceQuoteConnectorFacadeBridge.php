<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Dependency\Facade;

use FondOfSpryker\Zed\CompanyUserReferenceQuoteConnector\Business\CompanyUserReferenceQuoteConnectorFacadeInterface;
use Generated\Shared\Transfer\CompanyUserReferenceCollectionTransfer;
use Generated\Shared\Transfer\QuoteCollectionTransfer;

class CompanyBusinessUnitQuoteConnectorToCompanyUserReferenceQuoteConnectorFacadeBridge implements
    CompanyBusinessUnitQuoteConnectorToCompanyUserReferenceQuoteConnectorFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUserReferenceQuoteConnector\Business\CompanyUserReferenceQuoteConnectorFacadeInterface
     */
    protected $companyUserReferenceQuoteConnectorFacade;

    /**
     * @param \FondOfSpryker\Zed\CompanyUserReferenceQuoteConnector\Business\CompanyUserReferenceQuoteConnectorFacadeInterface $companyUserReferenceQuoteConnectorFacade
     */
    public function __construct(CompanyUserReferenceQuoteConnectorFacadeInterface $companyUserReferenceQuoteConnectorFacade)
    {
        $this->companyUserReferenceQuoteConnectorFacade = $companyUserReferenceQuoteConnectorFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyUserReferenceCollectionTransfer $companyUserReferenceCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteCollectionTransfer
     */
    public function findQuotesByCompanyUserReferences(
        CompanyUserReferenceCollectionTransfer $companyUserReferenceCollectionTransfer
    ): QuoteCollectionTransfer
    {
        return $this->companyUserReferenceQuoteConnectorFacade->findQuotesByCompanyUserReferences(
            $companyUserReferenceCollectionTransfer
        );
    }
}
