<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\Tests\Mapper\Manager\Resolver;

use PHPUnit\Framework\TestCase;
use CSDT\CSR4\Mapper\Manager\Resolver\GenericFactoryResolver;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Mapper\Manager\ObjectMappingFactoryInterface;
use CSDT\CSR4\ConfidenceInterface;
use CSDT\CSR4\Mapper\Manager\Resolver\Exception\UnresolvableFactoryException;

/**
 * GenericFactoryResolverTest.php
 *
 * This class is used to test the GenericFactoryResolver
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class GenericFactoryResolverTest extends TestCase
{
    /**
     * Instance
     *
     * This proeprty store the test instance of GenericFactoryResolver
     *
     * @var GenericFactoryResolver
     */
    private $instance;

    /**
     * Set up
     *
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->instance = new GenericFactoryResolver();
    }

    /**
     * Test resolveFactory
     *
     * This method test the resolveFactory logic of the GenericFactoryResolver
     *
     * @return void
     */
    public function testResolveFactory()
    {
        $factories = new \SplObjectStorage();

        $metadata = $this->createMock(ObjectMetadataInterface::class);
        $dto = $this->createMock(CSR3DTOInterface::class);

        $factory1 = $this->createMock(ObjectMappingFactoryInterface::class);
        $factory1->expects($this->any())
            ->method('support')
            ->willReturn(ConfidenceInterface::UNSUPPORTED_CONFIDENCE);

        $factory2 = $this->createMock(ObjectMappingFactoryInterface::class);
        $factory2->expects($this->any())
            ->method('support')
            ->willReturn(ConfidenceInterface::HIGH_CONFIDENCE);

        $factories->attach($factory1);
        $factories->attach($factory2);

        $this->assertSame(
            $factory2,
            $this->instance->resolveFactory(
                $factories,
                $metadata,
                $dto
            )
        );
    }

    /**
     * Test resolveFactory exception
     *
     * This method test the resolveMapper logic of the GenericFactoryResolver in
     * case of unresolved factory
     *
     * @return void
     */
    public function testResolveFactoryException()
    {
        $this->expectException(UnresolvableFactoryException::class);

        $factories = new \SplObjectStorage();

        $metadata = $this->createMock(ObjectMetadataInterface::class);
        $dto = $this->createMock(CSR3DTOInterface::class);

        $this->instance->resolveFactory(
            $factories,
            $metadata,
            $dto
        );
    }
}
