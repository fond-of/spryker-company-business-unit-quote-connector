<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Business\Model\QuoteReader;
use FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\CompanyBusinessUnitQuoteConnectorDependencyProvider;
use FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Dependency\Facade\CompanyBusinessUnitQuoteConnectorToCompanyUserReferenceQuoteConnectorFacadeInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Dependency\Facade\CompanyBusinessUnitQuoteConnectorToPermissionFacadeInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Persistence\CompanyBusinessUnitQuoteConnectorRepository;
use Spryker\Zed\Kernel\Container;

class CompanyBusinessUnitQuoteConnectorBusinessFactoryTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Dependency\Facade\CompanyBusinessUnitQuoteConnectorToPermissionFacadeInterface
     */
    protected $permissionFacadeMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Dependency\Facade\CompanyBusinessUnitQuoteConnectorToCompanyUserReferenceQuoteConnectorFacadeInterface
     */
    protected $companyUserReferenceQuoteConnectorFacadeMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Persistence\CompanyBusinessUnitQuoteConnectorRepository
     */
    protected $repositoryMock;

    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitQuoteConnector\Business\CompanyBusinessUnitQuoteConnectorBusinessFactory
     */
    protected $companyBusinessUnitQuoteConnectorBusinessFactory;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->repositoryMock = $this->getMockBuilder(CompanyBusinessUnitQuoteConnectorRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->permissionFacadeMock = $this->getMockBuilder(CompanyBusinessUnitQuoteConnectorToPermissionFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUserReferenceQuoteConnectorFacadeMock = $this->getMockBuilder(CompanyBusinessUnitQuoteConnectorToCompanyUserReferenceQuoteConnectorFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitQuoteConnectorBusinessFactory = new CompanyBusinessUnitQuoteConnectorBusinessFactory();
        $this->companyBusinessUnitQuoteConnectorBusinessFactory->setContainer($this->containerMock);
        $this->companyBusinessUnitQuoteConnectorBusinessFactory->setRepository($this->repositoryMock);
    }

    /**
     * @return void
     */
    public function testCreateQuoteReader(): void
    {
        $this->containerMock->expects(self::atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects(self::atLeastOnce())
            ->method('get')
            ->withConsecutive(
                [CompanyBusinessUnitQuoteConnectorDependencyProvider::FACADE_PERMISSION],
                [CompanyBusinessUnitQuoteConnectorDependencyProvider::FACADE_COMPANY_USER_REFERENCE_QUOTE_CONNECTOR]
            )->willReturnOnConsecutiveCalls(
                $this->permissionFacadeMock,
                $this->companyUserReferenceQuoteConnectorFacadeMock
            );

        self::assertInstanceOf(
            QuoteReader::class,
            $this->companyBusinessUnitQuoteConnectorBusinessFactory->createQuoteReader()
        );
    }
}
