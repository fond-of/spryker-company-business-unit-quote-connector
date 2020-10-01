<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Persistence;

use Generated\Shared\Transfer\CompanyBusinessUnitQuoteListRequestTransfer;
use Generated\Shared\Transfer\CompanyUserTransfer;

interface CompanyBusinessUnitQuoteConnectorRepositoryInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitQuoteListRequestTransfer $companyBusinessUnitQuoteListRequest
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer|null
     */
    public function getActiveCompanyUserByCompanyBusinessUnitQuoteListRequest(
        CompanyBusinessUnitQuoteListRequestTransfer $companyBusinessUnitQuoteListRequest
    ): ?CompanyUserTransfer;

    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitQuoteListRequestTransfer $companyBusinessUnitQuoteListRequest
     *
     * @return string[]
     */
    public function getActiveCompanyUserReferencesByCompanyBusinessUnitQuoteListRequest(
        CompanyBusinessUnitQuoteListRequestTransfer $companyBusinessUnitQuoteListRequest
    ): array;
}
