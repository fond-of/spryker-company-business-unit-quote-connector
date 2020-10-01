<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Business;

use Generated\Shared\Transfer\CompanyBusinessUnitQuoteListRequestTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitQuoteListTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Business\CompanyBusinessUnitQuoteConnectorBusinessFactory getFactory()
 * @method \FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Persistence\CompanyBusinessUnitQuoteConnectorRepositoryInterface getRepository()
 */
class CompanyBusinessUnitQuoteConnectorFacade extends AbstractFacade implements CompanyBusinessUnitQuoteConnectorFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitQuoteListRequestTransfer $companyBusinessUnitQuoteListRequestTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitQuoteListTransfer
     */
    public function findQuotes(
        CompanyBusinessUnitQuoteListRequestTransfer $companyBusinessUnitQuoteListRequestTransfer
    ): CompanyBusinessUnitQuoteListTransfer {
        return $this->getFactory()->createQuoteReader()->findByCompanyBusinessUnitQuoteListRequest(
            $companyBusinessUnitQuoteListRequestTransfer
        );
    }
}
