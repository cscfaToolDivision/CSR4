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
namespace CSDT\CSR4\Tests\Mapper\Manager;

use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Mapper\Manager\AbstractMapperManager;
use CSDT\CSR4\Mapper\Manager\GenericMapperManager;
use CSDT\CSR4\Mapper\Manager\Resolver\FactoryResolverInterface;
use CSDT\CSR4\Mapper\Manager\Resolver\MapperResolverInterface;
use CSDT\CSR4\Mapper\Manager\Resolver\MetadataResolverInterface;
use CSDT\CSR4\Mapper\MapperInterface;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use PHPUnit\Framework\TestCase;

/**
 * GenericMapperManagerMappingTest.php
 *
 * This class is used to validate the GenericMapperManager logic
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class MapperManagerMappingTest extends TestCase
{
    /**
     * Instance
     *
     * This proeprty store the test instance of GenericMapperManager
     *
     * @var GenericMapperManager
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
        $this->instance = new GenericMapperManager();
    }

    /**
     * Test mapToObject
     *
     * This method validate the GenericMapperManager mapToObject
     * logic
     *
     * @return void
     */
    public function testMapToObject()
    {
        $dto = $this->createMock(CSR3DTOInterface::class);
        $mappedObject = $this->createMock(\stdClass::class);
        $group = [];
        $meta = $this->createMock(ObjectMetadataInterface::class);
        $mapper = $this->createMock(MapperInterface::class);
        $mappedResult = $this->createMock(\stdClass::class);

        $mapper->expects($this->once())
            ->method('mapToObject')
            ->with(
                $this->identicalTo($meta),
                $this->identicalTo($dto),
                $this->identicalTo($mappedObject),
                $this->identicalTo($group)
            )
            ->willReturn($mappedResult);

        $this->setMetadataResolver($dto, $meta, $mappedObject);

        $factoryResolver = $this->createMock(FactoryResolverInterface::class);
        $factoryResolver->expects($this->never())
            ->method('resolveFactory');
        $factResolverReflex = new \ReflectionProperty(AbstractMapperManager::class, 'factoryResolver');
        $factResolverReflex->setAccessible(true);
        $factResolverReflex->setValue($this->instance, $factoryResolver);

        $this->setMapperResolver($mapper, $dto, $meta, $mappedObject);

        $this->assertSame($mappedResult, $this->instance->mapToObject($dto, $mappedObject, $group));
    }

    /**
     * Test mapToDto
     *
     * This method validate the GenericMapperManager mapToDto
     * logic
     *
     * @return void
     */
    public function testMapToDto()
    {
        $dto = $this->createMock(CSR3DTOInterface::class);
        $mappedObject = $this->createMock(\stdClass::class);
        $group = [];
        $meta = $this->createMock(ObjectMetadataInterface::class);
        $mapper = $this->createMock(MapperInterface::class);
        $mappedResult = $this->createMock(\stdClass::class);

        $mapper->expects($this->once())
            ->method('mapToDto')
            ->with(
                $this->identicalTo($meta),
                $this->identicalTo($dto),
                $this->identicalTo($mappedObject),
                $this->identicalTo($group)
            )
            ->willReturn($mappedResult);

        $this->setMetadataResolver($dto, $meta, $mappedObject);
        $this->setMapperResolver($mapper, $dto, $meta, $mappedObject);

        $this->assertSame($mappedResult, $this->instance->mapToDto($dto, $mappedObject, $group));
    }

    /**
     * Set metadata resolver
     *
     * This method inject a metadata resolver into the current instance
     *
     * @param CSR3DTOInterface        $dto          The current dto
     * @param ObjectMetadataInterface $meta         The current metadata
     * @param mixed                   $mappedObject The current mapped object
     *
     * @return void
     */
    private function setMetadataResolver(CSR3DTOInterface $dto, ObjectMetadataInterface $meta, $mappedObject)
    {
        $metadataResolver = $this->createMock(MetadataResolverInterface::class);
        $metadataResolver->expects($this->once())
            ->method('resolveMetadata')
            ->with($this->anything(), $this->identicalTo($dto), $this->identicalTo($mappedObject))
            ->willReturn($meta);
        $metaResolverReflex = new \ReflectionProperty(AbstractMapperManager::class, 'metadataResolver');
        $metaResolverReflex->setAccessible(true);
        $metaResolverReflex->setValue($this->instance, $metadataResolver);
    }

    /**
     * Set mapper resolver
     *
     * This method inject a mapper resolver into the current instance
     *
     * @param MapperInterface         $mapper       The current mapper
     * @param CSR3DTOInterface        $dto          The current dto
     * @param ObjectMetadataInterface $meta         The current metadata
     * @param mixed                   $mappedObject The current mapped object
     *
     * @return void
     */
    private function setMapperResolver($mapper, $dto, $meta, $mappedObject)
    {
        $mapperResolver = $this->createMock(MapperResolverInterface::class);
        $mapperResolver->expects($this->once())
            ->method('resolveMapper')
            ->with(
                $this->anything(),
                $this->identicalTo($meta),
                $this->identicalTo($dto),
                $this->identicalTo($mappedObject)
            )
            ->willReturn($mapper);
        $mapperResolverReflex = new \ReflectionProperty(AbstractMapperManager::class, 'mapperResolver');
        $mapperResolverReflex->setAccessible(true);
        $mapperResolverReflex->setValue($this->instance, $mapperResolver);
    }
}
