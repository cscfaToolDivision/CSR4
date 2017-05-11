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
use CSDT\CSR4\Mapper\Manager\Resolver\GenericMapperResolver;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Mapper\MapperInterface;
use CSDT\CSR4\ConfidenceInterface;
use CSDT\CSR4\Mapper\Manager\Resolver\Exception\UnsupportedMapperException;

/**
 * GenericMapperResolverTest.php
 *
 * This class is used to test the logic of the MapperResolver
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class GenericMapperResolverTest extends TestCase
{
    /**
     * Instance
     *
     * This proeprty store the test instance of GenericMapperResolver
     *
     * @var GenericMapperResolver
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
        $this->instance = new GenericMapperResolver();
    }

    /**
     * Test resolveMapper
     *
     * This method test the resolveMapper logic of the GenericMapperResolver
     *
     * @return void
     */
    public function testResolveMapper()
    {
        $mappers = new \SplObjectStorage();

        $metadata = $this->createMock(ObjectMetadataInterface::class);
        $dto = $this->createMock(CSR3DTOInterface::class);
        $mappedObject = $this->createMock(\stdClass::class);

        $mapper1 = $this->createMock(MapperInterface::class);
        $mapper1->expects($this->any())
            ->method('support')
            ->willReturn(ConfidenceInterface::UNSUPPORTED_CONFIDENCE);

        $mapper2 = $this->createMock(MapperInterface::class);
        $mapper2->expects($this->any())
            ->method('support')
            ->willReturn(ConfidenceInterface::HIGH_CONFIDENCE);

        $mappers->attach($mapper1);
        $mappers->attach($mapper2);

        $this->assertSame(
            $mapper2,
            $this->instance->resolveMapper(
                $mappers,
                $metadata,
                $dto,
                $mappedObject
            )
        );
    }

    /**
     * Test resolveMapper exception
     *
     * This method test the resolveMapper logic of the GenericMapperResolver in
     * case of unsupported mapper
     *
     * @return void
     */
    public function testResolveMapperException()
    {
        $this->expectException(UnsupportedMapperException::class);

        $mappers = new \SplObjectStorage();

        $metadata = $this->createMock(ObjectMetadataInterface::class);
        $dto = $this->createMock(CSR3DTOInterface::class);
        $mappedObject = $this->createMock(\stdClass::class);

        $this->instance->resolveMapper(
            $mappers,
            $metadata,
            $dto,
            $mappedObject
        );
    }
}
