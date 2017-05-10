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

use CSDT\CSR4\Mapper\Manager\GenericMapperManager;
use PHPUnit\Framework\TestCase;
use CSDT\CSR4\Mapper\Manager\AbstractMapperManager;
use CSDT\CSR4\Mapper\Manager\Resolver\MetadataResolverInterface;
use CSDT\CSR4\Mapper\Manager\Resolver\FactoryResolverInterface;
use CSDT\CSR4\Mapper\Manager\Resolver\MapperResolverInterface;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR4\Mapper\Manager\ObjectMappingFactoryInterface;
use CSDT\CSR4\Mapper\MapperInterface;
use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Mapper\Manager\MetadataResolverException;
use CSDT\CSR4\Mapper\Manager\FactoryResolverException;
use CSDT\CSR4\Mapper\Manager\MapperResolverException;

/**
 * GenericMapperManagerTest.php
 *
 * This class is used to validate the GenericMapperManager logic
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class GenericMapperManagerTest extends TestCase
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
     * Test constructor
     *
     * This method validate the GenericMapperManager constructor
     * logic
     *
     * @return void
     */
    public function testConstructor()
    {
        $reflex = new \ReflectionClass(AbstractMapperManager::class);

        $nullables = [
            'metadataResolver',
            'factoryResolver',
            'mapperResolver'
        ];

        foreach ($nullables as $property) {
            $propertyReflex = $reflex->getProperty($property);
            $propertyReflex->setAccessible(true);

            $this->assertNull($propertyReflex->getValue($this->instance));
        }

        $splStorages = [
            'mappers',
            'factories',
            'metadatas'
        ];

        foreach ($splStorages as $property) {
            $propertyReflex = $reflex->getProperty($property);
            $propertyReflex->setAccessible(true);

            $this->assertInstanceOf(
                \SplObjectStorage::class,
                $propertyReflex->getValue($this->instance)
            );

            $this->assertEmpty($propertyReflex->getValue($this->instance));
        }
    }

    /**
     * Test setMetadataResolver
     *
     * This method validate the GenericMapperManager setMetadataResolver
     * logic
     *
     * @return void
     */
    public function testSetMetadataResolver()
    {
        $resolver = $this->createMock(MetadataResolverInterface::class);
        $this->instance->setMetadataResolver($resolver);

        $reflex = new \ReflectionProperty(
            AbstractMapperManager::class,
            'metadataResolver'
        );
        $reflex->setAccessible(true);

        $this->assertSame($resolver, $reflex->getValue($this->instance));
    }

    /**
     * Test setFactoryResolver
     *
     * This method validate the GenericMapperManager setFactoryResolver
     * logic
     *
     * @return void
     */
    public function testSetFactoryResolver()
    {
        $resolver = $this->createMock(FactoryResolverInterface::class);
        $this->instance->setFactoryResolver($resolver);

        $reflex = new \ReflectionProperty(
            AbstractMapperManager::class,
            'factoryResolver'
        );
        $reflex->setAccessible(true);

        $this->assertSame($resolver, $reflex->getValue($this->instance));
    }

    /**
     * Test setMapperResolver
     *
     * This method validate the GenericMapperManager setMapperResolver
     * logic
     *
     * @return void
     */
    public function testSetMapperResolver()
    {
        $resolver = $this->createMock(MapperResolverInterface::class);
        $this->instance->setMapperResolver($resolver);

        $reflex = new \ReflectionProperty(
            AbstractMapperManager::class,
            'mapperResolver'
        );
        $reflex->setAccessible(true);

        $this->assertSame($resolver, $reflex->getValue($this->instance));
    }

    /**
     * Test addMetadata
     *
     * This method validate the GenericMapperManager addMetadata
     * logic
     *
     * @return void
     */
    public function testAddMetadata()
    {
        $spl = $this->createMock(\SplObjectStorage::class);
        $meta = $this->createMock(ObjectMetadataInterface::class);

        $spl->expects($this->exactly(4))
            ->method('contains')
            ->with($this->identicalTo($meta))
            ->willReturnOnConsecutiveCalls(false, true, false, true);
        $spl->expects($this->exactly(2))
            ->method('attach')
            ->with($this->identicalTo($meta));

        $reflex = new \ReflectionProperty(AbstractMapperManager::class, 'metadatas');
        $reflex->setAccessible(true);
        $reflex->setValue($this->instance, $spl);

        $this->instance->addMetadata($meta);
        $this->instance->addMetadata($meta);
        $this->instance->setMetadatas([$meta]);
        $this->instance->setMetadatas([$meta]);
    }

    /**
     * Test addFactory
     *
     * This method validate the GenericMapperManager addFactory
     * logic
     *
     * @return void
     */
    public function testAddFactory()
    {
        $spl = $this->createMock(\SplObjectStorage::class);
        $factory = $this->createMock(ObjectMappingFactoryInterface::class);

        $spl->expects($this->exactly(2))
            ->method('contains')
            ->with($this->identicalTo($factory))
            ->willReturnOnConsecutiveCalls(false, true);
        $spl->expects($this->once())
            ->method('attach')
            ->with($this->identicalTo($factory));

        $reflex = new \ReflectionProperty(AbstractMapperManager::class, 'factories');
        $reflex->setAccessible(true);
        $reflex->setValue($this->instance, $spl);

        $this->instance->addFactory($factory);
        $this->instance->addFactory($factory);
    }

    /**
     * Test addMapper
     *
     * This method validate the GenericMapperManager addMapper
     * logic
     *
     * @return void
     */
    public function testAddMapper()
    {
        $spl = $this->createMock(\SplObjectStorage::class);
        $factory = $this->createMock(MapperInterface::class);

        $spl->expects($this->exactly(2))
            ->method('contains')
            ->with($this->identicalTo($factory))
            ->willReturnOnConsecutiveCalls(false, true);
        $spl->expects($this->once())
            ->method('attach')
            ->with($this->identicalTo($factory));

        $reflex = new \ReflectionProperty(AbstractMapperManager::class, 'mappers');
        $reflex->setAccessible(true);
        $reflex->setValue($this->instance, $spl);

        $this->instance->addMapper($factory);
        $this->instance->addMapper($factory);
    }

    /**
     * Test getMetadata
     *
     * This method validate the GenericMapperManager getMetadata
     * logic
     *
     * @return void
     */
    public function testGetMetadata()
    {
        $methodReflex = new \ReflectionMethod(AbstractMapperManager::class, 'getMetadata');
        $methodReflex->setAccessible(true);

        $spl = $this->createMock(\SplObjectStorage::class);

        $metaReflex = new \ReflectionProperty(AbstractMapperManager::class, 'metadatas');
        $metaReflex->setAccessible(true);
        $metaReflex->setValue($this->instance, $spl);

        $dto = $this->createMock(CSR3DTOInterface::class);
        $mappedObject = $this->createMock(\stdClass::class);

        $resolver = $this->createMock(MetadataResolverInterface::class);
        $resolver->expects($this->once())
            ->method('resolveMetadata')
            ->with(
                $this->identicalTo($spl),
                $this->identicalTo($dto),
                $this->identicalTo($mappedObject)
            );

        $resolverReflex = new \ReflectionProperty(AbstractMapperManager::class, 'metadataResolver');
        $resolverReflex->setAccessible(true);
        $resolverReflex->setValue($this->instance, $resolver);

        $methodReflex->invokeArgs(
            $this->instance,
            [
                $dto,
                $mappedObject
            ]
        );

        $resolverReflex->setValue($this->instance, null);

        $this->expectException(MetadataResolverException::class);

        $methodReflex->invokeArgs(
            $this->instance,
            [
                $dto,
                $mappedObject
            ]
        );
    }

    /**
     * Test getMappedObject
     *
     * This method validate the GenericMapperManager getMappedObject
     * logic
     *
     * @return void
     */
    public function testGetMappedObject()
    {
        $methodReflex = new \ReflectionMethod(AbstractMapperManager::class, 'getMappedObject');
        $methodReflex->setAccessible(true);

        $spl = $this->createMock(\SplObjectStorage::class);

        $metaReflex = new \ReflectionProperty(AbstractMapperManager::class, 'factories');
        $metaReflex->setAccessible(true);
        $metaReflex->setValue($this->instance, $spl);

        $dto = $this->createMock(CSR3DTOInterface::class);
        $mappedObject = $this->createMock(\stdClass::class);
        $meta = $this->createMock(ObjectMetadataInterface::class);

        $factory = $this->createMock(ObjectMappingFactoryInterface::class);

        $resolver = $this->createMock(FactoryResolverInterface::class);
        $resolver->expects($this->once())
            ->method('resolveFactory')
            ->with(
                $this->identicalTo($meta),
                $this->identicalTo($dto)
            )->willReturn($factory);

        $resolverReflex = new \ReflectionProperty(AbstractMapperManager::class, 'factoryResolver');
        $resolverReflex->setAccessible(true);
        $resolverReflex->setValue($this->instance, $resolver);

        $methodReflex->invokeArgs(
            $this->instance,
            [
                $dto,
                $meta,
                null
            ]
        );

        $resolverReflex->setValue($this->instance, null);

        $this->expectException(FactoryResolverException::class);

        $methodReflex->invokeArgs(
            $this->instance,
            [
                $dto,
                $meta,
                $mappedObject
            ]
        );
    }

    /**
     * Test getMapper
     *
     * This method validate the GenericMapperManager getMapper
     * logic
     *
     * @return void
     */
    public function testGetMapper()
    {
        $methodReflex = new \ReflectionMethod(AbstractMapperManager::class, 'getMapper');
        $methodReflex->setAccessible(true);

        $spl = $this->createMock(\SplObjectStorage::class);

        $metaReflex = new \ReflectionProperty(AbstractMapperManager::class, 'mappers');
        $metaReflex->setAccessible(true);
        $metaReflex->setValue($this->instance, $spl);

        $dto = $this->createMock(CSR3DTOInterface::class);
        $mappedObject = $this->createMock(\stdClass::class);
        $meta = $this->createMock(ObjectMetadataInterface::class);

        $resolver = $this->createMock(MapperResolverInterface::class);
        $resolver->expects($this->once())
            ->method('resolveMapper')
            ->with(
                $this->identicalTo($spl),
                $this->identicalTo($meta),
                $this->identicalTo($dto),
                $this->identicalTo($mappedObject)
            );

        $resolverReflex = new \ReflectionProperty(AbstractMapperManager::class, 'mapperResolver');
        $resolverReflex->setAccessible(true);
        $resolverReflex->setValue($this->instance, $resolver);

        $methodReflex->invokeArgs(
            $this->instance,
            [
                $dto,
                $meta,
                $mappedObject
            ]
        );

        $resolverReflex->setValue($this->instance, null);

        $this->expectException(MapperResolverException::class);

        $methodReflex->invokeArgs(
            $this->instance,
            [
                $dto,
                $meta,
                $mappedObject
            ]
        );
    }
}
